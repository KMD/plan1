<?php

class Task extends DBConnector{
	public $id;
	public $title;
	public $description;
	public $status;
	public $user;

	private $statuses = [
		"TODO" => 'status-todo',
		"IN PROGRESS" => 'status-inprogress',
		"TESTING" => 'status-testing',
		"FEEDBACK" => 'status-feedback',
		"DONE" => 'status-done',
	];

	public function __construct(int $id, string $title, string $description, string $status, string $user){
		$this->id = $id;
		$this->title = $title;
		$this->description = $description;
		$this->status = $status;
		$this->user = $user;
		$this->status_css = $this->statuses[$this->status];
		
		
	}
	public static function getAllTasks(){
		$conn = parent::connect();
		$sql = "SELECT `task`.`id`, title, status, name AS user FROM `task` JOIN `user` ON `task`.`user_id` = `user`.`id`";
		$tasks = [];
		foreach ($conn->query($sql) as $row){
			$tasks[] = new Task($row['id'], $row['title'], "", $row['status'], $row['user']);
		}
		return $tasks;
	}
}