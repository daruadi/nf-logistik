<?php

if (!function_exists('pre_dump')) 
{
	function pre_dump(...$data)
	{
		echo "<pre>";
		foreach ($data as $key => $value) {
			var_dump($value);
		}
		die;
	}
}