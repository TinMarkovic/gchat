<?php
class UserFactory
{
	public static function getById($id){
		$sql = "SELECT * FROM user WHERE id = '$id'";
		$result = DB::$db->query($sql);
		
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
	
}
?>
