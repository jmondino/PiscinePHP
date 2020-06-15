#!/usr/bin/php
<?php
while(1)
{
	if (feof(STDIN))
	{
		echo"\n";
		exit;
	}
    echo "Entrez un nombre: ";
    $line = trim(fgets(STDIN));
    if(is_numeric($line))
    {
        if($line % 2 == 0)
            echo "Le chiffre $line est Pair\n";
        else
            echo "Le chiffre $line est Impair\n";
    }
    else if(!feof(STDIN))
        echo "'$line' n'est pas un chiffre\n";
}
?>