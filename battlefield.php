<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   battlefield.php                                    :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: nleroy <nleroy@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2014/04/12 11:41:06 by nleroy            #+#    #+#             */
/*   Updated: 2014/04/12 17:49:03 by nleroy           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */
require_once "map.php"

Class Battlefield
{

	public static $verbose = false;
	public	static $launch = false;
	public $data;
	private $_selectedship;
	private $_selectedplayer = 0;
	private $_players = array();
	protected $map;

	public function __construct(array $data)
	{
		if ($this->map === NULL)
			$this->map = new map;
		if ($this->data === NULL)
			$this->data = $data;
		if (self::verbose)
			echo('battlefiled on');
	}
	public function __destruct()
	{
		if (self::verbose)
			echo('battlefield over');
	}
	public static function doc()
	{
	}
	public static function launch()
	{
		if (self::$launch == false)
		{
			for($i = 0; count($this->data) > $i; $i++)
			{
				$this->$_players[$i] = $this->data[$i];
				for($j = 0; count($this->data[$j]) > $j; $j++)
				{
					$this->$_players[$i][$j] = new ($this->data[$i][$j]);
				}
			}
			self::$launche = true;
		}
	}
	public function turn_selectship(array $select)
	{
		if ($this->_selectedship = $this->_players[$this->selectedplayer]->Select_ship($select) == false)
			return (false);
		else
			return (true);
	}
	
	public function moveship()
	{
		$this->_players[$this->selectedplayer]->mooveship($turn, $this->selectedship);
	}
	public function shoot($i)
	{
		$this->_players[$this->selectedplayer]->Setfire_ship($this->selectedship);		
	}
	public function setturn($i)
	{
		$selected_player = $i;
	}
}
?>