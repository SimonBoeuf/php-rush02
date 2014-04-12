<?php

require_once("Weapon.class.php");
require_once("Ship.class.php");

class Weapon_batterie.class.php extends Weapon{

public function __construct()
{

	$_range = array(0=>10, 1=>20, 2=>30);
	$_radius = 1;
	$_type = "batterie";
	$_propagation = 1;
}
public function __destruct()
{

}


}

?>