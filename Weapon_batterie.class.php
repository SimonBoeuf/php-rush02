<?php

require_once("Weapon.class.php");
require_once("Ship.class.php");

class Weapon_batterie.class.php extends Weapon{

public function __construct()
{
	$_range = 15;
	$_radius = 1;
	$_type = "batterie";
	$_propagation = 1;
}
public function __destruct()
{

}


}

?>