<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   battlefield.php                                    :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: nleroy <nleroy@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2014/04/12 11:41:06 by nleroy            #+#    #+#             */
/*   Updated: 2014/04/12 20:54:52 by nleroy           ###   ########.fr       */
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

	/* construct battlefield. only used once per game */
	public function __construct(array $data)
	{
		if ($this->map === NULL)
			$this->map = new map;
		if ($this->data === NULL)
			$this->data = $data;
		if (self::verbose)
			echo('battlefiled on');
	}
	/* destruct battlefield. only used once per game */
	public function __destruct()
	{
		if (self::verbose)
			echo('battlefield over');
	}
	public static function doc()
	{
	}
	/* set ships and players's datas. only used once per game */
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
				$this->$_player[$i]['nb_ship'] = $i;
			}
			self::$launch = true;
		}
	}
	/* place ships on the battlefield. only used early in game */
	public function set_ship(array $pos, $player, $ship)
	{
		if ($this->map->getValidElem($pos) &&
			$this->map->getValidElem(array($pos[0]) + $this->_players[$player][$ship]->get_size()[0], ($pos[1]) + $this->_players[$player][$ship]->get_size()[1])
			&& $this->map->getValidElem(array($pos[0], ($pos[1]) + $this->_players[$player][$ship]->get_size()[1])) &&
			$this->map->getValidElem(array($pos[0], ($pos[1]) + $this->_players[$player][$ship]->get_size()[1])))
		{
			for ($i; $this->_players[$player][$ship]->get_size()[0] > $i ; $i++)
			{
				for ($j; $this->_players[$player][$ship]->get_size()[1] > $j ; $j++)
				{
					$this->map->setElem($pos[0] + $i; $pos[1] + $j) =  $this->_players[$player][$ship];
				}
			}
		}
		else 
		{
			return (false);
		}
	}
	/* select ship to use */
	public function turn_selectship(array $select)
	{
		if ($this->_selectedship = $this->_players[$this->selectedplayer]->Select_ship($select) == false)
			return (false);
		else
			return (true);
	}
	/* move selected ship */
	public function moveship()
	{
		if ($this->_players[$this->selectedplayer]->mooveship($turn, $this->selectedship))
			$this->_selectedship = 0;
	}
	/* shoot with selected ship */
	public function shoot($i)
	{
		$this->_players[$this->selectedplayer]->Setfire_ship($this->selectedship);		
	}
	/* change player */
	public function setturn($i)
	{
		$selected_player = $i;
	}
	/* reset values when all shipped have been used */
	public function reset($player)
	{
		if (count($this->_players[$player]) == $this->_players[$player]['nb_ship'])
		{
			for ($i ; count($this->_players[$player]) ; $i++)
			{
				$this->_players[$player][$i]->setactive() = false;
			}
		}
	}
}
?>