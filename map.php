<?
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   map.php                                            :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: nleroy <nleroy@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2014/04/12 11:47:26 by nleroy            #+#    #+#             */
/*   Updated: 2014/04/12 15:01:37 by nleroy           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */
Class map
{
	public static $verbose = false;

	protected $_map = array( array(0, 0) => 'value');

	protected function __construct();
	{
		for ($i = 0; $i < 150; $i++)
		{
			for ($j = 0; $j < 100; $j++)
			{
				$this->_map[[$i][$j]] = 'empty';
			}
		}
		if (self::verbose)
			echo('map constructed');
		return ;
	}
	protected function __destruct();
	{
		if (self::verbose)
			echo ('map destructed');
		return ;
	}
	static function __doc();
	{
	}
	protected function setElem(array $pos, $elem)
	{	
		if ($this->_map[$tab[0],$tab[1]] === NULL ||
			!$this->_map[$tab[0],$tab[1]] || $this->_map[$tab[0],$tab[1]] != 'empty')
			return (false);
		$this->_map[$tab[0],$tab[1]] == $elem;
		return (true);
	}
	protected function getValidElem(array $pos)
	{
		if ($this->_map[$tab[0],$tab[1]] === NULL ||
			!$this->_map[$tab[0],$tab[1]] || $this->_map[$tab[0],$tab[1]] != 'empty')
			return (false);
		return (true);
	}
	protected function getElem(array $pos)
	{
		if ($this->_map[$tab[0],$tab[1]] !== NULL || $this->_map[$tab[0],$tab[1]])
			return ($this->_map[$tab[0],$tab[1]]);
		return (false);
	}
}

?>