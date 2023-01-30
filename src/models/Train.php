<?php

class Train {
    private $start;
    private $starthour;
    private $end;
    private $endhour;

    public function __construct(
        string $start,
        string $starthour,
        private $end,
        private $endhour
    ) {
        $this->start = $start;
        $this->starthour = $starthour;
        $this->end = $end;
        $this->endhour = $endhour;
    }

    public function getStart(): string 
    {
        return $this->start;
    }

    public function getStarthour(): string
    {
        return $this->starthour;
    }

    public function getEnd(): string 
    {
        return $this->end;
    }

    public function getEndhour(): string
    {
        return $this->endhour;
    }
}