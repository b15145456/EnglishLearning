<?php
    
	function randlevel(){
	include("voc.php");
		$topicnum=6;
		$topiclv=array();//紀錄最終取出來各lv的題目
    $sum=0;//紀錄總共存到第幾個單字
    $lvnum=0;//紀錄該level有多少數量
    $lvtemp=array();//紀錄該level的單字資訊
    $lvchoosenum=array();//紀錄選出來的題號

    for($lv=1;$lv<=2;$lv++){//leval 1~10
    	$lvnum=0;
    	for($i=0;$i<count($A);$i++){
            if($A[$i][3]==$lv){
                $lvtemp[$lvnum]=$A[$i];
                $lvnum++;
            }//將符合level的單字資訊加到陣列
    	}
    	$lvchoosenum=leveltopic_rand($lvnum-1,$topicnum);
        for($i=0;$i<count($lvchoosenum);$i++){
        	 $topiclv[$sum]=$lvtemp[$lvchoosenum[$i]];//這樣加入的是整個單字的陣列,取出題目的話尾端加[0], EX $lvtemp[$lv][$lvchoosenum[$i]][0]
        	 $sum++;
        }
    }//$topiclv[$sum] 就是單字
    //限制 每level至少五單字 
	 
	return $topiclv;

	}
	
	
    function leveltopic_rand($lvnum,$topic_num){//(題目level的題庫數量,取的題數)
		error_reporting(0);//防止提醒顯示
		$a=0;
		$Ph_NB=array();
		$rand_num=0;
		$choose_num=array();
	
		for($i=0;$i<=$lvnum;$i++){
			$Ph_NB[$i]=$i;
		}//設定初值
	
		for($i=0;$i<=$topic_num-1;$i++){
			$rand_num=rand(0,$lvnum-$i);
			$choose_num[$i]=$Ph_NB[$rand_num];

			unset($Ph_NB[$rand_num]);
			$Ph_NB= array_values($Ph_NB);	
		    //2017.10.10上面這兩行出問題 Ph_Nb沒宣告成陣列處理問題
			$choose_num[$i]=$choose_num[$i];
		}
		return $choose_num; 
	}

	

	

	


?>