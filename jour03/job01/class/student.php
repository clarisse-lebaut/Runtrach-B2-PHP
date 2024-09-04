<h1>Job 1 : Revoir le principe de Class</h1>

<?php
//* Pour crée une classe, on commence par la créé
// le nom de la classe est toujours avvec une majuscule
class Student
{
    //? Dans cette première partie -> on dit les paramètres qui seront obligatoirement crée lorsqu'on l'utilisera
    // en gros c'est la base de la classe, c'est la carte d'identité de l'objet qu'on crée
    // il faut donc définir la visibilité qui permet d'utiliser ou pas ces éléments dans d'autre classes
    // et crée la variable de ce qu'on va créé
    public $id;
    public $grade_id;
    public $email;
    public $fullname;
    public $birthdate;
    public $gender;


    //? Dans cette deuximème partie -> on définit ce qui va être construit automatiquement à l'apel de la classe
    // on type les paramètres, important pour la création, ce sont les élémnts qui seront tous les même pour tous les novueau élément crée
    //* $this->id --> on prend la variable crée juste avant
    //* = $id; --> et on dit que c'est égal à cet élément là présent entre paranthèse dans les paramètres
    public function __construct(int $id, int $grade_id, string $email, string $fullname, DateTime $birthdate, string $gender)
    {
        $this->id = $id;
        $this->grade_id = $grade_id;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
    }

    //? Dans cette troisième partie -> on crée la fonction dans laquelle on retourne le résltat qu'on attend
    // Tous les éléments sont crée, il suffit juste de les stocker pour les faire apparaitre dans la page
    
    public function createStudent()
    {
        // Ici, vous pouvez ajouter le code nécessaire pour enregistrer l'étudiant dans une base de données ou pour une autre action spécifique.
        return "L'étudiant {$this->fullname} est crée !";
    }
}

// Exemple d'utilisation :
$birthdate = new DateTime('1998-08-12');
$student = new Student(1, 8, "test@gmail.com", "Alien War", $birthdate, "Homme");
$student2 = new Student(1, 8, "test@gmail.com", "Sherlock Holmes", $birthdate, "Homme");
echo $student->createStudent();
echo $student2->createStudent();
?>