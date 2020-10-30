-- Installation --
* Please note that this project requires PHP 7.3 or higher

Prior to initial installation, ensure the following are installed:
    Composer:
        https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos
    NPM:
        https://nodejs.org/en/download/package-manager/
Also, ensure Apache allows .htaccess overrides in the webroot

Once these are complete, clone the project. Create a new database for the project.

Next, create the laravel .env file.
    From the command line, run cp .env.example .env
    Open the new .env file and update the following sections with your DB information:
        DB_HOST
        DB_PORT
        DB_DATABASE
        DB_USERNAME
        DB_PASSWORD

Run composer install
Run php artisan migrate
Run npm install

From here, you should be able to view the project and log in. The main page should be the log-in screen.
Also, the test user was created as part of the database migrations.

You may run into permission issues when first trying to view the project. These are due to permissions on the storage directories and files. There are 2 solutions:
    1. This is the easiest, but most unsafe, solution. From the project directory, run:
        chmod -R 777 storage/logs/
        chmod -R 777 storage/framework/
    2. This is the more complicated option, but it is safer overall:
        - Ensure your user is part of the apache group (could be "www", "apache", "www-run", etc.)
        - Next, from the project directory, run "sudo chown -R 'user':'apache' storage/" (where 'user' is the current user and 'apache' is the apache group)
        - Finally, run "chmod -R 775 -R storage/" to allow the apache group to write to all of the storage files

After login, the user comes to the dashboard. New notes can be created here. Existing notes can be edited or delete. Notes are paginated at 5 per page.

