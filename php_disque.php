<?php
$br = (php_sapi_name() == "cli")? "":"<br>";

if(!extension_loaded('php_disque')) {
	dl('php_disque.' . PHP_SHLIB_SUFFIX);
}
$module = 'php_disque';
$functions = get_extension_funcs($module);
echo "Functions available in the test extension:$br\n";
foreach($functions as $func) {
    echo $func."$br\n";
}

$disque = new Disque();
try{
	$disque->connect('127.0.0.1',7711,3);
}catch(DisqueException $e){
	echo $e->getMessage();
	exit();
}
$disque->hello();

$disque->close();
?>
