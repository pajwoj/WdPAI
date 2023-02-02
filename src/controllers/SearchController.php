<?php

require_once 'AppController.php';
require_once 'src/repositories/StationRepository.php';
require_once 'src/repositories/TrainRepository.php';

class SearchController extends AppController
{
    private $stationRepository;
    private $trainRepository;

    public function __construct()
    {
        parent::__construct();
        $this->stationRepository = new StationRepository();
        $this->trainRepository = new TrainRepository();
    }

    public function StartStationSearchAPI()
    {
        $input = strtolower($_GET['start']);
        $result = [];
        $data = $this->stationRepository->getAllTrainStationNames();

        if ($input == '') {
            foreach ($data as $current) $result[] = current($current);
            print json_encode($result);
            return;
        }

        else {
            foreach ($data as $current) {
                if (strpos(strtolower(current($current)), $input) !== false) {
                    $result[] = current($current);
                }
            }
        }

        print json_encode($result);
    }

    public function EndStationSearchAPI()
    {
        $input = strtolower($_GET['end']);
        $result = [];
        $data = $this->stationRepository->getAllTrainStationNames();

        if ($input == '') {
            foreach ($data as $current) $result[] = current($current);
            print json_encode($result);
            return;
        }

        else {
            foreach ($data as $current) {
                if (strpos(strtolower(current($current)), $input) !== false) {
                    $result[] = current($current);
                }
            }
        }

        print json_encode($result);
    }

    public function results() {
        $start = $_GET['start'];
        $end = $_GET['end'];
        $hour = $_GET['time'];

        $trains = $this->trainRepository->getTrainNamesByStartEndStops($start, $end);

        return $this->render('results', ['results' => [$start, $end, $hour, $trains]]);
    }
}