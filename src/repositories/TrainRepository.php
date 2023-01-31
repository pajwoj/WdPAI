<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Train.php';

class TrainRepository extends Repository
{
    public function getTrainById(int $id): ?Train
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM trains WHERE id_train = :id
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();

        $train = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($train == false) {
            return null;
        }

        return new Train(
            $train['id_stations'],
            $train['id_hours'],
            $train['name']
        );
    }

    public function getTrainByName(string $name): ?Train
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM trains WHERE name = :name
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();

        $train = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($train == false) {
            return null;
        }

        return new Train(
            $train['id_stations'],
            $train['id_hours'],
            $train['name']
        );
    }
}