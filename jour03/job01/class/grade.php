<?php

class Grade
{
    public $id;
    public $room_id;
    public $name;
    public $year;

    public function __construct(int $id = 0, int $room_id = 0, string $name = "Nom par défaut", ?DateTime $year = null)
    {
        $this->id = $id;
        $this->room_id = $room_id;
        $this->name = $name;
        $this->year = $year ?? new DateTime('1995-01-01');
    }

    public function createGrade()
    {
        $formattedDate = $this->year->format('Y-m-d');
        return "Information sur la promotion :<br> 
            id : {$this->id}<br>
            room_id : {$this->room_id}<br>
            name : {$this->name}<br>
            year : {$formattedDate}<br>
            ";
    }
}