<h1>Job 5 : Récupérer les salles et leurs capacités</h1>

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

function find_full_rooms(): array
{

    $pdo = connectBDD();
    //*? pour selection seulement quelque élément dans une colonne d'une table
    $requeteSQL =
        //* donc on se la refait avec des commentaire parce que la on entre dans quelque chose de complexe
        /*
            SELECT --> 
            ? on sélectionne les colonnes des tables qui seront utilisé pour cette requête
            r.id AS room_id, --> 
            ? r.id pour sera considéré comme room_id pour l'affichage
            g.name, --> 
            ? on selectionne la colonne name de la table grade(raccourci avec 'g')
            r.capacity, --> 
            ? on selectionne la colonne room de la table capacity 
            COUNT(s.id) AS students_count, -->
            ? on compte le nombre d'étudiant indiqué dans la colonne id de la table student
            ? et on lui crée un alias pour rendre plus lisible l'affichage
            CASE
            ? struture conditionnelle
                WHEN COUNT(s.id) >= r.capacity THEN "Full"
                ? permet de défini la condition
                ? si le nb d'id dans la colonne id de la table student est supérieur ou égale au nombre dans la colonne capacity de la table room alors on écrit 'Full'
                ELSE "Not Full"
                ? si c'est pas le cas on écrit 'not full', c'est un valeur par défaut de la condition
            END AS room_status
            ? termine la condition et on lui donne un alias
        FROM room r
        ? table room et alias ppour simplifier l'appel de cette table
        ? on indique que ce sera la table principal a partir de laquelle les données seront extraite
            LEFT JOIN student s ON r.id = s.grade_id
            ? on joint à gauche
            ? on obtient toutes les lignes de la table room
            ? les id de la table room sont joint au grade_id de la table student
            INNER JOIN grade g ON r.id = g.id
            ? on joint de manière interne
            ? on obtient uniquement les correspondances entre les id de la table room et les id de la table grade
        GROUP BY r.id, g.name, r.capacity
        ? on regroupe les résultats par les id de la table room, les name de la table grade et la capacity de la table room
        ? et ça compte pour faire afficher la requête
        
        */

        'SELECT
            r.id AS room_id,
            g.name, 
            r.capacity,
            COUNT(s.id) AS students_count,
            CASE
                WHEN COUNT(s.id) >= r.capacity THEN "Full"
                ELSE "Not Full"
            END AS room_status
        FROM 
            room r
            LEFT JOIN student s ON r.id = s.grade_id
            INNER JOIN grade g ON r.id = g.id
        GROUP BY 
            r.id, g.name, r.capacity';

    $getStudentByGrade = $pdo->prepare($requeteSQL);
    $getStudentByGrade->execute();

    //*! Pour fetch dans la BDD --> opérateur =, pas la flèche !!!
    $execute = $getStudentByGrade->fetchAll(PDO::FETCH_ASSOC);
    return $execute;
}

$result = find_full_rooms();
//* pour avoir le tableau associatif
var_dump($result)
    ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Une requête pour plusieurs table... PK & FK</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <?php if (!empty($result)) {
                    $firstRow = $result[0];
                    foreach ($firstRow as $key => $values) {
                        echo '<th>' . htmlspecialchars($key) . '</th>';
                    }
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <!-- pour faire apparitre les données d'un tableau associatif dans un tableau html
             il est necessaire de faire deux boucle :
              //* la première pour itérer dans les données du tableau associatif
              //* la deuxième pour les utilser et les faire apparaître
             -->
            <?php foreach ($result as $results): ?>
                <tr>
                    <?php foreach ($results as $data) {
                        echo '<td>' . htmlspecialchars($data) . '</td>';
                    }
                    ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>