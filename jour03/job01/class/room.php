<?php

class Room
{
    public $id;
    public $floor_id;
    public $name;
    public $capacity;

    public function __construct(int $id = null, int $floor_id = null, string $name = null, int $capacity = null)
    {
        $this->id = $id;
        $this->floor_id = $floor_id;
        $this->name = $name;
        $this->capacity = $capacity;
    }

    public function createRoom()
    {
        return "Informations sur la salle : <br>
        id : {$this->id}<br>
        floor_id : {$this->floor_id}<br>
        name : {$this->name}<br>
        capacity : {$this->capacity}<br>
        ";
    }
}