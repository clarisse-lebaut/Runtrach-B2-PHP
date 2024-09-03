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
    $pdo = connectBDD();
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
            grade.name ASC';

    $findByPromotion = $pdo->prepare($requeteSQL);
    $findByPromotion->execute();
    $results = $findByPromotion->fetchAll(PDO::FETCH_ASSOC);
    $groupedByFormation = [];

    foreach ($results as $row) {
        $formationName = $row['formation_name'];

        if (!isset($groupedByFormation[$formationName])) {
            $groupedByFormation[$formationName] = [];
        }

        $studentInfo = [
            'id' => $row['student_id'],
            'fullname' => $row['fullname'],
            'email' => $row['email'],
            'birthdate' => $row['birthdate'],
            'gender' => $row['gender'],
        ];

        $groupedByFormation[$formationName][] = $studentInfo;
    }

    return $groupedByFormation;
}



$result = find_ordered_students();
var_dump($result);