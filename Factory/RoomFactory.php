<?php
class RoomFactory
{
	public static function getById($id){
		$sql = "SELECT * FROM room WHERE id = ?";
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if($result->num_rows == 0) return FALSE;
		
		$obj = $result->fetch_object();
		return new Room($obj->type,
						 $obj->status,
						 $obj->password,
						 $obj->name,
						 $obj->description,
						 $obj->userCount,
						 $obj->userMax,
						 $obj->id,
						 $obj->creatorId);
	}
	public static function getByRoomName($rn){
		$sql = "SELECT * FROM room WHERE name = ?";
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("s", $rn);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if($result->num_rows == 0) return false;
		
		$obj = $result->fetch_object();
		return new Room($obj->type,
						 $obj->status,
						 $obj->password,
						 $obj->name,
						 $obj->description,
						 $obj->userCount,
						 $obj->userMax,
						 $obj->id,
						 $obj->creatorId);
	}

}
?>
