<?php include '__config.php'; ?>
<?php include 'models/Task.php'; ?>
<?php include 'models/User.php'; ?>
<?php 
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$task = Task::getTask($id);
$statuses = Task::getStatuses();
$users = User::getAllUsers();
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
                    <form method="POST">
                        <label for="title">Title:</label><br/>
                        <input type="text" id="title" name="title" value="<?= $task->title ?>">
                        <br/>
                        
                        <br/>
                        <label for="status">Status:</label>
                        <br/>
                        <select name="status" id="status">
                            <?php foreach($statuses as $status): ?>
                            <option <?php echo ($task->status == $status)? "selected": ""; ?>><?= $status ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br/>
                        
                        <br/>
                        <label for="user">User:</label><br/>
                        <select name="user" id="user">
                            <?php foreach($users as $user): ?>
                            <option value="<?= $user->id ?>" <?php echo ($task->user_id == $user->id)? "selected": ""; ?>><?= $user->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br/>
                        
                        <br/>
                        <label for="description">Description:</label><br/>
                        <textarea name="description" ><?= $task->description ?></textarea>
                        <br/>
                        
                        <br/>
                        <button type="submit">Save</button>
                    </form>
		</main>
		<script src="index.js"></script>
	</body>
</html>