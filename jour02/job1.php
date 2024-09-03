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

<!-- Afficher les données dans un tableau HTML -->
<table sytle="border:1px solid black">
    <caption>Tous les étudiants et leurs informations</caption>
    <thead>
        <tr sytle="background-color=lightgray;">
            <!-- Afficher les en têtes des colonnes -->
            <?php
            /* 
                *pour cette boucle, on itère sur un index
                $student[0] --> on accède au premier enregistrement du tableau pour avoir les en-tête
                $student --> tableau qui contient toute les enregistrements de la table student dans la BDD
                as $columnKey => $value --> on itière sur chaque paire clé-valeur du premier enregistrement [0]
                --> columKey c'est la clé (nom de la colonne) et value c'est la valeur
            */

            foreach ($student[0] as $columnKey => $value) {
                //print l'en-tête du tableau, et on convertie les caractère spéciaux en les concaténant
                echo '<th width="50px">' . htmlspecialchars($columnKey) . '</th>';
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <!-- Afficher les données du tableau -->
        <?php
        //*TODO : ici on appelle la variable $student qui stock toute les données
        //*TODO : et on crée $students pour itérer sur chaque valeur de l'enregistrement $student.
        foreach ($student as $students) {
            echo '<tr>'; // on met le début de la balise pour la ligne
            //*TODO : ici on appelle la variable $students qui stock toute les données
            //*TODO : et on crée $value pour itérer sur chaque valeur de l'enregistrement $students.
            foreach ($students as $value) {
                //print les cellules, et on convertie les caractère spéciaux en les concaténant
                echo '<td>' . htmlspecialchars($value) . '</td>'; //on met la balise pour remplir chaque cellule avec les données
            }
            echo '</tr>'; //on ferme la balise des lignes
        }
        ?>
    </tbody>
</table>