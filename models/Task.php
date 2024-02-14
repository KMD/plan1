<?php

class Task extends DBConnector{
	public $id;
	public $title;
	public $description;
	public $status;
        public $user_id;
	public $user;

	public static $statuses = [
		"TODO" => 'status-todo',
		"IN PROGRESS" => 'status-inprogress',
		"TESTING" => 'status-testing',
		"FEEDBACK" => 'status-feedback',
		"DONE" => 'status-done',
	];

	public function __construct(int $id, string $title, string $description, string $status, string $user, int $user_id){
		$this->id = $id;
		$this->title = $title;
		$this->description = $description;
		$this->status = $status;
		$this->user = $user;
                $this->user_id = $user_id;
		$this->status_css = self::$statuses[$this->status];
	}
        public static function getStatuses() {
            return array_keys(self::$statuses);
        }
        public static function getAllTasks(){
		$conn = parent::connect();
		$sql = "SELECT `task`.`id`, title, status, user_id, name AS user FROM `task` JOIN `user` ON `task`.`user_id` = `user`.`id`";
		$tasks = [];
		foreach ($conn->query($sql) as $row){
			$tasks[] = new Task($row['id'], $row['title'], "", $row['status'], $row['user'], $row['user_id']);
		}
		return $tasks;
	}
        public static function getTask(int $id) {
            $conn = parent::connect();
            $sql = "SELECT `task`.`id`, title, description, status, user_id, name AS user FROM `task` JOIN `user` ON `task`.`user_id` = `user`.`id` WHERE `task`.id = :id";
            $sth = $conn->prepare($sql);
            $sth->execute(["id" => $id]);
            $row = $sth->fetch();
            return new Task($row['id'], $row['title'], $row['description'], $row['status'], $row['user'], $row['user_id']);
        }
        public static function updateTask(int $id, string $title, string $status, string $description, int $user_id) {
            $conn = parent::connect();
            $sql = "UPDATE task SET title = :title, status = :status, description = :description, user_id = :user_id WHERE id = :id";
            $sth = $conn->prepare($sql);
            $sth->execute(["id" => $id, "title" => $title, "status" => $status, "description" => $description, "user_id" => $user_id]);
        }
}