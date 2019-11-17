<?php
#echo $_POST['errors'] . $_POST['warnings'];

#1 ошибка -> 1 ошибка
#1 warn -> 2 warns
#2 warn -> 1 err
#2 err -> got

function comm_calc($err, $warn)
{
	$tmperr = $err;
	$commits = round($warn / 2);
	#if ($warn % 2 != 0)
	#{
	#	$commits++;	
	#}
	#echo $commits . "<br>"; 
	$tmperr = $tmperr + $commits;
	#echo $tmperr . "<br>";
	if ($tmperr % 2 == 0)
	{
		return $commits + $tmperr / 2;
	}
	else 
	{
		return -1;
	}
}

echo comm_calc($_POST['errors'], $_POST['warnings']);
?>