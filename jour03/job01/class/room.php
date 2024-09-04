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

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setFloorId(int $floor_id): static
    {
        $this->floor_id = $floor_id;
        return $this;
    }
    public function getFloorId()
    {
        return $this->floor_id;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setCapacity(int $capacity): static
    {
        $this->capacity = $capacity;
        return $this;
    }
    public function getCapacity()
    {
        return $this->capacity;
    }
}