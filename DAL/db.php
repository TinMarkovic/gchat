<?php
class DB extends mysqli
{
	
	public static $db;
	public $testVar = 'proba';
	
	public function __construct($host, $username, $password, $db)
	{
		parent::__construct($host, $username, $password, $db);
		if ($this->connect_errno) {
			printf("Connect failed: %s\n", $db->connect_error);
			exit();
		}
		self::$db = $this;
	}
	//normalni query ali automatski vraca error ako ne uspije
	public function query($sql)
	{
		$r = parent::query($sql);
		if (!$r) {
			echo $this->error;
		}
		return $r;
	}
	//pretvara mysqli_result u niz objekata => prima SQL string, vraca niz objekata
	public function toArray($sql)
	{
		$resultArray = array();
		if ($r = DB::$db->query($sql)) {
			//fetch associative array 
			while ($obj = $r->fetch_object()) {
				array_push($resultArray,$obj);
			}
		}
		if(count($resultArray) == 1) {
				return $resultArray[0];
		} else {
				return $resultArray;
			}
	}
	//radi real_escape_string nad clanovima niza => prima niz vrijednosti, vraca "ocisceni" niz vrijednosti
	public function clean($args)
	{
		foreach ($args as $key => $value){
			$args[$key] = DB::$db->real_escape_string($value);
		}
		return $args;
	}
}
?>
