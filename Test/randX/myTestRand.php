<?php
class LocalStorage{
	static $i=0;
	static function incer(){
		$incValue = self::$i+1;
		if($incValue > 200000) $incValue = 0;
		self::$i = $incValue;
		return $incValue;
	}
}

function randTest($input){
	$bigBang = 100000;
	$inc = LocalStorage::incer();
	$sed = LocalStorage::incer()+time();
	mt_srand($sed);
	$randTop = 100*$bigBang-1;
	$randval = mt_rand(0, $randTop);
	if(($inc%2) == 1) $randval = $randTop-$randval;
	$inputFix = [];
	$i = 0;
	foreach($input as $k => $v){
		$inputFix[$i] = [
			'key'	=>  $k,
			'value' =>  $v['weight']
		];
		$i++;
	}
	shuffle($inputFix);
	$fruit = '';
	$incer = 0;
	$index = 0;
	if($randval == 0) return $inputFix[0]['key'];
	while($randval>$incer){
		$fruit = $inputFix[$index]['key'];
		$incer += $inputFix[$index]['value']*$bigBang;
		$index++;
	}
	if($fruit=='') return $inputFix[$index]['key'];
	return $fruit;
}
