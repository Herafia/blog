<?php
	/**
	 * Created by PhpStorm.
	 * User: wilder
	 * Date: 20/11/18
	 * Time: 11:54
	 */
	
	namespace App\Service;
	
	
	class Slugify
	{
		public function generate(string $string) : string
		{
			$string = trim($string);
			$pattern = "#[[:punct:]]#";
			$string = preg_replace($pattern, "", $string);
			$string = str_replace('à', 'a', $string);
			$string = str_replace("ç", "c", $string);
			$string = str_replace(' ', '-', $string);
			return $string;
		}
	}