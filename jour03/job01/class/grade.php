<?php

class Grade
{
    public $id;
    public $room_id;
    public $name;
    public $year;

    public function __construct(int $id = 0, int $room_id = 0, string $name = "Nom par défaut", int $year = 2020)
    {
        $this->id = $id;
        $this->room_id = $room_id;
        $this->name = $name;
        $this->year = $year;
    }

    public function createGrade()
    {
        return "Information sur la promotion :<br> 
            id : {$this->id}<br>
            room_id : {$this->room_id}<br>
            name : {$this->name}<br>
            year : {$this->year}<br>
            ";
    }
}