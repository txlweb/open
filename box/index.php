<?php
/*
Power by txlweb
by 陈陆昊
TXLWEB工作室：陈陆昊制作
这是一个库，但愿你们没看到提示

 */
	function login($username , $password , $log='0' , $dblocal='data.php'){
		require($dblocal);
				for ($i=0; $i < $useri; $i++) { 
		if($user[$i] == $username){
			if ($pass[$i] == $password){
				$err=$username . $password;
				if ($log == '1'){
				echo'user-pass.on++:' . $i . '<br/>';
			}
			if ($log == '2'){
				echo $i;
				        	
			}
			$myfile = fopen('login', "w");
fwrite($myfile, $i);
fclose($myfile);
			}else{
				$err='pass';
				if ($log == '1'){
				echo'pass.enttor:' . $i . '<br/>';
			}
			}
		}else{
			$err='user';
			if ($log == '1'){
			echo'user.enttor:' . $i . '<br/>';
		}
		}
	}
	echo '程序会在不久后跳转，如果没有跳转，说明您的用户并不存在或密码错误';
	}
	function logout(){
		header('Location: /');
	}
	function read($filenamev){
$myfile = fopen($filenamev, "r") or die("Unable to open file!");
$texts = fread($myfile,filesize("$filenamev"));
fclose($myfile);
$textss = iconv("utf-8", "gb2312" , $texts);  
print_r ($textss);
}
function newfile($filename_dir='' , $filename='newfile' , $text=''){
	$dir = iconv("UTF-8", "GBK", $filename_dir);
        if (!file_exists($dir)){
            mkdir ($dir,0777,true);
                    	$myfile = fopen($filename_dir . $filename, "w");
$txt = "$text\n";
fwrite($myfile, $txt);
fclose($myfile);
        } else {
        	$myfile = fopen($filename_dir . $filename, "w");
$txt = "$text\n";
fwrite($myfile, $txt);
fclose($myfile);
        }
}
function textfile($filedir_name , $textr){
	        	$myfile = fopen($filedir_name, "w");
$txt = "$textr\n";
fwrite($myfile, $txt);
fclose($myfile);
}
function restname($filelestname , $filenewname){
	if (rename("$filelestname" , "$filenewname")){
	}else{
		echo 'die:no file';
	}
}
function newmodule($modulename='newcode' , $pa='' , $pb='' , $pc='' , $pd='' , $coder='echo \'hello word\';'){
	$code = '<?php function ' . $modulename . ' (' . $pa . ' , ' . $pb . ' , ' . $pc . '){' . $coder . '} ?>';
	$myfile = fopen($modulename . '.php', "w");
    fwrite($myfile, $code);
    fclose($myfile);
}
function mode($mode='0' , $log='ON'){
	if ($mode=='0'){
		error_reporting(0); //屏蔽程序中的错误
//定义Error_Handler函数，作为set_error_handler()函数的第一个参数“回调”
function error_handler($error_level,$error_message,$file,$line){
$EXIT =FALSE;
switch($error_level){
//提醒级别
case E_NOTICE:
case E_USER_NOTICE:
$error_type = '提示';
break;
//警告级别
case E_WARNING:
case E_USER_WARNING:
$error_type='警告';
break;
//错误级别
case E_ERROR:
case E_USER_ERROR:
$error_type='错误';
$EXIT = TRUE;
break;
//其他未知错误
default:
$error_type='未知';
$EXIT = TRUE;
break; 
}
$a=file($file);
$s=$a[$line-1];
echo $save='<p class="close">错误等级:<b>[' . $error_type . ']</b>错误类型：<b>[' . $error_message . ']</b>出错文件：<b>[' . $file . ']</b>问题行数:<b>[第' . $line . '行]</b><br>出错代码：' . $s . '</p>';
if ($log = 'ON'){
$myfile = fopen('Enttor.html', "a+");
$txt = "$save <br>";
fwrite($myfile, $txt);
fclose($myfile);
}
}
set_error_handler('error_handler');
trigger_error('已开启开发者模式.',E_USER_NOTICE);
	}else{
		error_reporting(0);
	}
}
function delerror (){
	unlink('../Enttor.html');
}
?>