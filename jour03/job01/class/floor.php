<?php

class Floor
{
    private $id;
    private $name;
    private $level;

    private function __construct(int $id = 0, string $name = "Rez-de-chaussé", int $level = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
    }

    private function createFloor()
    {
        return "Information de sur l'étage :<br> 
            id : {$this->id}<br>
            name : {$this->name}<br>
            level : {$this->level}<br>";
    }

}
