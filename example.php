<?php
  
	include 'notify.php';
	
	// Show this message
	Notify::msg('Hello World');
	
	// Show title and message
	Notify::msg('Hello World','Developer');
	
	// Say any text
	Notify::say('Hello World');
	
?>