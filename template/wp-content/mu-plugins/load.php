<?php
global $wpdb;

$table_name = $wpdb->prefix . 'options';

if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
	require __DIR__ . '/../plugins/timber-library/timber.php';
	require __DIR__ . '/../plugins/wpro/wpro.php';
	//require __DIR__ . '/../plugins/advanced-custom-fields-pro/acf.php';
}
