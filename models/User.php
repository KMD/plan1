<?php

class User extends DBConnector{
    public $id;
    public $name;
    
    public function __construct(int $id, string $name) {
        $this->id = $id;
        $this->name = $name;
    }
    
    public static function getAllUsers() {
        $conn = parent::connect();
        $sql = "SELECT id, name FROM `user`";
        $users = [];
	foreach ($conn->query($sql) as $row){
		$users[] = new User($row['id'], $row['name']);
	}
	return $users;
        
    }
}
