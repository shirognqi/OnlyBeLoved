<?php

	/**
	* 无论是投票,还是抽奖,就一种锁机制嘛,那么,why not 把YCE的全局锁的实现放在这里呢?
	* 思路,我们假设我们锁限制上限是Times,好吧为了好看我把Times明确的记录下来;
	*			Times
	* 之后,在redis里incer一个键,我们拿到一个值记作incerValue;
	*			incerValue
	* 特性 : 在redis\tair中,incerValue方法在没有那个键时将返回1,而且还是原子性的;
	* 那么我们比较一下Times和incerValue来确定是否被锁住;
	* 那么核心的困点是 内存足够快但稳定性稍差我心稍安呐,得有个Mysql落盘,
	* **这个可以后考虑***
	*/

	/**
	* function test($key, $times, $span){ 废弃,span还是挺好的,可以用作设定redis的生存期限,但是,我们还要考虑
	* 盘到数据库,你得写开始的时间和结束的时间,所以,这个算...坑;
	*/
	function timensLimitSpan($key, $times, $startTime,$endTime){
		if(paramIllegal($key, $times, $startTime,$endTime)){
			return false;
		}

		$redis		= Redis::getInstance();
		$value		= redis->get($key);
		if(is_int($value) && $value>0){
			if($value>$times){
				return false;
			}
		}
		$incValue	= $redis->incer($key); 
		if(is_int($incValue) && $incValue>0){
			if($incValue == 1){
				$expire = $endTime-$startTime;
				$redis->expire($key, $expire);
			}
			if($incValue>$times){
				return false;
			}else{
				return true;
			}
		}else{
			return false;
		}
	}

	
	function paramIllegal($inputObj){
		if(!is_string($inputObj->key) || $inputObj->key==""){
			return true;
		}
		if(!is_int($inputObj->times) || $inputObj->times<=0){
			return true;
		}
		if(!is_int($inputObj->startTime) || $inputObj->startTime<=0){
			return true;
		}
		if(!is_int($inputObj->endTime) || $inputObj->endTime<=0){
			return true;
		}
		if($inputObj->endTime<$inputObj->startTime){
			return false;
		}
		return false;
	}





	/**
	* 获取当前到今天24:00的剩余时间(s)
	*/

	/**
	* 奖品的问题,频次控制
	*/

	/**
	* 奖品的问题,概率控制
	*/
