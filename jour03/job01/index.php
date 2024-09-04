<h1>Job 1 : Revoir le principe de Class</h1>


<?php
//! pour utiliser une classe depuis un autre fichier --> il faut faire un require
// si il y a des dossier, toujours penser au chemin absolu
require "class/student.php";
require "class/floor.php";
require 'class/grade.php';


//* print des nouveau étudiants
//* ---------------------------
$birthdate = new DateTime('1998-08-12');
$student = new Student(1, 8, "test@gmail.com", "Alien War", $birthdate, "Homme");
$student2 = new Student(1, 8, "test@gmail.com", "Sherlock Holmes", $birthdate, "Homme");
$student3 = new Student();
echo "<b>Print avec des nouvelle informations :</b><br>" . $student->createStudent() . "<br>";
echo "<b>Print avec les informations par défauts :</b><br>" . $student2->createStudent() . "<br>";
echo "<b>Print avec des nouvelle informations :</b><br>" . $student3->createStudent() . "<br>";
//* print les étages
//* ---------------------------
$floor = new Floor(0, "Etage 3", 3);
$floor2 = new Floor();

echo "<b>Print avec des nouvelle informations :</b><br>" . $floor->createFloor() . "<br>";
echo "<b>Print avec les informations par défauts :</b><br>" . $floor2->createFloor() . "<br>";

//* print les promotions
//* ---------------------------
$grade = new Grade(8, 6, "Master Art de garder la tête haute", 2024);
$grade2 = new Grade();

echo "<b>Print avec des nouvelle informations :</b><br>" . $grade->createGrade() . "<br>";
echo "<b>Print avec les informations par défauts :</b><br>" . $grade2->createGrade() . "<br>";


//* print les salles
//* ---------------------------




?>