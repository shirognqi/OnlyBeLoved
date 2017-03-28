<?php

$file = fopen("./2017-03-26-taobao-access_log", "r"); // 这个文件1.4G

$i=0;
$j=0;
while(! feof($file)){
		$line  = fgets($file);
		$instr = strstr($line, 'sub');
		if($instr){
				$timeLine	= "26/Mar/2017:";
				$position	= strpos($line,$timeLine);
				$time		= substr($line,$position+strlen($timeLine),8);
				if($time>"19:40:00" && $time<"20:20:00")
					$j++;
				$i++;
		}else{
				continue;
		}
}
fclose($file);
echo chr(10).($j*123/2400).chr(10);
echo chr(10).($i*123/24/3600).chr(10);

