<?php

class Grade
{
    public $id;
    public $room_id;
    public $name;
    public $year;

    public function __construct(?int $id = null, ?int $room_id = null, ?string $name = null, ?DateTime $year = null)
    {
        $this->id = $id;
        // les deux points d'interrogation me permettent de modifier la valeur en ce que je veux par défaut
        // si il ne sont pas dans les paramètres par défaut, alors je pourrais pas les mettre
        $this->room_id = $room_id ?? "test"; //* je peux mettre string ou int malgrè le typage 
        $this->name = $name;
        // les deux points d'interrogation me permettent de modifier la valeur en formatant la date
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

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setFloorId(int $room_id): static
    {
        $this->$room_id = $room_id;
        return $this;
    }
    public function getFloorId()
    {
        return $this->room_id;
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

    public function setYear(int $year): static
    {
        $this->$year = $year;
        return $this;
    }
    public function getYear()
    {
        return $this->year;
    }
}