<?php
require "class/student.php";
require "class/floor.php";
require 'class/grade.php';
require 'class/room.php';

$birthdate = new DateTime('1998-08-12');

$student = new Student(1, 8, "test@gmail.com", "Alien War", $birthdate, "Homme");
echo "<b>Print avec des nouvelle informations :</b><br>" . $student->createStudent() . "<br>";

$student2 = new Student(1, 8, "test@gmail.com", "Sherlock Holmes", $birthdate, "Homme");
$email = 'nouveladressemail@gmail.com';
echo "<b>Print avec des nouvelle informations :</b><br>" . $student2->createStudent() . "<br>";

$student3 = new Student();
echo "<b>Print avec les informations par défauts :</b><br>" . $student3->createStudent() . "<br>";

$student4 = (new Student())->setFullname("OLAF");
echo $student4->createStudent();
echo $student4->getFullname();

$student5 = (new Student())->createStudent();
echo $student5;

$student6 = (new Student(1, 8, "test@gmail.com", "Alien War", $birthdate, "Homme"))->createStudent();
echo $student6;

$floor = new Floor(0, "Etage 3", 3);
$floor2 = new Floor();
echo "<b>Print avec des nouvelle informations :</b><br>" . $floor->createFloor() . "<br>";
echo "<b>Print avec les informations par défauts :</b><br>" . $floor2->createFloor() . "<br>";

$floor3 = (new Floor(856, "Etage 3", 85))->createFloor();
echo "<b>Print avec des nouvelle informations :</b><br>" . $floor3;

$year = new DateTime('2024-05-09');
$grade = new Grade(8, 6, "Master Art de garder la tête haute", $year);
$grade2 = new Grade();
echo "<b>Print avec des nouvelle informations :</b><br>" . $grade->createGrade() . "<br>";
echo "<b>Print avec les informations par défauts :</b><br>" . $grade2->createGrade() . "<br>";

$room = new Room(8, 12, "Salle de faire les mauvais choix", 521);
$room2 = new Room();
echo "<b>Print avec des nouvelle informations :</b><br>" . $room->createRoom() . "<br>";
echo "<b>Print avec les informations par défauts :</b><br>" . $room2->createRoom() . "<br>";
