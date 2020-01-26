<?php
//Удаление версии Wordpress
remove_action('wp_head', 'wp_generator');
//Не выводить ошибки регистрации
add_filter('login_errors',create_function('$a', "return null;"));
//Проверка на SSL-атаки
global $user_ID;if($user_ID) {if(!current_user_can('level_10')) {if (strlen($_SERVER['REQUEST_URI']) > 255 || strpos($_SERVER['REQUEST_URI'], "eval(") || strpos($_SERVER['REQUEST_URI'], "CONCAT") || strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") || strpos($_SERVER['REQUEST_URI'], "base64")) {@header("HTTP/1.1 414 Request-URI Too Long");@header("Status: 414 Request-URI Too Long");@header("Connection: Close");@exit;}}}