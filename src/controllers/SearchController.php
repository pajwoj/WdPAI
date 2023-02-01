<?php

require_once 'AppController.php';
require_once 'src/repositories/StationRepository.php';

class SearchController extends AppController {
    private $stationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->stationRepository = new StationRepository();
    }

    public function search() {
        return $this->render('profile', ['messages' => $this->stationRepository->getAllTrainStationNames()]);
    }

    public function stationSearchAPI() {
        $input = $_GET['input na stronie jak jest nazwany'];
        print(json_encode($this->stationRepository->getAllTrainStationNames()));
    }
}