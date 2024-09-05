<?php
class Student
{
    private $id;
    private $grade_id;
    private $email;
    private $fullname;
    private $birthdate;
    private $gender;

    public function __construct(int $id = 0, int $grade_id = 1, string $email = "test@gmail.com", string $fullname = "Barabara Streisand", ?DateTime $birthdate = null, string $gender = "None")
    {
        $this->id = $id;
        $this->grade_id = $grade_id;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->birthdate = $birthdate ?? new DateTime('1995-01-01');
        $this->gender = $gender;
    }

    public function createStudent()
    {
        $formattedDate = $this->birthdate->format('Y-m-d');
        return " Informations de l'étudiant :<br>
            id : {$this->id},<br>
            grade_id : {$this->grade_id}<br>
            email : {$this->email}<br>
            fullname : {$this->fullname}<br>
            birthdate : {$formattedDate}<br>
            gender : {$this->gender}<br>
            ";
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function getId(): string
    {
        return $this->id;
    }
    public function getBirthdate(): DateTime
    {
        return $this->birthdate;
    }
    public function getGender(): string
    {
        return $this->gender;
    }

    public function setEmail(string $email): void
    {
        if (is_string($email) && !empty($email)) {
            $this->email = $email;
        } else {
            throw new InvalidArgumentException("L'e-mail doit être une chaîne de caractère");
        }
    }

    public function setFullname(string $fullname): static
    {
        $this->fullname = $fullname;
        return $this;
    }
    public function getFullname(): string
    {
        return $this->fullname;
    }
}