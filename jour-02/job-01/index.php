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

function find_all_student(): array
{
    $pdo = connectBDD();
    $requeteSQL = 'SELECT * FROM student';
    $getAllStudent = $pdo->prepare($requeteSQL);
    $getAllStudent->execute();
    $student = $getAllStudent->fetchAll(PDO::FETCH_ASSOC);
    return $student;
}

$student = find_all_student();
var_dump($student);
?>

<table style="border:1px solid black">
    <caption>Tous les étudiants et leurs informations</caption>
    <thead style="border:1px solid black">
        <tr style="background-color:blue;color:white;border:1px solid black">
            <?php
            foreach ($student[0] as $columnKey => $value) {
                echo '<th width="50px">' . htmlspecialchars($columnKey) . '</th>';
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($student as $students) {
            echo '<tr>';
            foreach ($students as $value) {
                echo '<td style="border:1px solid black">' . htmlspecialchars($value) . '</td>';
            }
            echo '</tr>';
        }
        ?>
    </tbody>
</table>