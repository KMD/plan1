<?php include '__config.php'; ?>
<?php include 'models/task.class.php'; ?>
<?php 
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$task = Task::getTask($id);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Plan 1</title>
		<link rel="stylesheet" href="./style.css">
		<link rel="icon" href="./favicon.ico" type="image/x-icon">
	</head>
	<body>
		<?php include '_menu.php'; ?>
		<main>
			<a href="#">Edit</a>
			<h1> <?= $task->title ?> <span class="<?= $task->status_css ?>"><?= $task->status ?></span> (<?= $task->user ?>)</h1>
			
			<p><?= $task->description ?></p>
			<hr/>
			<a href="#">Add Comment</a>
		</main>
		<script src="index.js"></script>
	</body>
</html>
