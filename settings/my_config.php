<?php
/**
 *--------------------------------------------------------------------------
 * SET YOUR DOMAIN NAME
 *--------------------------------------------------------------------------
**/
$api_domain   = "http://171.15.19.31";
$apps_domain  = $api_domain.":9696/";
$mysql_user   = "root";
$mysql_pass   = "secrete";
$mysql_dbname = "keystone";

$openstack_uri 	= $api_domain.":9001/";
$api_port	= "5000";
$api_version   	= "v3";

$admin_usr_role = "jbaltazar";
$admin_pwd_role = "password";

/**
 *--------------------------------------------------------------------------
 * DONT TOUCH THE SETTINGS BELOW
 *--------------------------------------------------------------------------
**/
$url		= $apps_domain."openstack_horizon/";
$url_api	= $api_domain.":".$api_port."/".$api_version."/";
$mysql_server 	= str_replace("http:", "", $api_domain);
$mysql_server   = str_replace("/", "", $mysql_server);

define('_APPS_DOMAIN_', $url);

define('_DB_USR_', $mysql_user);
define('_DB_PWD_', $mysql_pass);
define('_DB_SERVER_', $mysql_server);
define('_DB_NAME_', $mysql_dbname);

define('_OPENSTACK_API_URL_', $url_api);
define('_OPENSTACK_API_PORT', $api_port);
define('_OPENSTACK_API_VERSION', $api_version);
define('_OPENSTACK_ADMIN_USR_', $admin_usr_role);
define('_OPENSTACK_ADMIN_PWD_', $admin_pwd_role);
define('_OPENSTACK_DEFAULT_PROJECT_', 'PHNuCloud');
define('_OPENSTACK_DEFAULT_PROJECT_ID_', 'bedf6e6c1f9f4ea78c45fbb27d6032ba');
define('_OPENSTACK_DEFAULT_ROLE_ID_', '9fe2ff9ee4384b1894a90878d3e92bab');
define('_OPENSTACK_URL_', $openstack_uri);

define('SYSTEM_TIMEZONE', 'Asia/Manila');
define('MYSITE', 'NuCloud Global Inc.');
define('TITLE', 'NuCloud Global Inc.');
define('FAVICON', 'favicon.png');
define('FOOTER', 'Copyright '.date("Y").'. All Rights Reserved.');
