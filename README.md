Install project
---------------

Create database from .sql file, located at database/database.sql. Steps:

	1. connect to server where website is located.

		example, through terminal:
		
			a)   ssh username@gnomo.fe.up.pt
			b)   login with your password
	2. go to website base directory
	3. access database/ directory
	4. run command in terminal:
		sqlite3 -init database.sql database.db


To install the project, you must follow this steps:
	1. change $BASE_DIR string to the directory where project is located. 
		$BASE_DIR is located at config/init.php. 
	2. change $database_name string to the database path.
	3. change BASE_URL to the website base url.
		BASE_URL is located at scripts/api_location.js

