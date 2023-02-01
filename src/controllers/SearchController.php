<?php

require_once 'AppController.php';
require_once 'src/repositories/StationRepository.php';

class SearchController extends AppController
{
    private $stationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->stationRepository = new StationRepository();
    }

    public function search()
    {
        return $this->render('profile', ['messages' => $this->stationRepository->getAllTrainStationNames()]);
    }

    public function StationSearchAPI()
    {
        $input = strtolower($_GET['searchQuery']);
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
}