<?php

abstract class Vaisseau {

	protected $_hp = 0;
	protected $_name = NULL;
	protected $_size = array(h=>1, w=>1);
	protected $_shield = 0;
	protected $_speed = 0;
	protected $_inertie = 0;
	protected $_weapon = array();
	protected $_sprite;//img
	protected $_pp = 0;
	protected $_faction = NULL;
	protected $_activ = false;
	protected $_pos = array(x=>0,y=>0);
	protected $_orientation = 0;
	protected $_color =;
	protected $_stationary = true;
	protected $_point = 0;
	protected $_Player;
	protected $_touch = false;


	public function __construct(array $kwargs)
	{
	}
	public function __destruct()
	{
	}
	public static function doc()
	{
	}
	public function is_dead()
	{
	}

	public function gethp(){return ($this->_hp)};
	public function getname(){return ($this->_name)};
	public function getcolor(){return ($this->_color)};
	public function getshield(){return ($this->_shield)};
	public function getactiv(){return ($this->_activ)};
	public function getpp(){return ($this->pp)};
	public function getsprite(){return ($this->sprite)};
	public function getpos(){return ($this->pos)};
	public function getorientation(){return ($this->_orientation)};
	public function getinertie(){return ($this->_inertie)};
	public function getspeed(){return ($this->_speed)};
	public function getsize(){return ($this->_size)};
	public function gettouch(){return ($this->_touch)};
	public function getstationary(){return ($this->_stationary)};
	public function getPlayer(){return ($this->_Player)};
	public function getweapon($indice)
	{
		if (!array_key_exists($indice, $_weapon))
			return false;
		else
			return ($_weapon[$indice]);
	}
	public function get_pos_weapon($indice)
	{
		return (getweapon($indice)->get_pos_weapon());
	}

	public function sethp($value){$this->_hp = $value};
	public function setname($value){$this->_name = $value};
	public function setcolor($value){$this->_color = $value};
	public function setshield($value){$this->_shield = $value};
	public function setactiv($value){$this->_activ = $value};
	public function setpp($value){$this->_pp = $value};
	public function setsprite($value){$this->_sprite = $value};
	public function setpos($value){$this->_pos = $value};
	public function setorientation($value){$this->_orientation = $value};
	public function setstationary($value){$this->_stationary = $value};
	public function settouch($value){$this->_touch = $value};

}

?>