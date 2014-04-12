<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Player.php                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: nleroy <nleroy@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2014/04/12 14:11:10 by nleroy            #+#    #+#             */
/*   Updated: 2014/04/12 15:48:08 by nleroy           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

Class Player
{
	private $name;
	private static $verbose=false;

	protected $ship = array();

	public function __construct(array $ships, $name)
	{
		for ($i = 0; count($ships) >= $i; $i = $i + 1)
		{
			$this->ship[$i] = new ($ships[$i])(array($name));
		}
		$this->name = $name;
		if (self::verbose)
			echo ('player constructed');
	}
	public function __destruct()
	{
		if (self::verbose)
			echo ('player constructed');
	}
	private function Select_ship(array $pos)
	{
		$ship = static::$map->getElem($pos);
		if (!EMPTY($ship)) && $ship->getPlayer() == $this->name && $ship->getactiv() == false)
		{
			$ship->setactiv() == true;
			if (self::verbose)
				echo ('turn ended');
			return $ship;
		}
		return FALSE;
	}
	//moove the $ship toward $i
	public function Moove_ship( $i, $ship )
	{
		switch ($i){
		case 0:
			if ( $ship->getstationary() == TRUE )
				return TRUE;
			else{
				if ( setmoove_stop( $ship ) )
					return TRUE;
				return FALSE;
			}
		case 1:
			if ( $ship->getstationary() == TRUE ){
				$ship->setorientation( 1 );
				return TRUE;
			}
			else{
				if ( setmoove_left( $ship ))
					return TRUE;
				return FALSE;
			}
		case 2:
			if ( setmoove_straight( $ship ))
				return TRUE;
			return FALSE;
		case 3:
			if ( setmoove_right( $ship ))
				return TRUE;
			return FALSE;
		}
	}
	public function Setfire_ship( $ship )
	{
		$weapon = $ship->getweapon( $i );
		return ()
	}
	private function setmoove_stop ( $ship )
	{
		$i = $ship->getinertie();
		$x = $ship->getpos['x'];
		$y = $ship->getpos['y'];
		switch ( $ship->getorientation() ){
		case 1:
			$x -= $i;
			break;
		case 2:
			$y += $i;
			break;
		case 3:
			$x += $i;
			break;
		$new_pos = array( 'x' => $x, 'y' => $y );
		$ship->setpos = $new_pos;
		$ship->setstationary = TRUE;
		}
	}
	private function setmoove_left( $ship )
	{
		$i = $ship->getinertie();
		$x = $ship->getpos['x'];
		$y = $ship->getpos['y'];
		switch ( $ship->getorientation() ){
		case 1:
			$x -= $i;
			$y += $ship->getspeed() - $i;
			$ship->setorientation( 4 );
		case 2:
			$x -= $ship->getspeed() - $i;
			$y -= $i;
			$ship->setorientation( 1 );
		case 3:
			$x += $i;
			$y -= $ship->getspeed() - $i;
			$ship->setorientation( 2 );
		case 4:
			$x -= $ship->getspeed() - $i;
			$y -= $i;
			$ship->setorientation( 1 );
		}
		$new_pos = array( 'x' => $x, 'y' => $y );
		$ship->setpos = $new_pos;
		$ship->setstationary = FALSE;
	}
	private function setmoove_straight( $ship )
	{
		$i = $ship->getinertie();
		$x = $ship->getpos['x'];
		$y = $ship->getpos['y'];
		switch ( $ship->getorientation() ){
		case 1:
			$x -= $ship->getspeed();
		case 2:
			$y -= $ship->getspeed();
		case 3:
			$x += $ship->getspeed();
		case 4:
			$y += $ship->getspeed();
		}
		$new_pos = array( 'x' => $x, 'y' => $y );
		$ship->setpos = $new_pos;
		$ship->setpos = $new_pos;
		$ship->setstationary = FALSE;
	}
	private function setmoove__right $ship )
	{
		$i = $ship->getinertie();
		$x = $ship->getpos['x'];
		$y = $ship->getpos['y'];
		switch ( $ship->getorientation() ){
		case 1:
			$x -= $i;
			$y -= $ship->getspeed() - $i;
			$ship->setorientation( 4 );
		case 2:
			$x += $ship->getspeed() - $i;
			$y -= $i;
			$ship->setorientation( 1 );
		case 3:
			$x += $i;
			$y += $ship->getspeed() - $i;
			$ship->setorientation( 2 );
		case 4:
			$x += $ship->getspeed() - $i;
			$y -= $i;
			$ship->setorientation( 1 );
		}
		$new_pos = array( 'x' => $x, 'y' => $y );
		$ship->setpos = $new_pos;
		$ship->setstationary = FALSE;
	}
}
?>
