<?php 
include '__config.php';
include 'models/Task.php';

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
Task::deleteTask($id);
header("Location: http://localhost/plan1/index.php");
