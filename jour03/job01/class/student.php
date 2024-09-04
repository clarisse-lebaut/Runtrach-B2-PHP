<?php
//* Pour crée une classe, on commence par la créé
// le nom de la classe est toujours avvec une majuscule
class Student
{
    //? Dans cette première partie -> on dit les paramètres qui seront obligatoirement crée lorsqu'on l'utilisera
    // en gros c'est la base de la classe, c'est la carte d'identité de l'objet qu'on crée
    // il faut donc définir la visibilité qui permet d'utiliser ou pas ces éléments dans d'autre classes
    // et crée la variable de ce qu'on va créé
    private $id;
    private $grade_id;
    private $email;
    private $fullname;
    private $birthdate;
    private $gender;


    //? Dans cette deuximème partie -> on définit ce qui va être construit automatiquement à l'apel de la classe
    // on type les paramètres, important pour la création, ce sont les élémnts qui seront tous les même pour tous les novueau élément crée
    //! nouvel élément très intéressant --> pour avoir des paramètres par défaut à l'appel de la class, il faut entre les parenthèse dire à quoi est égal le parmètre
    //* $this->id --> on prend la variable crée juste avant
    //* = $id; --> et on dit que c'est égal à cet élément là présent entre paranthèse dans les paramètres
    public function __construct(int $id = 0, int $grade_id = 1, string $email = "test@gmail.com", string $fullname = "Barabara Streisand", ?DateTime $birthdate = null, string $gender = "None")
    {
        $this->id = $id;
        $this->grade_id = $grade_id;
        $this->email = $email;
        $this->fullname = $fullname;
        //opérateur ?? dans le constructeur pour fournir une valeur de remplacement lorsque le paramètre est null
        $this->birthdate = $birthdate ?? new DateTime('1995-01-01');
        $this->gender = $gender;
    }

    //? Dans cette troisième partie -> on crée la fonction dans laquelle on retourne le résltat qu'on attend
    // Tous les éléments sont crée, il suffit juste de les stocker pour les faire apparaitre dans la page

    public function createStudent()
    {
        $formattedDate = $this->birthdate->format('Y-m-d');
        // Ici, vous pouvez ajouter le code nécessaire pour enregistrer l'étudiant dans une base de données ou pour une autre action spécifique.
        return " Informations de l'étudiant :<br>
            id : {$this->id},<br>
            grade_id : {$this->grade_id}<br>
            email : {$this->email}<br>
            fullname : {$this->fullname}<br>
            birthdate : {$formattedDate}<br>
            gender : {$this->gender}<br>
            ";
    }

    //* GETTER ET SETTER : PAR VARIABLE
    // les deux agissent ensemble, ce sont des partenaire du crime
    //? le getter permet de récupérer la valeur de la class
    //*TODO possible de l'avoir sans setter si je veux que la valeur soit lu mais pas modifier
    public function getEmail(): string
    {
        return $this->email;
    }
    //? le setter permet de modifier la valeur de la classe
    //*TODO possible de l'avoir sans getter si je veux que la valeur soit modifier sans être lu
    //! quand tu types ta fonction setter, met un void à la fin pour dire que tu n'attends pas de retour
    public function setEmail(string $email): void
    {
        if (is_string($email) && !empty($email)) {
            $this->email = $email;
        } else {
            throw new InvalidArgumentException("L'e-mail doit être une chaîne de caractère");
        }
    }

    public function getId(): string
    {
        return $this->id;
    }
    public function getFullname(): string
    {
        return $this->fullname;
    }
    public function getBirthdate(): DateTime
    {
        return $this->birthdate;
    }
    public function getGender(): string
    {
        return $this->gender;
    }
}

// // Exemple d'utilisation :
// // --------------------------------------------------------------------------------
// $birthdate = new DateTime('1998-08-12');
// $student = new Student(1, 8, "test@gmail.com", "Alien War", $birthdate, "Homme");
// $student2 = new Student(1, 8, "test@gmail.com", "Sherlock Holmes", $birthdate, "Homme");
// $student3 = new Student();
// echo $student->createStudent();
// echo $student2->createStudent();
// echo $student3->createStudent();