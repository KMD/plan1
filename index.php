<?php include '__config.php'; ?>
<?php include 'models/Task.php'; ?>
<?php  $tasks = Task::getAllTasks(); ?>
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
			<form method="GET" action="#">
				<input type="checkbox" name="status-todo-filter" value=1/>
				<span class="status-todo">TODO</span>
				<input type="checkbox" name="status-inprogres-filter" value=1/>
				<span class="status-inprogress">IN PROGRESS</span>
				<input type="checkbox" name="status-done-filter" value=1/>
				<span class="status-done">DONE</span>
				<input type="checkbox" name="status-testing-filter" value=1/>
				<span class="status-testing">TESTING</span>
				<input type="checkbox" name="status-feedback-filter" value=1/>
				<span class="status-feedback">FEEDBACK</span>
				<button type="submit">Filter</button>
			</form>
			<hr/>
			<a href="#"> Add new task </a>
			<ul class="task-list">
				<?php foreach($tasks as $task): ?>
				<li>
					<span class="task-id"><?= $task->id ?></span>
					<span class="task-title"><a href="task.php?id=<?= $task->id ?>"><?= $task->title ?></a></span>
					<span class="task-status <?= $task->status_css ?>"><?= $task->status ?></span>
					<span class="task-assing"><?= $task->user ?></span>
				</li>
				<?php endforeach; ?>
			</ul>
			<a href="#"> Add new task </a>
			<hr/>
		</main>
		<script src="index.js"></script>
	</body>
</html>
