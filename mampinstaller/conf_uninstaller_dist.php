
<?php
	/* Mandatory configurations */
	define('MAMP_EXTRA_DOCUMENT_ROOT', '/Users/slavko/Works/projects/MAMP/code/hosts/mamp.local');
	define('MAMP_EXTRA_INSTALLATION_HOST', 'http://mamp.local');

	/* Mandatory user input configurations */
	define('MAMP_EXTRA_OPTION_REMOVE_FILES', true);
	define('MAMP_EXTRA_OPTION_REMOVE_DATABASE',true);

	/* DB configurations only if used by extra */
	define('MAMP_EXTRA_DB_HOST','localhost');
	define('MAMP_EXTRA_DB_USERNAME','root');
	define('MAMP_EXTRA_DB_CHARSET','utf8');
	define('MAMP_EXTRA_DB_PORT','3306');
	define('MAMP_EXTRA_DB_PASSWORD','root');
	define('MAMP_EXTRA_DB_DATABASE','test');
	define('MAMP_EXTRA_DB_PREFIX','test_');


	$MAMP_EXTRA_SITE_FILES = array(
		"index.php","license.txt","readme.html","wp-activate.php",
		"wp-admin","wp-blog-header.php","wp-comments-post.php",
		"wp-config-sample.php","wp-config.php","wp-content",
		"wp-cron.php","wp-includes","wp-links-opml.php","wp-load.php",
		"wp-login.php","wp-mail.php","wp-settings.php",
		"wp-signup.php","wp-trackback.php","xmlrpc.php"
	);
	
	?>