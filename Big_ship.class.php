<?php

require_once("Ship.class.php");
require_once("Weapon_canon.class.php");
require_once("Weapon_batterie.class.php");
require_once("Weapon_mitrailleuse.class.php");

class Big_ship extends Ship{

function __construct(array $kwargs)
{
	$this->_Player = $kwargs[0];
	$this->_hp = 12;
	$this->_inertie = 5;
	$this->_size = array(w => 9, h=>4);
	$this->_pp = 10;
	$this->_point = 400;
	$this->_sprite = "";
	$new_w = new Weapon_canon;
	array_push($this->_weapon, $new_w);
	$new_w = new Weapon_batterie;
	array_push($this->_weapon, $new_w);
	$new_w = new Weapon_mitrailleuse;
	array_push($this->_weapon, $new_w);
}
function __destruct()
{
}

}

?>