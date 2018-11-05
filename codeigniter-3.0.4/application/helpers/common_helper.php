<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// General function
function toUserDateFormat($date)
{
	if($date=="")
		return "";
	$dateValues = explode('-',$date);
	if( count( $dateValues ) != 3 )
		return $date;
	return $dateValues[2].'-'.$dateValues[1].'-'.$dateValues[0];
}

function isValidDate( $date ){
	$dateValues = explode('-',$date);
	if( count( $dateValues ) != 3 )
		return false;

	if( !preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date ) )
		return false;

	return checkdate($dateValues[1], $dateValues[2], $dateValues[0]);
}

function toSystemDateFormat($date)
{
	if($date=="")
		return "";
	$dateValues = explode('-',$date);
	if( count( $dateValues ) != 3 )
		return $date;
	return $dateValues[2].'-'.$dateValues[1].'-'.$dateValues[0];
}

function toUserCurrencyFormat($value)
{
	return str_replace('.00', '', number_format($value, 2, '.', ','));
}

function echoValue($variable){
	return isset($variable) ? $variable : '';
}