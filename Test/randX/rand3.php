<?php

function getRand3($proArr){
		$result = "";
		$data = $prize = [];
		$prob = $alias = [];
		foreach($proArr as $key => $pinfo){
				$data[]  = ($pinfo['weight']/100);
				$prize[] = $key;
		}
		data_init($data, $prob, $alias);
		$result = generation($prob, $alias);
		return $prize[$result];
}

function data_init($data, &$prob, &$alias){
		$nums	= count($data);
		$small	= $large = [];
		for($i=0; $i<$nums; $i++){
				$data[$i] *= $nums;
				if($data[$i]<1){
						$small[] = $i;
				}else{
						$large[] = $i;
				}
		}
		while(!empty($small) && !empty($large)){
				$n_index = array_shift($small);
				$a_index = array_shift($large);
				$prob[$n_index]  = $data[$n_index];
				$alias[$n_index] = $a_index;

				$data[$a_index] = $data[$a_index] + $data[$n_index] -1;
				if($data[$a_index]<1){
						$small[] = $a_index;
				}else{
						$large[] = $a_index;
				}
		}
}

function getMillisecond() {
		list($t1, $t2) = explode(' ', microtime());
		return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
}



function generation($prob, $alias) {
		$nums = count($prob) - 1;
		$MAX_P = 1000000; // 假设最小的几率是百万分之一
		$coin_toss = rand(1, $MAX_P) / $MAX_P; // 抛出硬币
		$col = rand(0, $nums); // 随机落在一列
		$b_head = ($coin_toss < $prob[$col]) ? TRUE : FALSE;
		return $b_head ? $col : $alias[$col];
}
