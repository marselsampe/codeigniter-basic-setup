<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function convertDate($date)
{
	if($date=="")
		return "";
	$dateValues = explode('-',$date);
	return $dateValues[2].'-'.$dateValues[1].'-'.$dateValues[0];
}

function formatUangMinus($value){
	if((int)$value < 0){
		$value = number_format(abs($value));
		return '( '.$value.' )';
	}else{
		return number_format($value);
	}
}