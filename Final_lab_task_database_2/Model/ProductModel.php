<?php

	require_once('db.php');

	function validateUser($username, $password){

		$conn = getConnection();

		$sql = "select * from products where user_name='{$username}' and password='{$password}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		if(count($row) > 0){
			return true;
		}else{
			return false;
		}
	}

	function getUserById($id){

		$conn = getConnection();

		$sql = "select * from products where id='{$id}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		return $row;
	}

	function getAllUser(){
		$conn = getConnection();
		$sql = "select * from products";
		$result = mysqli_query($conn, $sql);
		$users =[];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function insertUser($user){

		$conn = getConnection();
		$sql = "insert into products values('{$user['username']}', '{$user['password']}', '{$user['email']}')";

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function updateProduct($products){

		$conn = getConnection();
		$sql = "update products set $user = ['name'=> $name, 'buyingPrice'=>$buyingPrice, 'sellingPrice'=>$sellingPrice, 'profit'=>''.$sellingPrice-$buyingPrice];

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function deleteProduct($products){
		$conn = getConnection();
		$sql = "delete from products where id={$id}";

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

?>