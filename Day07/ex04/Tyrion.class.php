<?php

class Tyrion extends Lannister{
	public function sleepWith($one) {
		if ($one instanceof Lannister)
			print ("Not even if I'm drunk !\n");
		else
			print ("Let's do this.\n");
	}
}

?>