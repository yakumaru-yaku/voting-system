<?php

define('DSN', 'mysql:host=localhost;dbname=dotinstall_poll_php');
define('DB_USER', 'dbuser');
define('DB_PASSWORD', '0000');
define('SITE_URL', 'http://127.0.0.1/voting-system');

error_reporting(E_ALL & ~E_NOTICE);
session_set_cookie_params(0, '/voting-system/');
