<?php
ini_set('session.gc_maxlifetime', 36000);
session_set_cookie_params(36000);
session_cache_expire(600);
$cache_expire = session_cache_expire();
// start the session
session_start();
?>