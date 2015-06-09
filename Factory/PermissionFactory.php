<?php
class PermissionFactory
{
	public static function getById($id){
		$sql = "SELECT * FROM permission WHERE id = ?";
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if($result->num_rows == 0) return FALSE;
		
		$obj = $result->fetch_object();
		return new Permission($obj->permission,
							  $obj->type,
							  $obj->status,
							  $obj->id);
	}
	public static function getByPermission($perm){
		$sql = "SELECT * FROM permission WHERE permission = ?";
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("s", $perm);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if($result->num_rows == 0) return false;
		
		$obj = $result->fetch_object();
		return new Permission($obj->permission,
							  $obj->type,
							  $obj->status,
							  $obj->id);
	}

}
?>
