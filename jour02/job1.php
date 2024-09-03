<h1>JOB 1 : Récupérer tout les étudiants dans une BDD</h1>

<?php
//on crée une fonction dans laquelle on va se connecter à la base de donnée
function connectBDD()
{
    //On fait un try catch pour attraper les erreur
    try {
        $connectBDD = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', "root", "");
        //Permet de vérifier qu'on a bien la connexion
        echo 'Connexion réussi !';
        return $connectBDD; //* on stock la connexion pour l'utiliser ailleurs
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    ;
}

//Fonction pour trouver les étudiants
function find_all_student(): array
{
    //Connexion à la base donnée
    //* nouvelle variable dans laquelle on appelle la fonction qui se connecte à la BDD
    $pdo = connectBDD();
    //Requête SQL
    //* variable 1 = la requête
    $requeteSQL = 'SELECT * FROM student';
    //* pour récupérer on péprare la requête en appelant la varaible de connexion à la BDO et en faisant référence à la requête
    $getAllStudent = $pdo->prepare($requeteSQL);
    //*on éxcute la préparation de la requêe
    $getAllStudent->execute();
    //*on récupére les données de la requête
    $student = $getAllStudent->fetchAll(PDO::FETCH_ASSOC);
    //*on stock les données
    return $student;
}

//Récupérer les données stocké
$student = find_all_student();
//Print données dans un tableau assoiatif
var_dump($student);
?>