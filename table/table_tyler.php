<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_tyler.php 27449 2014-06-18 22:49:03 @Tyler $
 *      $site: http://cname.cat606.url-test.com/forum.php
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_tyler extends discuz_table
{
	public function __construct() {

		$this->_table = '';
		$this->_pk    = 'id';
		parent::__construct();
	}

	public function _setTable($table,$pk='id')
	{
		$this->_table = $table; 
		if(!empty($pk))
			$this->_pk = $pk; 
	}

	public function insert($data, $return_insert_id = false, $replace = false, $silent = false) {
		if(!$data) {
			return;
		}
		return DB::insert($this->_table, $data, $return_insert_id, $replace, $silent);
	}

	public function update($val, $data) {
		if(!$data) return;
		return DB::update($this->_table, $data, DB::field($this->_pk, $val));
	}

	public function delete($val){
		return DB::delete($this->_table, DB::field($this->_pk, $val));
	}

	public function count($arr){
		$keys = array_keys($arr);
		$tmp = array();
		foreach($keys as $key)
		{
			$tmp[] = "`".$key."`='".$arr[$key]."'";
		}
		return !empty($arr) ? DB::result_first('SELECT COUNT(*) FROM '.DB::table($this->_table).' WHERE '.implode(' AND ', $tmp)):0;
	}

	public function fetch($arr,$mod="one"){
		$keys = array_keys($arr);
		$tmp = array();
		foreach($keys as $key)
		{
			$tmp[] = "`".$key."`='".$arr[$key]."'";
		}
		if('many' == $mod){
			return !empty($arr) ? DB::fetch_all('SELECT * FROM FROM '.DB::table($this->_table).' WHERE '.implode(' AND ', $tmp)) : array();
		} else {
			return !empty($arr) ? DB::fetch_first('SELECT * FROM FROM '.DB::table($this->_table).' WHERE '.implode(' AND ', $tmp)) : array();
		}
		
	}
}

?>