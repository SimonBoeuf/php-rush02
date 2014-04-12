<?php

require_once("Ship.class.php");
require_once("Weapon_laser.class.php");

class Small_ship extends Ship{

function __construct(array $kwargs)
{
	$this->_Player = $kwargs[0];
	$this->_hp = 4;
	$this->_inertie = 2;
	$this->_size = array(w => 3, h=>2);
	$this->_pp = 5;
	$this->_point = 100;
	$this->_sprite = "";
	$this->_speed = 20;
	$new_w = new Weapon_laser;
	array_push($this->_weapon, $new_w);
}
function __destruct()
{
}

}

?>