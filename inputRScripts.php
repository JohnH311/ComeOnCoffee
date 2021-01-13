<?php
final class R_script
{
	private static $pathTmp = '/tmp/';
	private static $pathRbin = 'D:/R-3.6.3/bin/x64/';
	
	public function run($s)
	{
		$sKey = 'r-php-script-' . md5(time().rand()).".R";
		$fInput = self::$pathTmp.$sKey;
		
		//echo $fInput;
		
		$fp=fopen($fInput,"w+");
		fwrite($fp,$s);
		fclose($fp);
		$_GET['x'] = 1;
		
		//$res = exec(self::$pathRbin . '--slave -q --no-save < ' .$fInput);
		//$res = shell_exec("Rscript r-php-script-46c76619fa215806cee21b8771eefa84.R {$_GET['x']}");
		//unlink($fInput);
		
		return $res;
	}
}
?>