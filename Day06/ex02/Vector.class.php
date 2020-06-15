<?php

class Vector {
	private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 0;
	public static $verbose = false;

	public function __construct(array $tab) {		
		
		if (array_key_exists('dest', $tab) && ($tab['dest'] instanceof Vertex))
		{
			if (array_key_exists('orig', $tab) && ($tab['orig'] instanceof Vertex))
			{
				$origin = new Vertex(array('x' => $tab['orig']->get_x(), 'y' => $tab['orig']->get_y(), 'z' => $tab['orig']->get_z()));
			}
			else
				$origin = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
			$this->_x = $tab['dest']->get_x() - $origin->get_x();
			$this->_y = $tab['dest']->get_y() - $origin->get_y();
			$this->_z = $tab['dest']->get_z() - $origin->get_z();
		}
		if (self::$verbose)
			echo $this." constructed\n";
	}
	public function __toString () {
		$result = vsprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", array($this->_x, $this->_y, $this->_z, $this->_w));
        return $result;
	}
	public function __destruct () {
		if (self::$verbose)
			echo $this." destructed\n";
	}
	public function doc () {
		echo file_get_contents("vector.doc.txt");
	}
	public function magnitude () {
		$sq = ($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z);
		return ((float)sqrt($sq));
	}
	public function normalize () {
		$norme = $this->magnitude();
		return (new Vector(array('dest' => new vertex(array('x' => ($this->_x / $norme), 'y' => ($this->_y / $norme), 'z' => ($this->_z / $norme))))));
	}
	public function add ($rhs) {
		return (new Vector(array('dest' => new vertex(array('x' => ($this->_x + $rhs->_x), 'y' => ($this->_y + $rhs->_y), 'z' => ($this->_z + $rhs->_z))))));
	}
	public function sub ($rhs) {
		return (new Vector(array('dest' => new vertex(array('x' => ($this->_x - $rhs->_x), 'y' => ($this->_y - $rhs->_y), 'z' => ($this->_z - $rhs->_z))))));
	}
	public function opposite () {
		return (new Vector(array('dest' => new vertex(array('x' => ($this->_x * -1), 'y' => ($this->_y * -1), 'z' => ($this->_z * -1))))));
	}
	public function scalarProduct ($k) {
		return (new Vector(array('dest' => new vertex(array('x' => ($this->_x * $k), 'y' => ($this->_y * $k), 'z' => ($this->_z * $k))))));
	}
	public function dotProduct ($rhs) {
		return (float)(($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z));
	}
	public function cos ($rhs) {
		return (float)($this->_x * $rhs->_x + $this->_y * $rhs->_y + $this->_z * $rhs->_z) / sqrt(($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z) * ($rhs->_x * $rhs->_x + $rhs->_y * $rhs->_y + $rhs->_z * $rhs->_z));
	}
	public function crossProduct ($rhs) {
		return (new Vector(array('dest' => new vertex(array("x" => $this->_y * $rhs->_z - $this->_z * $rhs->_y, "y" => $this->_z * $rhs->_x - $this->_x * $rhs->_z, "z" => $this->_x * $rhs->_y - $this->_y * $rhs->_x)))));
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
}

?>