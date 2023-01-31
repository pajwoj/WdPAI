<?php

class Train {
    private $stationsId;
    private $hoursId;
    private $name;

    public function __construct(
        string $stationsId,
        string $hoursId,
        string $name
    ) {
        $this->stationsId = $stationsId;
        $this->hoursId = $hoursId;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getStationsId(): string
    {
        return $this->stationsId;
    }

    /**
     * @param string $stationsId
     */
    public function setStationsId(string $stationsId): void
    {
        $this->stationsId = $stationsId;
    }

    /**
     * @return string
     */
    public function getHoursId(): string
    {
        return $this->hoursId;
    }

    /**
     * @param string $hoursId
     */
    public function setHoursId(string $hoursId): void
    {
        $this->hoursId = $hoursId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}