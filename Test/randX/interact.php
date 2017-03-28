<?php

if(!(phpversion()>'7.0.0')){
	exit("php版本请大于7.0.0\n");
}

require(__DIR__.'/rand3.php');
require(__DIR__.'/myTestRand.php');

function testFunction($method, $input, $testTimes){
	
	$counterMap	= [];
	$startTime = getMillisecond();
	$same2 = 0;
	$same3 = 0;
	$same4 = 0;
	$same5 = 0;
	$same6 = 0;
	$sameArr = [];
	for($i = 0 ; $i < $testTimes ; $i++){
		$fruit = $method($input);
		if($i==0){
			$queue1 = $fruit;
		}
		if($i == 1){
			$queue2 = $queue1;
			$queue1 = $fruit;
			if($queue2 == $queue1)
				$same2++;
		}
		if($i == 2){
			$queue3 = $queue2;
			$queue2 = $queue1;
			$queue1 = $fruit;
				if($queue3 == $queue2){
					$same2++;
					if($queue2 == $queue1)
						$same3++;
				}
		}
		if($i == 3){
			$queue4 = $queue3;
			$queue3 = $queue2;
			$queue2 = $queue1;
			$queue1 = $fruit;
			if($queue4 == $queue3){
				$same2++;
				if($queue3 == $queue2){
					$same3++;
					if($queue2 == $queue1)
						$same4++;
				}
			}
		}
		if($i==4){
			$queue5 = $queue4;
			$queue4 = $queue3;
			$queue3 = $queue2;
			$queue2 = $queue1;
			$queue1 = $fruit;
			if($queue5 == $queue4){
				$same2++;
				if($queue4 == $queue3){
					$same3++;
					if($queue3 == $queue2){
						$same4++;
						if($queue2 == $queue1)
							$same5++;
					}
				}
			}
		}else{
			$queue6 = $queue5;
			$queue5 = $queue4;
			$queue4 = $queue3;
			$queue3 = $queue2;
			$queue2 = $queue1;
			$queue1 = $fruit;
			if($queue6 == $queue5){
				$same2++;
				if($queue5 == $queue4){
					$same3++;
					if($queue4 == $queue3){
						$same4++;
						if($queue3 == $queue2){
							$same5++;
							if($queue2 == $queue1){
								$same6++;
								$sameArr[] = $queue1;
							}
						}
					}
				}
			}
		}
		if(!array_key_exists($fruit,$counterMap)) 
			$counterMap[$fruit] = 1;
		else
			$counterMap[$fruit] += 1;
	}
	$endTime = getMillisecond();
	echo "+++++++++++++++++++++++++++++++++++".chr(10);
	echo "测 试 方 法 名  : \t\t" . $method.chr(10);
	echo "测  试  次  数  : \t\t" . $testTimes.chr(10);
	echo "测试时间总耗费费(毫秒): \t" . ($endTime-$startTime) .chr(10);
	echo "单次测试时间耗费(毫秒): \t" . ($endTime-$startTime)/$testTimes .chr(10);
	echo "连续2次同种奖励 : \t\t".$same2."(" . ($same2/$testTimes*100) . '%)'.chr(10).
	"连续3次同种奖励 : \t\t".$same3. "(" . ($same3/$testTimes*100) . '%)'. chr(10).
	"连续4次同种奖励 : \t\t".$same4. "(" . ($same4/$testTimes*100) . '%)'. chr(10).
	"连续5次同种奖励 : \t\t".$same5. "(" . ($same5/$testTimes*100) . '%)'. chr(10).
	"连续6次同种奖励 : \t\t".$same6. "(" . ($same6/$testTimes*100) . '%)'.chr(10);
	echo "连续6次奖品的统计表(实际值): ".chr(10);
	print_r(array_count_values($sameArr));
	$getPriceTimes = 0;
	echo "奖品频率统计:".chr(10);
	foreach($counterMap as $k => $v){
		$getPriceTimes += $v;
		$percent	= $v/$testTimes;
		$result		= $percent;
		$resultDiff	= ($input[$k]["weight"]/100-$percent);
		echo "物品 : ".$k."\t 概率 : ".$percent.", 误差 : ". $resultDiff. chr(10);
	}
	echo "获奖总次数  : " . $getPriceTimes.chr(10);
	echo "----------------------------------".chr(10);
}

$input  = [
		"apple"		=> ["weight" => 25],
		"pear"		=> ["weight" => 20],
		"banan"		=> ["weight" => 10],
		"orange"	=> ["weight" => 5],
		"cherry"	=> ["weight" => 40]
];
$AliasMethod= "getRand3";
$randMethod = "randTest";

$testTimes	= ($argc == 2 && is_numeric($argv[1]))? (int)$argv[1] : 1000000;

echo "匿名算法:".chr(10);
testFunction($AliasMethod, $input, $testTimes);
echo "拍脑袋随机算法".chr(10);
testFunction($randMethod, $input, $testTimes);


echo "连续6次奖品的统计表(理论值):". chr(10);
echo 'apple:' . $testTimes*0.25*0.25*0.25*0.25*0.25*0.25 .chr(10);
echo 'pear:' . $testTimes*0.2*0.2*0.2*0.2*0.2*0.2 .chr(10);
echo 'banana:' . $testTimes*0.1*0.1*0.1*0.1*0.1*0.1 .chr(10);
echo 'orange:' . $testTimes*0.05*0.05*0.05*0.05*0.05*0.05 .chr(10);
echo 'cherry:' . $testTimes*0.4*0.4*0.4*0.4*0.4*0.4 .chr(10);
