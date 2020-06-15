<?php

function print_s($arg)
{
	if (strlen($arg) == 1)
		return "  ".$arg;
	if (strlen($arg) == 2)
		return " ".$arg;
	else 
		return $arg;
}

class Color { 
	public static $verbose = false;
	public $red = 0;
	public $green = 0;
	public $blue = 0;

	public function __construct( array $tab) {
		if (array_key_exists('red', $tab) && array_key_exists('blue', $tab) && array_key_exists('green', $tab))
		{
			$this->red = intval($tab['red']);
			$this->green = intval($tab['green']);
			$this->blue = intval($tab['blue']);
		}
		else if (array_key_exists('rgb', $tab))
		{
			$val = intval($tab['rgb']);
			$this->red = ($val >> 16) % 256;
			$this->green = ($val >> 8) % 256;
			$this->blue = ($val) % 256;
		}
		if (self::$verbose)
			echo "Color( red: ".print_s($this->red).", green: ".print_s($this->green).", blue: ".print_s($this->blue)." ) constructed.\n";
	}
	public static function doc() {
		echo file_get_contents("Color.doc.txt");
	}
	public function __Destruct() {
		if (self::$verbose)
			echo "Color( red: ".print_s($this->red).", green: ".print_s($this->green).", blue: ".print_s($this->blue)." ) destructed.\n";
	}
	public function __toString() {
		return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
	}
	public function add($add) {
		return (new Color(array('red' => $this->red + $add->red, 'green' => $this->green + $add->green, 'blue' => $this->blue + $add->blue)));
	}
	public function sub($sub) {
		return (new Color(array('red' => $this->red - $sub->red, 'green' => $this->green - $sub->green, 'blue' => $this->blue - $sub->blue)));
	}
	public function mult($mult) {
		return (new Color(array('red' => $this->red * $mult, 'green' => $this->green * $mult, 'blue' => $this->blue * $mult)));
	}
	
}
?>
