<?php
require_once "Models/Role.php";


class UserRoleFactory
{
	public function getRolesByUserId($uid){
		$sql = "SELECT * FROM role WHERE id = (SELECT roleId FROM userRole WHERE userId = ?)";
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("i", $uid);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if($result === false) echo "Error!";
		
		if($result->num_rows == 0) return false;
		
		$objectList = array();
		
		while($obj = $result->fetch_object()){
			$role = new Role($obj->id,
								 $obj->name,
								 $obj->status);
			$objectList[] = $role;
		}
		
		return ($objectList);
	}
	
	
}

?>
