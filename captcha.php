<?php
//-----------------------------------------------------------------------------
// BellaBook Copyright © Jem Turner 2004-2007,2008 unless otherwise noted
// http://www.jemjabella.co.uk/
//
// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License. See README.txt
// or LICENSE.txt for more information.
//-----------------------------------------------------------------------------

session_start();
$md5 = preg_replace("/[a-z]/", "", md5(microtime() * time()));
$string = substr($md5,0,5);

$captcha = imagecreatefromjpeg("captcha.jpg");
$black = imagecolorallocate($captcha, 0, 0, 0);
$line = imagecolorallocate($captcha,233,239,239);
imageline($captcha,0,0,39,29,$line);
imageline($captcha,40,0,64,29,$line);
imagestring($captcha, 5, 20, 10, $string, $black);

$_SESSION['key'] = md5($string);

header("Content-type: image/jpeg");
imagejpeg($captcha);