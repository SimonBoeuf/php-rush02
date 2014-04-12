<?php

require_once("Ship.class.php");
require_once("Weapon_mitrailleuse.class.php");
require_once("Weapon_laser.class.php");

class Medium_ship extends Ship{

public $point = 200;


function __construct(array $kwargs)
{
	$this->_Player = $kwargs[0];
	$this->_hp = 4;
	$this->_inertie = 3;
	$this->_size = array(w => 5, h=>3);
	$this->_pp = 5;
	$this->_point = 200;
	$this->_sprite = "";
	$this->_speed = 16;
	$new_w = new Weapon_laser;
	array_push($this->_weapon, $new_w);
	$new_w = new Weapon_mitrailleuse;
	array_push($this->_weapon, $new_w);
}
function __destruct()
{
}

}

?>