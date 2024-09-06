<?php

class Floor
{
    private $id;
    private $name;
    private $level;

    public function __construct(int $id = 0, string $name = "Rez-de-chaussé", int $level = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
    }

    public function createFloor()
    {
        return "Information de sur l'étage :<br> 
            id : {$this->id}<br>
            name : {$this->name}<br>
            level : {$this->level}<br>";
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

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;
        return $this;
    }
    public function getLevel()
    {
        return $this->level;
    }

}
