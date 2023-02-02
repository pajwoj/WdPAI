<?php

class Route {
    private $station;
    private $trainId;
    private $time;

    public function __construct(
        string $station,
        int $trainId,
        string $time
    ) {
        $this->station = $station;
        $this->trainId = $trainId;
        $this->time = $time;
    }

    /**
     * @return string
     */
    public function getStation(): string
    {
        return $this->station;
    }

    /**
     * @param string $station
     */
    public function setStation(string $station): void
    {
        $this->station = $station;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     */
    public function setTime(string $time): void
    {
        $this->time = $time;
    }

    /**
     * @return int
     */
    public function getTrainId(): int
    {
        return $this->trainId;
    }

    /**
     * @param int $trainId
     */
    public function setTrainId(int $trainId): void
    {
        $this->trainId = $trainId;
    }
}