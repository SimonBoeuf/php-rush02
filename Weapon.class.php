<?php

require_once("Ship.class.php");

abstract class Weapon {

	protected $_range = 0;
	protected $_radius = NULL;
	protected $_type = NULL;
	protected $_propagation;
	protected $_pos_w;

	public function __construct()
	{

	}
	public function __destruct()
	{

	}
	public function get_range(){return ($this->_range)};
	public function get_radius(){return ($this->_radius)};
	public function get_type(){return ($this->_type)};
	public function get_propagation(){return ($this->_propagation)};
	public function get_pos_w(){return ($this->_pos_w)};
}pos_w