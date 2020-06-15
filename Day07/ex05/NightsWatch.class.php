<?php

class NightsWatch implements IFighter {
	private $array;

	public function recruit($name) {
		if ($name instanceof IFighter)
			$this->array[] = $name;
	}
	public function fight() {
		foreach ($this->array as $value)
			$value->fight();
	}
}

?>