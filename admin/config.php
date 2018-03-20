<?php
ini_set( 'display_errors', '1' );
error_reporting( E_ALL );
//DB
//test
//$DB_HOST = 'forcecrm.mysql.tools';
//$DB_NAME = 'forcecrm_central';
//$DB_USER = 'forcecrm_central';
//$DB_PASSWORD = 'n46wnb7c';


//Admin
$ALANG              = 'ru';
$PROJECT_NAME       = "CBC";
$ADMIN_SESSION_AUTH = 1;

$LANGS = array( 'ru' => 'Рус', 'ua' => 'Укр', 'en' => 'Eng' );

//Tables
$TABLE_DOCS_RUBS = "docs_rubs";
$TABLE_DOCS      = "docs";

$TABLE_MAIL = "emails";
$TABLE_TAGS = "tags";

$TABLE_ADMINS_GROUPS     = "admins_groups";
$TABLE_ADMINS            = "admins";
$TABLE_ADMINS_MENU       = "admins_menu";
$TABLE_ADMINS_MENU_ASSOC = "admins_menu_assoc";
$TABLE_ADMINS_LOG        = "admins_log";

$FOLDER_IMAGES          = 'web/content_images';
$FOLDER_IMAGES_FRONTEND = 'web/content_images';