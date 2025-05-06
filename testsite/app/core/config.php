<?php 

if ($_SERVER['SERVER_NAME'] == 'localhost')
{
    /** database config */
    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');

    define ('ROOT', 'http://localhost/testsite/public');
}else
{
    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');

    define('ROOT', 'https://www.pasteyourdomainhere.com');
}

    define('APP_NAME', "My Website");
    /**true means shows errors */
    define('DEBUG', true);
