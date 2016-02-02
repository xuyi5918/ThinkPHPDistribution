<?php
/**
*数组的key为数组的id
**/
function ArrayKey(&$arr){
	if(is_array($arr)){
		foreach($arr as $k=>$v){
			$new_arr[$v['id']]=$v;
		}
		$arr=$new_arr;
	}
}
/**
*数组转化成字符串
*$word 字符串
*$tb 间隔符
**/
function Array2String($arr,$tb=','){
	$data=$tb;
	$data .=implode($tb,$arr);
	$data.=$tb;
	return $data;
}
function String2Array($word,$tb=','){
	$all=explode($tb,$word);
	new_arrayfilter($all);
	return $all;
}
/**
 * 改进array_filter 删除数组中的空值
 * 无返回值
**/
function new_arrayfilter(&$arr){
	if(is_array($arr)){
		foreach( $arr as $k=>$v){
			if(!is_array($v)){
				if(empty($v)) unset($arr[$k]);
			}else{
				new_arrayfilter($arr[$k]);
			}
		}
	}
}
/**
*转化数值格式
*100.00
**/
function price($price){
	return sprintf("%.2f",$price);
}
/*
* 缩略图方法
* $img 图片的地址及名称
* $width 缩略图宽
* $height 缩略图高
*/
function Thumb($img,$width='',$height=''){
	$thumb_img='Public/thumb.jpg';
	if($img){
		$img=substr($img,1);
		$is_img=GetImageSize('./'.$img);	
		//设置宽高 生成缩略图
		if(!empty($width) && !empty($height)){
			import('ORG.Util.Image');
			$Image = new Image();
			
			$filename ='Uploads/thumb/'.$width.'_'.$height.'/'; //缩略图存储路径
			$new_name=strtr($img,array('/'=>'_'));
			if (!file_exists($filename)){ 
				@mkdir($filename,0755);
			}
			if($is_img){
				$is_thumb=GetImageSize('./'.$filename.$new_name);
				if($is_thumb){
					$thumb_img=$filename.$new_name;
				}else{
					$Image->thumb($img,$filename.$new_name,'',$width,$height);
					$thumb_img=$filename.$new_name;
				}
			}
		}else{
			if($is_img){
				$thumb_img=$img;
			}
		}
	}	
	return '/'.$thumb_img;
	
}
/**
 * 返回正整数，如果非正整数返回0
 * @param type $num
 * @return type
 */
function numberval($num){
    if(!is_numeric($num)) return 0;
	$num = (int)$num;
    if(is_int($num) && $num>=0){
        return $num;
    }else{
        return 0;
    }
}

/**
 * 截取字符串长度，过来所有HTML格式
 * @param string $str 字符串
 * @param int $len 长度
 * @param string $tail 尾巴跟的字符
 */
function sub_str($data, $len, $tail='...',$strip=''){
    $data = strip_tags($data, $strip);
    $str = $data;
    for( $i=0; $i<$len; $i++ ) {
        $temp_str = substr($str,0,1);
        if(ord($temp_str) > 127) {
            $i++;
            if( $i<$len ) {
                $new_str[] = substr($str,0,3);
                $str = substr($str,3);
            }
        }else{
            $new_str[] = substr($str,0,1);
            $str = substr($str,1);
        }
    }
    $str = join($new_str);
    if(utf8_len($data)>$len) $str .= $tail;
    return $str;
}

/**
 * 统计字utf-8符串长度，一个汉字算两个字节
 * @param type $str 字符串
 * @return int 长度
 */
function utf8_len($str){
     $count = 0;
     $str = iconv('utf-8','gbk',$str);
     $num = strlen($str);
     for($i=0;$i<$num;$i++){
         if(ord(substr($str,$i+1,1))>127){
             $count++;
             $i++;
        }
     }
     $str = iconv('gbk','utf-8',$str);
     $total = mb_strlen($str,'utf8');
     $number = ($total-$count)+($count*2);
     return $number;
}

function randCode($length=5,$type=0){
	$arr = array(1 => "0123456789", 2 => "abcdefghijklmnopqrstuvwxyz", 3 => "ABCDEFGHIJKLMNOPQRSTUVWXYZ", 4 => "~@#$%^&*(){}[]|");
	if ($type == 0){
		array_pop($arr);
		$string = implode("", $arr);
	}elseif($type == "-1"){
		$string = implode("", $arr);
	}else{
		$string = $arr[$type];
	}
	$count = strlen($string) - 1;
	$code = '';
	for($i = 0; $i < $length; $i++){
		$code .= $string[rand(0, $count)];
	}
	return $code;
}

function Title(){
	$Result=M('config');
	$data=$Result->where('id = 1')->select();
	return $data[0]['content'];
}

function HOST(){
	$Result=M('config');
	$data=$Result->where('id = 2')->select();
	return $data[0]['content'];
}

function keywords(){
	$Result=M('config');
	$data=$Result->where('id = 3')->select();
	return $data[0]['content'];
}

function desc(){
	$Result=M('config');
	$data=$Result->where('id = 4')->select();
	return $data[0]['content'];
}

function footer(){
	$Result=M('config');
	$data=$Result->where('id = 5')->select();
	return $data[0]['content'];
}
?>
