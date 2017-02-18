<?php
if (isset($_GET['filter'])){
    $delimeter = $_GET['delimeter'];
    //*$arrayOfStudents = $_GET['names'];*/
    $arrayOfStudents = explode($delimeter, $_GET['names']);
    //*$arrayOfAges = $_GET['ages'];*/
    $arrayOfAges = explode($delimeter, $_GET['ages']);
}
include '2.2.2-Students_Frontend.php';
