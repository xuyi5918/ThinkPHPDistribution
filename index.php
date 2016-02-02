<?php
	ob_clean();
    define('APP_NAME', 'MyCms');
    define('APP_PATH', './');
	define('RUNTIME_PATH','./Runtime/');
	define('APP_DEBUG',true);
	define('DB_BACKUP','./Sql/');
    require './_Core/ThinkPHP.php';
?>