<h1>JOB 2 : Trouver un seul étudiant</h1>

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
function find_one_student(string $email): array
{
    //Connexion à la base donnée
    //* nouvelle variable dans laquelle on appelle la fonction qui se connecte à la BDD
    $pdo = connectBDD();
    //Requête SQL
    //* variable 1 = la requête
    $requeteSQL = 'SELECT * FROM student WHERE email = :email';
    //* pour récupérer on péprare la requête en appelant la varaible de connexion à la BDO et en faisant référence à la requête
    $getOneStudent = $pdo->prepare($requeteSQL);
    //*on lie les paramètre pour la sécurité
    $getOneStudent->bindParam(':email', $email, PDO::PARAM_STR);
    //*on éxcute la préparation de la requêe
    $getOneStudent->execute();
    //*on récupére les données de la requête
    $student = $getOneStudent->fetch(PDO::FETCH_ASSOC);
    //*on stock les données
    return $student;
}

$oneStudent = find_one_student('manon11@muller.org');
var_dump($oneStudent);
?>
<!-- Afficher les données dans un tableau HTML -->
<table style="border:1px solid black">
    <caption>Les informations d'un seul étudiant</caption>
    <tr>
        <?php
        foreach ($oneStudent as $columnKey => $value) {
            //print l'en-tête du tableau, et on convertie les caractère spéciaux en les concaténant
            echo '<th width="200px">' . htmlspecialchars($columnKey) . '</th>';
        }
        ?>
    </tr>
    <tbody>
        <?php
        foreach ($oneStudent as $value) {
            //print l'en-tête du tableau, et on convertie les caractère spéciaux en les concaténant
            echo '<th width="50px">' . htmlspecialchars($value) . '</th>';
        }
        ?>
    </tbody>

</table>