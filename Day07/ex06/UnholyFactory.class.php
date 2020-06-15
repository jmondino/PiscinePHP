<?php
	class UnholyFactory {
		private $absorbed = array();
		private $absorbed_type = array();

		public function absorb($k)
		{
			if(is_subclass_of($k, "Fighter"))
			{
				if(!in_array($k->getType(), $this->absorbed_type))
				{
					echo "(Factory absorbed a fighter of type ".
					$k->getType().")\n";
					array_push($this->absorbed, $k);
					array_push($this->absorbed_type, $k->getType());
				}
				else
					echo "(Factory already absorbed a fighter of type ".
					$k->getType().")\n";
			}
			else
				echo "(Factory can't absorb this, it's not a fighter)\n";
		}

		public function fabricate($type)
		{
			foreach($this->absorbed as $af)
			{
				if($af->getType() == $type)
				{
					echo "(Factory fabricated a fighter of type ".
					$type.")\n";
					return $af;
				}
			}
			echo "(Factory hasn't absorbed any fighter of type ".
			$type.")\n";
			return null;
		}

	}

?>
