<?php
function ft_is_sort($tab)
{
	$i = 0;
	$sort = $tab;
	sort($sort);
	while ($i < count($tab))
	{
		if ($tab[$i] != $sort[$i])
			return false;
		$i++;
	}
	return true;
}
?>