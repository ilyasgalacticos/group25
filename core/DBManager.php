<?php 
	
	class DBManager{

		private $connection;

		public function __construct(){

			try{

				$this->connection = new PDO("mysql:host=localhost;dbname=group_25_shop", "root", "");
			
			}catch(PDOException $e){
				echo "<h3>Sorry, Database is temporary is unavailable</h3>";
			}


		}

		public function getUser($email){

			$result = null;

			try{

				$query = $this->connection->prepare("
					SELECT * FROM users WHERE email = :u_email 
				");

				$query->execute(array(
					"u_email"=>$email
				));

				$result = $query->fetch();

			}catch(Exception $e){
				
				$result = null;

			}

			return $result;
		}

		public function addUser($email, $password, $full_name){
		
			$result = false;

			try{

				$query = $this->connection->prepare("
					INSERT INTO users (id, email, password, full_name)  
					VALUES (NULL, :u_email, :u_password, :u_full_name)
				");

				$query->execute(array(
					"u_email"=>$email,
					"u_password"=>$password,
					"u_full_name"=>$full_name
				));

				$result = $this->connection->lastInsertId();

			}catch(Exception $e){
				
				$result = false;

			}

			return $result;

		}


		public function addPasswordHistory($user_id, $password){

			$result = false;

			try{

				$query = $this->connection->prepare("
					INSERT INTO password_histories (id, user_id, password, assigned_time)   
					VALUES (NULL, :user_id, :password, NOW())
				");

				$query->execute(array(
					"user_id"=>$user_id,
					"password"=>$password
				));

				$result = true;

			}catch(Exception $e){
				
				$result = false;

			}

			return $result;
		}

		public function updateUserPhotoName($user_id, $imagename){
		
			$result = false;

			try{

				$query = $this->connection->prepare("
					UPDATE users SET imagename = :imagename WHERE id = :user_id 
				");

				$query->execute(array(
					"imagename"=>$imagename,
					"user_id"=>$user_id
				));

				$result = true;

			}catch(Exception $e){
				
				$result = false;

			}

			return $result;

		}

	}

?>