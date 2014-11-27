<?php 
function __autoload($className){
	require('models/'.$className.'.class.php');
}
?>