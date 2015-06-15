<?php
class roleFactory
{
	public static function getById($id){
		$sql = "SELECT * FROM role WHERE id = ?";
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if($result->num_rows == 0) return FALSE;
		
		$obj = $result->fetch_object();
		return new Role($obj->name,
							  $obj->id,
							  $obj->status);
	}
	public static function getByName($perm){
		$sql = "SELECT * FROM role WHERE name = ?";
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("s", $perm);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if($result->num_rows == 0) return false;
		
		$obj = $result->fetch_object();
		return new Role($obj->name,
							  $obj->id,
							  $obj->status);
	}
	
	//~ Mislim da je nismo dovršili i zamjenili smo je drugim stvarima
	//~ public static function getByUserId($uid){
		//~ $sql = "SELECT * FROM role WHERE userId = ?";
		//~ $stmt = DB::$db->prepare($sql);
		//~ $stmt->bind_param("s", $uid);
		//~ $stmt->execute();
		//~ $result = $stmt->get_result();
		//~ 
		//~ if($result->num_rows == 0) return false;
		//~ 
		//~ $obj = $result->fetch_object();
		//~ return new Role($obj->name,
						//~ $obj->id,
						//~ $obj->status);
	//~ }
}
?>
