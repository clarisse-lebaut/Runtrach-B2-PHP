<h1>JOB 4 : Récupérer les étudiants par leurs grade</h1>

<?php
function connectBDD()
{
    // On fait un try catch pour attraper les erreur
    try {
        $connectBDD = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', "root", "");
        // Permet de vérifier qu'on a bien la connexion
        echo 'Connexion réussi !';
        return $connectBDD; //* on stock la connexion pour l'utiliser ailleurs
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    ;
}
// Vérifier si la connexion est faite pour acceder à la base de donnée
$checkConnection = connectBDD();

function find_all_student_grades(): array
{

    $pdo = connectBDD();
    //*? pour selection seulement quelque élément dans une colonne d'une table
    //*! quand on doit faire appel au clé étrangères et prendre des infos dans deux tables : (ex:student.fullname), ce qu'il y avant le poijt permet de préciser dans quelle table aller
    /*
    *SELECT student.fullname, student.email, grades.grade_name :
    Colonnes à sélectionner, récupérer fullname et email de la table student, et name de la table grade.
    
    *FROM student :
    Table principale = student. Sélection des données dans cette table.
    
    *INNER JOIN grades ON student.grade_id = grades.id :
    INNER JOIN utilisée pour combiner les données de la table student et de la table grade. 
    ON student.grade_id = grades.id indique comment les tables sont liées : les valeurs de grade_id dans la table student correspondent aux valeurs de id dans la table grade.
    */
    $requeteSQL = 'SELECT student.fullname, student.email, grade.name FROM student INNER JOIN grade ON student.grade_id = grade.id';
    $getStudentByGrade = $pdo->prepare($requeteSQL);
    $getStudentByGrade->execute();

    //*! Pour fetch dans la BDD --> opérateur =, pas la flèche !!!
    $execute = $getStudentByGrade->fetchAll(PDO::FETCH_ASSOC);
    return $execute;
}

$result = find_all_student_grades();
//* pour avoir le tableau associatif
var_dump($result)
    ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récupérer certaines informations dans une table</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <?php
                // Toujorus vérifier si le tableau n'est pas vide
                if (!empty($result)) {
                    // Obtenir les clés manuellement
                    // [0] permet d'acceder à l'index du tableau, ici on récupérer les valeurs de la ligne 0
                    $firstRow = $result[0];
                    // => : fonction fléché
                    // $value : on récupère les valeur,
                    foreach ($firstRow as $key => $values) {
                        echo '<th>' . htmlspecialchars($key) . '</th>';
                    }
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <!-- on fait une première boucle dans laquelle on lit toutes les données -->
            <?php foreach ($result as $student): ?>
                <tr>
                    <!-- et dans cette deuxime boucle on récupère les données qui nous interesse -->
                    <?php foreach ($student as $data) {
                        echo "<td>" . htmlspecialchars($data) . "</td>";
                    }
                    ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>