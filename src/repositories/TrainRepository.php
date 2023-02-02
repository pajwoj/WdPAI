<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Train.php';
require_once __DIR__.'/../models/Route.php';

class TrainRepository extends Repository {
    public function getTrainIdByName($name): ?int {
        $stmt = $this->database->connect()->prepare('
            SELECT id_train FROM trains WHERE name = :name
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();

        return current($stmt->fetch(PDO::FETCH_ASSOC));
    }

    public function getTrainRoute($id): ?array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            select trains.id_train, stations.name, routes.hour 
            from routes 
                inner join trains on routes.id_train = trains.id_train 
                inner join stations on routes.id_station = stations.id_station 
        ');
        $stmt->execute();

        $current = $stmt->fetch(PDO::FETCH_ASSOC);
        while($current) {
            $currentRoute = new Route(
                $current['name'],
                $current['id_train'],
                $current['hour']
            );

            $result[] = $currentRoute;
            $current = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    public function areStopsInCorrectOrder($start, $end, $name): ?bool {
        $routes = $this->getTrainRoute($this->getTrainIdByName($name));
        $startFlag = false;

        foreach($routes as $stop) {
            if($stop->getStation() == $start) $startFlag = true;
            if($stop->getStation() == $end && !$startFlag) return false;
            if($stop->getStation() == $end && $startFlag) return true;
        }

        return false;
    }

    public function isTrainOnTime($start, $hour, $name): ?bool {
        $routes = $this->getTrainRoute($this->getTrainIdByName($name));

        $hour .= ":00";

        foreach($routes as $stop) {
            if($stop->getStation() == $start) {
                if(strtotime($stop->getTime()) < strtotime($hour)) return false;
                if(strtotime($stop->getTime()) >= strtotime($hour)) return true;
            }
        }

        return false;
    }

    public function getTrainNamesByStartEndStops($start, $end): ?array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            select trains.name, stations.name
            from routes 
                inner join trains on routes.id_train = trains.id_train 
                inner join stations on routes.id_station = stations.id_station 
        ');
        $stmt->execute();

        $currentTrain='';
        $startFlag = false;
        $endFlag = false;

        $current = $stmt->fetch(PDO::FETCH_BOTH);
        while($current) {
            $previousTrain = $currentTrain;
            $currentTrain = $current[0];

            if($previousTrain !== $currentTrain) {
                $startFlag = false;
                $endFlag = false;
            }

            if($current[1] == $start) $startFlag = true;
            if($current[1] == $end) $endFlag = true;

            if($startFlag && $endFlag) $result[] = $current[0];

            $current = $stmt->fetch(PDO::FETCH_BOTH);
        }

        return array_unique($result);
    }

    public function getCorrectTrains($start, $end, $hour): ?array {
        $trains = $this->getTrainNamesByStartEndStops($start, $end);
        $correctOrder = [];

        foreach($trains as $train) {
            if($this->areStopsInCorrectOrder($start, $end, $train)) $correctOrder[] = $train;
        }

        $correct = [];
        foreach($correctOrder as $train) {
            if($this->isTrainOnTime($start, $hour, $train)) $correct[] = $train;
        }

        return $correct;
    }
}