<?php
require "class/student.php";

$birthdate = new DateTime('1998-08-12');
$student = new Student(1, 8, "test@gmail.com", "Alien War", $birthdate, "Homme");
$student2 = new Student(1, 8, "test@gmail.com", "Sherlock Holmes", $birthdate, "Homme");
$student3 = new Student();
echo $student->createStudent();
echo $student2->createStudent();
echo $student3->createStudent();