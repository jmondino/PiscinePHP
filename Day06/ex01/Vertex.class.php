<?php

function print_zero($arg)
{
    if (strlen($arg) == 1)
        return $arg.".00";
	$dot = explode(".", $arg);
    if (strlen($dot[1]) > 2)
        return $arg."0";
    else
        return $arg;
}

class Vertex {
	private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 1;
	private $_color = 0;
	public static $verbose = false;

	public function __construct(array $tab) {
		if (array_key_exists('x', $tab))
			$this->_x = $tab['x'];	
		if (array_key_exists('y', $tab))
			$this->_y = $tab['y'];	
		if (array_key_exists('z', $tab))
			$this->_z = $tab['z'];
		if (array_key_exists('w', $tab))
			$this->_w = $tab['w'];
		if (array_key_exists('color', $tab) && ($tab['color'] instanceof color))
			$this->color = $tab['color'];
		else
			$this->color = new Color(array( 'red' => 255, 'green' => 255, 'blue' => 255));
		if (self::$verbose)
			echo "Vertex( x: ".print_zero($this->_x).", y: ".print_zero($this->_y).", z:".print_zero($this->_z).", w:".print_zero($this->_w).", Color( red: ".print_s($this->color->red).", green: ".print_s($this->color->green).", blue: ".print_s($this->color->blue)." ) ) constructed\n";
	}
	public function __destruct() {
		if (self::$verbose)
			echo "Vertex( x: ".print_zero($this->_x).", y: ".print_zero($this->_y).", z:".print_zero($this->_z).", w:".print_zero($this->_w).", Color( red: ".print_s($this->color->red).", green: ".print_s($this->color->green).", blue: ".print_s($this->color->blue)." ) ) destructed\n";
	}
	public function doc() {
		echo file_get_contents("Vertex.doc.txt");
	}
	public function __toString() {
		if (Self::$verbose)
			return "Vertex( x: ".print_zero($this->_x).", y: ".print_zero($this->_y).", z:".print_zero($this->_z).", w:".print_zero($this->_w).", Color( red: ".print_s($this->color->red).", green: ".print_s($this->color->green).", blue: ".print_s($this->color->blue)." ) )";
		else
			return "Vertex( x: ".print_zero($this->_x).", y: ".print_zero($this->_y).", z:".print_zero($this->_z).", w:".print_zero($this->_w)." )";
	}
	public function get_x() {
		return ($this->_x);
	}
    public function get_y() {
		return ($this->_y);
	}
    public function get_z() {
		return ($this->_z);
	}
    public function get_w() {
		return ($this->_w);
	}
    public function get_color() {
		return ($this->_color);
	}
    public function set_x($value) {
		$this->_x = $value;
	}
    public function set_y($value) {
		$this->_y = $value;
	}
    public function set_z($value) {
		$this->_z = $value;
	}
    public function set_w($value) {
		$this->_w = $value;
	}
    public function set_color($value)
    {
        if($value instanceof Color)
            $this->_color = $value;
    }
	
}

?>