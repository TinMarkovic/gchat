<?php
class UserFactory
{
	public static function getById($id){
		$sql = "SELECT * FROM user WHERE id = ?";
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if($result->num_rows == 0) return FALSE;
		
		$obj = $result->fetch_object();
		return new User($obj->username,
						 $obj->password,
						 $obj->firstName,
						 $obj->lastName,
						 $obj->email,
						 $obj->birthday,
						 $obj->id,
						 $obj->status);
	}
	public static function getByUsername($un){
		$sql = "SELECT * FROM user WHERE username = ?";
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("s", $un);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if($result->num_rows == 0) return false;
		
		$obj = $result->fetch_object();
		return new User($obj->username,
						 $obj->password,
						 $obj->firstName,
						 $obj->lastName,
						 $obj->email,
						 $obj->birthday,
						 $obj->id,
						 $obj->status);
	}

}
?>
