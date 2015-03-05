<?php
	/*
	 * Load Framework
	*/
	require_once ( "core/init.php");

	// CHARLES HELPER FUNCTIONS
	function helper($var) {
	  $type = gettype ( $var );
	  echo '<h2>Var is type: '.$type.'.</h2>';

	  if($type == 'array') {
	    echo '<pre>'.print_r($var).'</pre>';  
	  } elseif($type == 'object') {
	    echo '<pre>'.var_dump($var).'</pre>';  
	  } elseif( ($type == "string") || ($type == "integer") ) {
	    echo '<h2>'.$var.'</h2>';
	  }
	  
	}

	// Wen Clean String format
	function cleanString($string){
	  $search = '/[^[:alpha:]]/';
	  $space = array("?","!",",",";", " ");
	  $replace = '-';
	  $newString = str_replace($search, $replace, $string);
	  $newString = strtolower($newString);
	  $newString = str_replace($space, $replace, $newString);

	  return $newString;

	}