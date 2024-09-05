<?php
function connectBDD()
{
    try {
        $connectBDD = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', "root", "");
        return $connectBDD;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    ;
}

function find_full_rooms(): array
{

    $pdo = connectBDD();
    $requeteSQL =
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
    $execute = $getStudentByGrade->fetchAll(PDO::FETCH_ASSOC);
    return $execute;
}

$result = find_full_rooms();
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