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

function find_all_student_grades(): array
{

    $pdo = connectBDD();
    $requeteSQL = 'SELECT student.fullname, student.email, grade.name FROM student INNER JOIN grade ON student.grade_id = grade.id';
    $getStudentByGrade = $pdo->prepare($requeteSQL);
    $getStudentByGrade->execute();
    $execute = $getStudentByGrade->fetchAll(PDO::FETCH_ASSOC);
    return $execute;
}

$result = find_all_student_grades();
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
                if (!empty($result)) {
                    $firstRow = $result[0];
                    foreach ($firstRow as $key => $values) {
                        echo '<th>' . htmlspecialchars($key) . '</th>';
                    }
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $student): ?>
                <tr>
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