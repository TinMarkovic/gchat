<?php
require_once "RoomFactory.php";
class MessageFactory
{
	public static function getListByRoom($roomId){
		$sql = "SELECT user.username, message.dateTime, message.content FROM message 
		INNER JOIN user ON user.id = message.userId		
		WHERE roomId = ? ORDER BY dateTime DESC";
		
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("i", $roomId);
		$stmt->execute();
		
		$result = $stmt->get_result();
		if($result->num_rows == 0) return FALSE;
		
		$room = RoomFactory::getById($roomId);
		$roomInfo = array("Room Name" => $room->_name,
						  "Room Description" => $room->_description);
		
		$dbarray = $result->fetch_all(MYSQLI_ASSOC);
		
		$endresult = array_merge($roomInfo, $dbarray);
		
		return $endresult;
	}

}
?>
