<?php

require_once("Weapon.class.php");
require_once("Ship.class.php");

class Weapon_canon.class.php extends Weapon{

public function __construct()
{
	$_range = array(0=>30, 1=>60, 2=>90);
	$_radius = 9;
	$_type = 'canon';
	$_propagation = 0;

}
public function __destruct()
{

}


}

?>