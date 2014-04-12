<?php

require_once("Ship.class.php");

class Small_ship extends Ship{

function __construct(array $kwargs)
{
	if ($kwargs[1] == "human")
	{
		$this->_hp = 4;
		$this->_inertie = 3;

	}
	else if ($kwargs == "eldar")
	{
		$this->_hp = 3;
		$this->_inertie = 2;
	}
	else if ($kwargs == "orks")
	{
		$this->_hp = 5;
		$this->_inertie = 4;		
	}
	$this->_size = array(w => 3, h=>2);
	$this->_pp = 5;
	$this->_point = 200;
	$this->_sprite = "";
}
function __destruct()
{
}

}

?>