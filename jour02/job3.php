<h1>JOB 3 : Insérer des données dans une BDD</h1>

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

// Fonction pour insérer un nouvel étudiant dans la base de donnée
//*?entre paranthèse, on indique les différets paramètres prèsent dans la table dans laquelle on va intégré les nouvelles données
function insert_student(string $email, string $fullname, string $gender, DateTime $birthdate, int $grade_id): void
{
    //* *connection a la base de donnée, on on stocke la connexion dans un variable
    $pdo = connectBDD();
    /*
        *création de la requête
        dans cette requête on dit :
        - l'action
        - la table
        - les colonnes dans la table
        - on paramètre les valeurs pour plus de sécurité
    */
    $requeteSQL = 'INSERT into student (email, fullname, gender, birthdate, grade_id) VALUES (:email, :fullname, :gender, :birthdate, :grade_id)';
    //** initialisation d'une de ce qu'on va faire, on prépare la requête et la connexion    
    $insertInDBB = $pdo->prepare($requeteSQL);
    //* *cette ligne permet de formater l'entrée de la date
    $formattedDate = $birthdate->format('Y-m-d');
    //* *dans l'action qu'on va faire, on définis les valeurs de la requête
    $insertInDBB->bindParam(':email', $email);
    $insertInDBB->bindParam(':fullname', $fullname);
    $insertInDBB->bindParam(':gender', $gender);
    $insertInDBB->bindParam(':birthdate', $formattedDate);
    $insertInDBB->bindParam(':grade_id', $grade_id);
    //* *on exécute la requête
    $insertInDBB->execute();
}

// ici, on récupère les informations du formulaire qu'on relie au valeurs de la requête
// !la condition permet d'éviter les erreurs avant la lecture du script
if (isset($_POST['input-email']) && isset($_POST['input-fullname']) && isset($_POST['input-gender']) && isset($_POST['input-birthdate']) && isset($_POST['input-grade_id'])) {
    $email = $_POST['input-email'];
    $fullname = $_POST['input-fullname'];
    $gender = $_POST['input-gender'];
    $birthdate = $_POST['input-birthdate'];
    $grade_id = $_POST['input-grade_id'];

    // Appel de la fonction d'insertion seulement si toutes les variables sont définies
    insert_student($email, $fullname, $gender, new DateTime($birthdate), $grade_id);
}
?>

<!-- le formulaire -->
<!-- 
    //*!alors alors : choses IMPORTANTE pour les requêtes
    - form, action permet de dire quel script on appel, method pour savoir si oui on non ça apparait dans l'URL
    - name dans les input pour éxécuter le méthodes
    - method
    - required
    - id pour le label
    - type de l'information qui sera entrée dans l'input
    - button, mettre le type de button 
-->
<div style="display:flex;">
    <form style="display:flex;flex-direction:column;gap:10px" action="job3.php" method="POST">
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