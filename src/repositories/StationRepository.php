<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Station.php';

class StationRepository extends Repository {

    public function getAllTrainStationNames(): array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT name FROM stations
        ');
        $stmt->execute();

        $currentName = $stmt->fetch(PDO::FETCH_ASSOC);
        while ($currentName) {
            $result[] = $currentName;
            $currentName = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $result;
    }

}