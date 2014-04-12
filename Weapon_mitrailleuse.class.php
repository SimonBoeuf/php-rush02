<?php

require_once("Weapon.class.php");
require_once("Ship.class.php");

class Weapon_laser.class.php extends Weapon{

public function __construct()
{
	$_range = 30;
	$_radius = 1;
	$_type = "mitrailleuse";
	$_propagation = 0;
}
public function __destruct()
{

}


}

?>