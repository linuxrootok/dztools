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

public function set_cache($identifier,$arr)
{
	$cacheFilePath = DISCUZ_ROOT.'./data/sysdata/cache_'.$identifier.'.php'; 
	if(file_exists($cacheFilePath))
		unlink($cacheFilePath);
	require_once DISCUZ_ROOT.'./source/function/function_cache.php';
	$cacheArray .= "\$contents=".arrayeval($arr,1).";\n";
	writetocache($identifier, $cacheArray);
}

public function get_cache($identifier)
{
	$cacheFilePath = DISCUZ_ROOT.'./data/sysdata/cache_'.$identifier.'.php'; 
	if(file_exists($cacheFilePath))
		include_once $cacheFilePath;
}

?>