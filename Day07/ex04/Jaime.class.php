<?php

class Jaime extends Lannister {
	public function sleepWith($one) {
        if ($one instanceof cersei)
            print ("With pleasure, but only in a tower in Winterfell, then.\n");
		if ($one instanceof Tyrion) 
			print ("Not even if I'm drunk !\n");
		if ($one instanceof Sansa) 
			print ("Let's do this.\n");
	}
}

?>