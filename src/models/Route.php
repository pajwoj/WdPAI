<?php

class Route {
    private $stationId;
    private $hourId;
    private $time;

    public function __construct(
        int $stationId,
        int $hourId,
        string $time
    ) {
        $this->stationId = $stationId;
        $this->hourId = $hourId;
        $this->time = $time;
    }

    /**
     * @return int
     */
    public function getStationId(): int
    {
        return $this->stationId;
    }

    /**
     * @param int $stationId
     */
    public function setStationId(int $stationId): void
    {
        $this->stationId = $stationId;
    }

    /**
     * @return int
     */
    public function getHourId(): int
    {
        return $this->hourId;
    }

    /**
     * @param int $hourId
     */
    public function setHourId(int $hourId): void
    {
        $this->hourId = $hourId;
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
}