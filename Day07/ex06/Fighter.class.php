<?php

abstract class Fighter {

	private $_type;

	public function __construct($fighter_type)
	{
			$this->_type = $fighter_type;
	}

	public function getType()
	{
		return $this->_type;
	}

	public abstract function fight();
}

?>
