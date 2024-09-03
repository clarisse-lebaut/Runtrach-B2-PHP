<h1>Job 6 : Classer les étudiants par promotions</h1>

<?php

function connectBDD()
{
    try {
        $connectBDD = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', "root", "");
        return $connectBDD;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function find_ordered_students()
{
    // Connexion à la base de données
    $pdo = connectBDD();

    // Requête SQL pour récupérer les informations
    $requeteSQL =
        'SELECT
            grade.name AS formation_name,
            student.id AS student_id,  
            student.fullname,
            student.email,
            student.birthdate,
            student.gender
        FROM
            grade
        LEFT JOIN
            student ON student.grade_id = grade.id  
        ORDER BY
            grade.name ASC';  // Tri des résultats par nom de formation (facultatif)

    $findByPromotion = $pdo->prepare($requeteSQL);
    $findByPromotion->execute();

    // Récupération des résultats
    $results = $findByPromotion->fetchAll(PDO::FETCH_ASSOC);

    // Transformation des résultats en tableau associatif par formation
    $groupedByFormation = [];

    // Grouper les résultats par formation
    foreach ($results as $row) {
        $formationName = $row['formation_name'];

        // Assurez-vous que la clé de formation existe dans le tableau associatif
        if (!isset($groupedByFormation[$formationName])) {
            $groupedByFormation[$formationName] = [];
        }

        // Préparer les informations de l'étudiant
        $studentInfo = [
            'id' => $row['student_id'],
            'fullname' => $row['fullname'],
            'email' => $row['email'],
            'birthdate' => $row['birthdate'],
            'gender' => $row['gender'],
        ];

        // Ajouter les informations de l'étudiant au tableau de la formation correspondante
        $groupedByFormation[$formationName][] = $studentInfo;
    }

    // Retourner le tableau regroupé
    return $groupedByFormation;
}



$result = find_ordered_students();
var_dump($result);
?>