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

public function getJsHelper($identifier)
{
	$_jsLib = dirname(dirname(__FILE__));
	return '<script type="text/javascript" src="'.$_jsLib.'./static/js/'.$identifier.'.js"></script>';
}

?>