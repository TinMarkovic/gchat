<?php

class Auth{
public static function getPermissionList($uid){
		
		$sql = "SELECT permission.permission
				FROM role
				INNER JOIN userRole
				ON role.id=userRole.roleId
				INNER JOIN rolePermission
				ON role.id=rolePermission.roleId
				INNER JOIN permission
				ON rolePermission.permissionId=permission.id
				WHERE userRole.userId = ?;";
				
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("i", $uid);
		$stmt->execute();
		
		$result = $stmt->get_result();
		
		if($result === false) echo "Error! <br>";
		
		if($result->num_rows == 0) return false;
		
		// Move all resulting fields into an array(2d) of permissions, numerated.
		$obj = $result->fetch_all(MYSQLI_NUM);
				
		// Ensure it's not a 2-dimensional array that gets returned by FETCH_ALL
		$permList=array();
		for ($i=0; $i<count($obj); $i++) $permList[] = $obj[$i][0];  
		
		return ($permList);
	}
	
public static function getRequiredPermissions($name){

	$requiredPermissions = array(
		//	"" => array("" ,""),
			"checkexist" => array("See user"),
			"addrole" => array("Add role"),
			"addpermission" => array("Add permission"),
			"logout" => array("See user"),
			
	);
	
	if(isset($requiredPermissions[$name])) return $requiredPermissions[$name];
	return array("Undefined");
}
	
}
?>
