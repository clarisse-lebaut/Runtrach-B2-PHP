<h1>JOB 2 : Trouver un seul étudiant</h1>

<?php
//on crée une fonction dans laquelle on va se connecter à la base de donnée
function connectBDD()
{
    //On fait un try catch pour attraper les erreur
    try {
        $connectBDD = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', "root", "");
        return $connectBDD; //* on stock la connexion pour l'utiliser ailleurs
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    ;
}
//Fonction pour trouver un seul étudiant
function find_one_student(string $email): array
{
    //Connexion à la base donnée
    //* nouvelle variable dans laquelle on appelle la fonction qui se connecte à la BDD
    $pdo = connectBDD();
    //Requête SQL
    //* variable 1 = la requête
    $requeteSQL = 'SELECT * FROM student WHERE email = :email';
    //* pour récupérer on péprare la requête en appelant la varaible de connexion à la BDO et en faisant référence à la requête
    $getOneStudent = $pdo->prepare($requeteSQL);
    //*on lie les paramètre pour la sécurité
    $getOneStudent->bindParam(':email', $email, PDO::PARAM_STR);
    //*on éxcute la préparation de la requêe
    $getOneStudent->execute();
    //*on récupére les données de la requête
    $student = $getOneStudent->fetch(PDO::FETCH_ASSOC);
    //*on stock les données
    return $student;
}
?>
<h2>Le var_dump des information d'un seul étudiant</h2>
<?php
$oneStudent = find_one_student('manon11@muller.org');
var_dump($oneStudent);
?>

<h2>Données d'un suel étudiante dans un tableau HTML</h2>
<!-- Afficher les données dans un tableau HTML -->
<table style="border:1px solid black">
    <tr>
        <?php
        foreach ($oneStudent as $columnKey => $value) {
            //print l'en-tête du tableau, et on convertie les caractère spéciaux en les concaténant
            echo '<th width="200px">' . htmlspecialchars($columnKey) . '</th>';
        }
        ?>
    </tr>
    <tbody>
        <?php
        foreach ($oneStudent as $value) {
            //print l'en-tête du tableau, et on convertie les caractère spéciaux en les concaténant
            echo '<th width="50px">' . htmlspecialchars($value) . '</th>';
        }
        ?>
    </tbody>
</table>
<br>

<h2>Formulaire de récupération d'infomations d'un étudiant via son e-mail</h2>
<!-- Récupérer les données depuis le mail dans un formulaire -->
<div class="form">
    <form class="formContent" action="job2.php" method="GET">
        <br>
        <label for="email">E-Mail recherché : </label>
        <input id="email" name="email" type="email" required>
        <button type="submit">Récupérer les informations de l'étudiant</button>
    </form>
</div>

<?php
// Vérifier si le formulaire a été soumis
if (isset($_GET['email'])) {
    //*Récupérer les données dans un formulaire
    echo 'Email enregistré : ' . htmlspecialchars($email) . '<br>';
    //* Récupérer les autres informations en fonction de l'email entrée dans l'input
    //*TODO: récupérer l'email entrée dans l'input
    $email = $_GET['email'];

    //*TODO: chercher les valeurs dans le tableau associatif des données de la base de données
    $getStudentData = find_one_student($email);

    // var_dump($getStudentData);

    // Vérifier si des données ont été récupérées
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