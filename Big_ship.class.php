<?php

require_once("Ship.class.php");

class Big_ship extends Ship{

function __construct(array $kwargs)
{
	$this->_Player = $kwargs[0];
	if ($kwargs[1] == "human")
	{
		$this->_hp = 12;
		$this->_inertie = 5;

	}
	else if ($kwargs == "eldar")
	{
		$this->_hp = 11;
		$this->_inertie = 4;
	}
	else if ($kwargs == "orks")
	{
		$this->_hp = 13;
		$this->_inertie = 6;		
	}
	$this->_size = array(w => 9, h=>4);
	$this->_pp = 10;
	$this->_point = 800;
	$this->_sprite = "";
}
function __destruct()
{
}

}

?>