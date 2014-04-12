<?php

require_once("Weapon.class.php");
require_once("Ship.class.php");

class Weapon_mitrailleuse.class.php extends Weapon{

public function __construct()
{
	$_range = array(0=>20, 1=>40, 2=>60);
	$_radius = 1;
	$_type = "mitrailleuse";
	$_propagation = 0;
}
public function __destruct(new)
{

}


}

?>