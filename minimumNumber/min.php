<?php
function minimumNumber($n, $password) {
    // Return the minimum number of characters to make the password strong
    $res = 0;
    $check = 0;
	$free = 0;

    if ($n < 6) {
        $free = 6 - $n;
    }
	
	$uppercase = preg_match('@[A-Z]@', $password);
	if (!$uppercase) {
		$check++;
	}
	$lowercase = preg_match('@[a-z]@', $password);
	if (!$lowercase) {
		$check++;
	}
	$number = preg_match('@[0-9]@', $password);
	if (!$number) {
		$check++;
	}
	$speciaux = preg_match('#^(?=.*\W)#', $password);
	if (!$speciaux) {
		$check++;
	}
	
	$res = $free + $check;
	if ($n < 6) {
		$res = ($free <= $check) ? $check : $free;
	}
    
    return $res;
}

$answer = minimumNumber($n = 3, $password = '9!a');
echo $answer . "\n";