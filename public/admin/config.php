<?php
// HTTP
define('HTTP_SERVER', 'http://'.getenv("HOST").'/admin/');
define('HTTP_CATALOG', 'https://'.getenv("HOST").'/');

// HTTPS
define('HTTPS_SERVER', 'http://'.getenv("HOST").'/admin/');
define('HTTPS_CATALOG', 'https://'.getenv("HOST").'/');

// DIR
define('DIR_APPLICATION', getenv("BASE").'/public/admin/');
define('DIR_SYSTEM', getenv("BASE").'/public/system/');
define('DIR_LANGUAGE', getenv("BASE").'/public/admin/language/');
define('DIR_TEMPLATE', getenv("BASE").'/public/admin/view/template/');
define('DIR_CONFIG', getenv("BASE").'/public/system/config/');
define('DIR_IMAGE', getenv("BASE").'/public/image/');
define('DIR_CACHE', getenv("BASE").'/public/system/cache/');
define('DIR_DOWNLOAD', getenv("BASE").'/public/system/download/');
define('DIR_LOGS', getenv("BASE").'/logs/admin/');
define('DIR_MODIFICATION', getenv("BASE").'/public/system/modification/');
define('DIR_CATALOG', getenv("BASE").'/public/catalog/');

// DB
$url=parse_url(getenv("DATABASE_URL"));
define('DB_DRIVER', 'mpdo');
define('DB_HOSTNAME', $url["host"]);
define('DB_USERNAME', $url["user"]);
define('DB_PASSWORD', $url["pass"]);
define('DB_DATABASE', substr($url["path"],1));
define('DB_PREFIX', 'oc_');
