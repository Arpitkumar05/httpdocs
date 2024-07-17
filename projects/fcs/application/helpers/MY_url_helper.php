<?php

/*
 * Un-create URL Title
 * Takes a url "titled" string as de-constructs it to a human readable string.
 */
if (!function_exists('de_url_title')) {

    function de_url_title($string, $separator = '_') {

        $output = ucfirst(str_replace($separator, ' ', $string));

        return trim($output);
    }

}


/**
 * This file is part of the array_column library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey (http://benramsey.com)
 * @license http://opensource.org/licenses/MIT MIT
 */
if (!function_exists('array_column')) {
    /**
     * Returns the values from a single column of the input array, identified by
     * the $columnKey.
     *
     * Optionally, you may provide an $indexKey to index the values in the returned
     * array by the values from the $indexKey column in the input array.
     *
     * @param array $input A multi-dimensional array (record set) from which to pull
     *                     a column of values.
     * @param mixed $columnKey The column of values to return. This value may be the
     *                         integer key of the column you wish to retrieve, or it
     *                         may be the string key name for an associative array.
     * @param mixed $indexKey (Optional.) The column to use as the index/keys for
     *                        the returned array. This value may be the integer key
     *                        of the column, or it may be the string key name.
     * @return array
     */
    function array_column($input = null, $columnKey = null, $indexKey = null)
    {
        // Using func_get_args() in order to check for proper number of
        // parameters and trigger errors exactly as the built-in array_column()
        // does in PHP 5.5.
        $argc = func_num_args();
        $params = func_get_args();
        if ($argc < 2) {
            trigger_error("array_column() expects at least 2 parameters, {$argc} given", E_USER_WARNING);
            return null;
        }
        if (!is_array($params[0])) {
            trigger_error(
                'array_column() expects parameter 1 to be array, ' . gettype($params[0]) . ' given',
                E_USER_WARNING
            );
            return null;
        }
        if (!is_int($params[1])
            && !is_float($params[1])
            && !is_string($params[1])
            && $params[1] !== null
            && !(is_object($params[1]) && method_exists($params[1], '__toString'))
        ) {
            trigger_error('array_column(): The column key should be either a string or an integer', E_USER_WARNING);
            return false;
        }
        if (isset($params[2])
            && !is_int($params[2])
            && !is_float($params[2])
            && !is_string($params[2])
            && !(is_object($params[2]) && method_exists($params[2], '__toString'))
        ) {
            trigger_error('array_column(): The index key should be either a string or an integer', E_USER_WARNING);
            return false;
        }
        $paramsInput = $params[0];
        $paramsColumnKey = ($params[1] !== null) ? (string) $params[1] : null;
        $paramsIndexKey = null;
        if (isset($params[2])) {
            if (is_float($params[2]) || is_int($params[2])) {
                $paramsIndexKey = (int) $params[2];
            } else {
                $paramsIndexKey = (string) $params[2];
            }
        }
        $resultArray = array();
        foreach ($paramsInput as $row) {
            $key = $value = null;
            $keySet = $valueSet = false;
            if ($paramsIndexKey !== null && array_key_exists($paramsIndexKey, $row)) {
                $keySet = true;
                $key = (string) $row[$paramsIndexKey];
            }
            if ($paramsColumnKey === null) {
                $valueSet = true;
                $value = $row;
            } elseif (is_array($row) && array_key_exists($paramsColumnKey, $row)) {
                $valueSet = true;
                $value = $row[$paramsColumnKey];
            }
            if ($valueSet) {
                if ($keySet) {
                    $resultArray[$key] = $value;
                } else {
                    $resultArray[] = $value;
                }
            }
        }
        return $resultArray;
    }
}

	// make friendly url using any string
	if (!function_exists('friendlyURL')) {
		function friendlyURL($inputString){
			$url = strtolower($inputString);
			$patterns = $replacements = array();
			$patterns[0] = '/(&amp;|&)/i';
			$replacements[0] = '-and-';
			$patterns[1] = '/[^a-zA-Z01-9]/i';
			$replacements[1] = '-';
			$patterns[2] = '/(-+)/i';
			$replacements[2] = '-';
			$patterns[3] = '/(-$|^-)/i';
			$replacements[3] = '';
			$url = preg_replace($patterns, $replacements, $url);
		return $url;
		}
	}
	
	// sanitized number :  function auto remove unwanted character form given value 
	if (!function_exists('sanitized_number')) {
		function sanitized_number($_input) 
		{ 
			return (float) preg_replace('/[^0-9.]*/','',$_input); 
		}
	}
	
	// sanitized filename :  function auto remove unwanted character form given file name
	if (!function_exists('sanitized_filename')) {
		function sanitized_filename($filename){
			$sanitized = preg_replace('/[^a-zA-Z0-9-_\.]/','', $filename);
			return $sanitized;
		}
	}
	
	// check, is file exist in folder or not
	if (!function_exists('file_isexist')) {
		function file_isexist($source='', $file='', $defalut=''){
			if(!$file) return base_url().$source.$defalut;
				
			if(file_exists(FCPATH.$source.$file)):
				return base_url().$source.$file;
			else:
				return base_url().$source.$defalut;
			endif;
		}
	}
	
	if (!function_exists('my_explode')) {
		function my_explode($string){
			if($string):
			$array = explode(",",$string);
			// print_r($array);die;
				return $array;
				
			else:
				return '';
			endif;
		}
	}
	
	if (!function_exists('submenu_active')) {
		function submenu_active($str){

			$page = 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			return strstr($page,$str) ?  'class="active"' : '';
		}
	}
	
	/*
	 * Show correct image
	 */
	if (!function_exists('correct_image')) {
		function correct_image($imageurl, $type = '') {
			if($type=='original'):
				$imageurl = str_replace('/thumb','',$imageurl);
			elseif($type):
				$imageurl = str_replace('thumb',$type,$imageurl);
			endif;
			return trim($imageurl);
		}
	}

	/*
	 * Encription
	 */
	if (!function_exists('manoj_encript')) {
		function manoj_encript($text) {
			$text	=	'MANOJ'.$text.'KUMAR';
			return	base64_encode($text);
		}
	}
	
	/*
	 * Decription
	 */
	if (!function_exists('manoj_decript')) {
		function manoj_decript($text) {
			$text	=	base64_decode($text);
			$text	=	str_replace('MANOJ','',$text);
			$text	=	str_replace('KUMAR','',$text);
			return $text;
		}
	}
	
	/*
	 * Word Limiter
	 */
	define("STRING_DELIMITER", " ");
	if (!function_exists('word_limiter')){
		function word_limiter($str, $limit = 10){
			$str = strip_tags($str); 
			if (stripos($str, STRING_DELIMITER)){
				$ex_str = explode(STRING_DELIMITER, $str);
				if (count($ex_str) > $limit){
					for ($i = 0; $i < $limit; $i++){
						$str_s.=$ex_str[$i].'&nbsp;';
					}
					return $str_s.'...';
				}else{
					return $str;
				}
			}else{
				return $str;
			}
		}
	}
	
	/*
	 * Get charector acording to number
	 */
	if (!function_exists('get_char_accod_number')){
		function get_char_accod_number($num=''){
			$numeric 		= 	($num - 1) % 26;
			$letter 		= 	chr(65 + $numeric);
			$num2 			= 	intval(($num - 1) / 26);
			if($num2 > 0){
				return get_char_accod_number($num2).$letter;
			}else{
				return $letter;
			}
		}
	}
	
	if (!function_exists('cell_alignment')){
		function cell_alignment($rotate=''){
			$rotate		=	$rotate==''?0:$rotate;
			return array(
						'alignment' => array(
							'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
							'vertical' 	 => PHPExcel_Style_Alignment::VERTICAL_CENTER,
							'rotation'   => $rotate,
							'wrap'       => true
						)
					);
		}
	}
	
	if (!function_exists('cell_color')){
		function cell_color($type=''){
			$color	=	($type=='green'?'66FF00':($type=='yellow'?'FFFF33':($type=='orange'?'FF6600':'FFFFFF')));
			return array(
						'fill' => array(
							'type' => PHPExcel_Style_Fill::FILL_SOLID,
							'color' => array('rgb' =>$color)
						),
						'borders' => array(
							'outline' => array(
							  'style' => PHPExcel_Style_Border::BORDER_THIN
							)
						)
					);
		}
	}
	
	if (!function_exists('font_size_bold')){
		function font_size_bold(){
			return array(
						'font' => array(
							'bold'  => true,
							'size'  => 16
						)
					);
		}
	}
	
	if (!function_exists('rename_file_name')){
		function rename_file_name($filename='',$replasefrom='',$replaceto=''){
			$thumbfilename				=	str_replace(base_url(),'',$filename);
			$originalfilename			=	str_replace('thumb/','',$thumbfilename);
			if(file_exists(FCPATH.$thumbfilename)):
				$newtthumbfilename		=	str_replace($replasefrom,$replaceto,$thumbfilename);
				@unlink($newtthumbfilename);
				rename($thumbfilename, $newtthumbfilename);
			endif;
			$newtthumbfilename			=	base_url().$newtthumbfilename;
			
			if(file_exists(FCPATH.$originalfilename)):
				$neworiginalfilename	=	str_replace($replasefrom,$replaceto,$originalfilename);
				@unlink($neworiginalfilename);
				rename($originalfilename, $neworiginalfilename);
			endif;
			$neworiginalfilename		=	base_url().$neworiginalfilename;
			
			return $newtthumbfilename;
		}
	}
