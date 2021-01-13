
<?php

final class R_script
{
	private static $pathTmp = '/tmp/';
	private static $pathRbin = '/R-3.6.3/bin/x64/R';
	
	public function run($s)
	{
		$sKey = 'r-php-script-' . md5(time().rand()).".R";
		$fInput = self::$pathTmp.$sKey;
		
		//echo $fInput;
		
$output;
$return_var;

//exec("dir /w", $output, $return_var);
//echo $output ;
//print_r($output);
echo '<br>';
		
		$fp=fopen($fInput,"w+");
		fwrite($fp,$s);
		fclose($fp);
		$_GET['x'] = 1;
		
		//$res = exec(self::$pathRbin . '--slave -q --no-save < ' .$fInput);
		exec("path D:\R-3.6.3\bin\x64; %path%");
		//exec("cd \rscripts");
		//exec('c:\WINDOWS\system32\cmd.exe /c START PATH_TO_LAUNCHER\LAUNCHER.bat');
		echo passthru("Rscript D:\xampp\htdocs\comeOn\qwer.R",$res);
		//passthru('dir D:\RStudio\bin',$res);
		//exec("dir",$res);
		//echo $res;
		//$res = shell_exec("Rscript r-php-script-46c76619fa215806cee21b8771eefa84.R {$_GET['x']}");
		//unlink($fInput);
		//iconv('EUC-KR','UTF-8',$res[17]);
		//$res = fopen("temp.txt","r") or die("파일을 열 수 없습니다!");
		
		/*while(!feof($res) ) {
			echo iconv("EUC-KR","UTF-8",fgets($res));
		}*/

		//print_r($res);

		return $res;
	}
}

/*exec("C:\\WINDOWS\system32\cmd.exe
		  /c START C:\\xampp\htdocs\comeOn\test.bat");*/
		  
		 $a;
		 $return_var;
		 exec("Rscript test.r");
		 system("type temp4.txt",$a);
		 
	//include("./inputRScripts.php");
	$s='
			x <- c(14,26,68,47,33,95)
			y <- c(10,32,89,57,75,80)
			mean(x)
			mean(y)
			cor(x,y,method="pearson")
	';
	$tmp = new R_script;
	echo $a;
	print_r($a);
	
	//echo $tmp->run($s);
?>

<!--?php
	error_reporting(E_ALL & ~E_NOTICE);
	if(isset($_GET['N']))   {
	  $N = $_GET['N'];    
	exec("c:\WINDOWS\system32\cmd.exe/c START
		  D:\xampp\htdocs\comeOn\test.bat $N", $output);
	echo '<pre>', join("\r\n", $output), "</pre>\r\n";
	  $nocache = rand();
	  echo("<img src='temp.png?$nocache' />");
	}

	$out .= "
	<form method='get'>
	   Number values to generate: <input type='text' name='N' />
	   <input type='submit' />
	</form>";
	echo $out;
?-->