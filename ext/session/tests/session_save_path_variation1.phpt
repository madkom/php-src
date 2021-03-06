--TEST--
Test session_save_path() function : variation
--INI--
session.gc_probability=0
session.save_path=
session.name=PHPSESSID
--SKIPIF--
<?php include('skipif.inc'); ?>
--FILE--
<?php

ob_start();

/*
 * Prototype : string session_save_path([string $path])
 * Description : Get and/or set the current session save path
 * Source code : ext/session/session.c
 */

echo "*** Testing session_save_path() : variation ***\n";

$directory = dirname(__FILE__);
var_dump(session_save_path());
var_dump(session_save_path($directory));
var_dump(session_save_path());

var_dump(session_start());
var_dump(session_save_path());
var_dump(session_save_path($directory));
var_dump(session_save_path());
var_dump(session_destroy());

var_dump(session_save_path());

echo "Done";
ob_end_flush();
?>
--EXPECTF--
*** Testing session_save_path() : variation ***
string(0) ""
string(0) ""
string(%d) "%stests"
bool(true)

Warning: session_save_path(): Cannot change save path when session is active in %s on line 19
bool(false)

Warning: session_save_path(): Cannot change save path when session is active in %s on line 20
bool(false)

Warning: session_save_path(): Cannot change save path when session is active in %s on line 21
bool(false)
bool(true)
string(%d) "%stests"
Done
