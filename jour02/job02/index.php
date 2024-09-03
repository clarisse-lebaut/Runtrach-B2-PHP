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

function find_one_student(string $email): array
{
    $pdo = connectBDD();
    $requeteSQL = 'SELECT * FROM student WHERE email = :email';
    $getOneStudent = $pdo->prepare($requeteSQL);
    $getOneStudent->bindParam(':email', $email, PDO::PARAM_STR);
    $getOneStudent->execute();
    return $getOneStudent->fetch(PDO::FETCH_ASSOC);
}

$oneStudent = find_one_student('manon11@muller.org');
var_dump($oneStudent);
?>

<table style="border:1px solid black">
    <tr>
        <?php
        if ($oneStudent) {
            foreach ($oneStudent as $columnKey => $value) {
                echo '<th width="200px">' . htmlspecialchars($columnKey) . '</th>';
            }
            ?>
        </tr>
        <tbody>
            <tr>
                <?php
                foreach ($oneStudent as $value) {
                    echo '<td width="200px">' . htmlspecialchars($value) . '</td>';
                }
                ?>
            </tr>
        </tbody>
        <?php
        } else {
            echo '<tr><td colspan="100%">Aucune donnée disponible.</td></tr>';
        }
        ?>
</table>

<br>

<div class="form">
    <form class="formContent" action="index.php" method="GET">
        <br>
        <label for="email">E-Mail recherché : </label>
        <input id="email" name="email" type="email" required>
        <button type="submit">Récupérer les informations de l'étudiant</button>
    </form>
</div>

<?php
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    echo 'Email recherché : ' . htmlspecialchars($email) . '<br>';
    $getStudentData = find_one_student($email);

    if ($getStudentData) {
        echo "Nom & Prénom : " . htmlspecialchars($getStudentData['fullname']) . '<br>';
        echo "Grade : " . htmlspecialchars($getStudentData['grade_id']) . '<br>';
        echo "Email : " . htmlspecialchars($getStudentData['email']) . '<br>';
        echo "Date de naissance : " . htmlspecialchars($getStudentData['birthdate']) . '<br>';
        echo "Genre : " . htmlspecialchars($getStudentData['gender']) . '<br>';
    } else {
        echo "Aucun étudiant trouvé avec cet e-mail.";
    }
}
?>