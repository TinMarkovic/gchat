<?php

//~ SELECT permission.permission
//~ FROM role
//~ INNER JOIN userRole
//~ ON role.id=userRole.roleId
//~ INNER JOIN rolePermission
//~ ON role.id=rolePermission.roleId
//~ INNER JOIN permission
//~ ON rolePermission.permissionId=permission.id
//~ WHERE userRole.userId = ?;

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
	
	//	Napraviti logiku gdje se nalaze permisije koje zahtjeva jedna akcija,
	//	te ih vraćati kroz ovu funkciju. Za sad, radi primjera, idem bezvezno napraviti.
	$perms = "universal";
	
	return $perms;
}
	
}
?>
