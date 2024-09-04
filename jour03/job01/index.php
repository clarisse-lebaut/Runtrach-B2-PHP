<h1>Job 1 : Revoir le principe de Class</h1>


<?php
//! pour utiliser une classe depuis un autre fichier --> il faut faire un require
// si il y a des dossier, toujours penser au chemin absolu
require "class/student.php";
require "class/floor.php";
require 'class/grade.php';
require 'class/room.php';


//* print des nouveau étudiants
//* ---------------------------
$birthdate = new DateTime('1998-08-12');

$student = new Student(1, 8, "test@gmail.com", "Alien War", $birthdate, "Homme");
echo "<b>Print avec des nouvelle informations :</b><br>" . $student->createStudent() . "<br>";

$student2 = new Student(1, 8, "test@gmail.com", "Sherlock Holmes", $birthdate, "Homme");
$email = 'nouveladressemail@gmail.com';
// Utilisation du setter pour modfier la valeur de $email
// try {
//     $student2->setEmail($email); // Fonctionne bien
// } catch (InvalidArgumentException $e) {
//     echo 'Erreur : ' . $e->getMessage();
// }
echo "<b>Print avec des nouvelle informations :</b><br>" . $student2->createStudent() . "<br>";

$student3 = new Student();
echo "<b>Print avec les informations par défauts :</b><br>" . $student3->createStudent() . "<br>";

// Crée une nouvelle instance de Student
// Définit le nom
// Retourne l'objet
$student4 = (new Student())->setFullname("OLAF");
// Creéz toute la fiche de l'étudiant
echo $student4->createStudent();
// Affiche que le nom, pas les autres paramètres
//? tout simplement parce que la fonction n'appelle que cet élément
echo $student4->getFullname();

$student5 = (new Student())->createStudent();
echo $student5;

$student6 = (new Student(1, 8, "test@gmail.com", "Alien War", $birthdate, "Homme"))->createStudent();
echo $student6;

//* print les étages
//* ---------------------------
$floor = new Floor(0, "Etage 3", 3);
$floor2 = new Floor();
echo "<b>Print avec des nouvelle informations :</b><br>" . $floor->createFloor() . "<br>";
echo "<b>Print avec les informations par défauts :</b><br>" . $floor2->createFloor() . "<br>";

//* print les promotions
//* ---------------------------
$year = new DateTime('2024-05-09');
$grade = new Grade(8, 6, "Master Art de garder la tête haute", $year);
$grade2 = new Grade();
echo "<b>Print avec des nouvelle informations :</b><br>" . $grade->createGrade() . "<br>";
echo "<b>Print avec les informations par défauts :</b><br>" . $grade2->createGrade() . "<br>";

//* print les salles
//* ---------------------------
$room = new Room(8, 12, "Salle de faire les mauvais choix", 521);
$room2 = new Room();
echo "<b>Print avec des nouvelle informations :</b><br>" . $room->createRoom() . "<br>";
echo "<b>Print avec les informations par défauts :</b><br>" . $room2->createRoom() . "<br>";
?>