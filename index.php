<?php

$Arr = [1,43,54,62,21,66,32,78,36,76,39,39];

$SelectAsc = SelectAsc($Arr);
echo '选择排序：<br/>';
print_r($SelectAsc);

$PopAsc = PopAsc($Arr);
echo '<br/>冒泡排序：<br/>';
print_r($PopAsc);

$QuickAsc = QuickAsc($Arr);
echo '<br/>快速排序：<br/>';
print_r($QuickAsc);
/**
 * 选择排序
 * @param [type] $Arr [description]
 * 将第一个数与后面的数依次比较，如果小，则替换到第一个，第一轮完毕，选出最小的数放置在第一个位置
 * 第二轮，从第二个数开始，重复第一步，结束后，选出第二小的数放置在第二处
 * 依次进行，有多少个数，就进行多少此循环比较
 */
function SelectAsc ($Arr){
	for ($i=0; $i < count($Arr); $i++) { 
		# code...
		$a = $Arr[$i];
		for($j=$i+1;$j<count($Arr);$j++){
			if($a > $Arr[$j]){
				$change = $Arr[$j];
				$Arr[$j] = $a;
				$a = $Arr[$i] = $change;
			}

		}
		
	}
	// print_r($Arr);die;
	return $Arr;
}

/**
 * 冒泡排序
 * @param [type] $Arr [description]
 * 相邻两个数进行对比
 * 从第一个数开始，将两个相邻的数进行对比，大的放后边，小的放前面，第一轮之后，最大的数放置在最后
 * 第二轮对比，排除最后面最大的数，重复第一步
 */
function PopAsc ($Arr){
	$num = count($Arr);
	for($i=1;$i<$num;$i++){
		for($j=0;$j<$num-$i;$j++){
			if($Arr[$j+1]<$Arr[$j]){
				$change = $Arr[$j];
				$Arr[$j] = $Arr[$j+1];
				$Arr[$j+1] = $change;
			}
		}
		// print_r($Arr);
		// die;
	}
	return $Arr;
}

/**
 * 快速排序（二分查找）
 * @param [type] $Arr [description]
 * 以第一个数为基准，将剩下的数按照大小分成两拨
 * 分成的两拨重复第一步，再各分成2拨，再重复第一步，直到只剩下一个数据或没有数据（每次分完后，合并数组）
 */
function QuickAsc ($Arr){
	$num = count($Arr);
	if($num > 1){
		$a = $Arr[0];
		$leftArr = [];
		$rightArr = [];
		for($i = 1; $i < $num; $i++){
			if($Arr[$i]<$a){
				$leftArr[] = $Arr[$i];
			}else{
				$rightArr[] = $Arr[$i];
			}
		}
		$leftArr = QuickAsc($leftArr);
		$rightArr = QuickAsc($rightArr);
		return array_merge($leftArr,array($a),$rightArr);
		// var_dump(array_merge($leftArr,$a,$rightArr)) ;
 	}else{
 		return $Arr;
 	}
}

?>