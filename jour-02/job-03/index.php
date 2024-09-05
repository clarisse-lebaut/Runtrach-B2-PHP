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

function insert_student(string $email, string $fullname, string $gender, DateTime $birthdate, int $grade_id): void
{
    $pdo = connectBDD();
    $requeteSQL = 'INSERT into student (email, fullname, gender, birthdate, grade_id) VALUES (:email, :fullname, :gender, :birthdate, :grade_id)';
    $insertInDBB = $pdo->prepare($requeteSQL);
    $formattedDate = $birthdate->format('Y-m-d');
    $insertInDBB->bindParam(':email', $email);
    $insertInDBB->bindParam(':fullname', $fullname);
    $insertInDBB->bindParam(':gender', $gender);
    $insertInDBB->bindParam(':birthdate', $formattedDate);
    $insertInDBB->bindParam(':grade_id', $grade_id);
    $insertInDBB->execute();
}

if (isset($_POST['input-email']) && isset($_POST['input-fullname']) && isset($_POST['input-gender']) && isset($_POST['input-birthdate']) && isset($_POST['input-grade_id'])) {
    $email = $_POST['input-email'];
    $fullname = $_POST['input-fullname'];
    $gender = $_POST['input-gender'];
    $birthdate = $_POST['input-birthdate'];
    $grade_id = $_POST['input-grade_id'];

    insert_student($email, $fullname, $gender, new DateTime($birthdate), $grade_id);
}
?>

<div style="display:flex;">
    <form style="display:flex;flex-direction:column;gap:10px" action="index.php" method="POST">
        <label for="email">Email</label>
        <input id="email" name="input-email" type="email" required>
        <label for="fullname">Nom & Prénom</label>
        <input id="fullname" name="input-fullname" type="text" required>
        <label for="gender">Genre</label>
        <select id="gender" name="input-gender" required>
            <option value="male">Homme</option>
            <option value="female">Femme</option>
        </select>
        <label for="birthdate">Date de naissance</label>
        <input id="birthdate" name="input-birthdate" type="date" required>
        <label for="grade">Grade</label>
        <input id="grade_id" name="input-grade_id" type="number" required>

        <button type="submit">Inscrire le nouvel étudiant</button>
    </form>
</div>