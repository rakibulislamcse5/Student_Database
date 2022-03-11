
Installation Process
1. Clone GitHub repo for this project locally
First open your terminal and run below this command or download zip

git clone https://github.com/rakibulislamcse5/Student_Database/student_management.git
Like this


Once this runs, you will have a copy of the project on your computer.

2. cd into your project
You will need to be inside that project file to enter all of the rest of the commands in this tutorial. So remember to type cd projectName to move your terminal working location to the project file we just barely created. (Of course substitute “projectName” in the command above, with the name of the folder you created in the previous step).

3. Install Composer Dependencies
composer install
or

composer update
4. Create a copy of your .env file
.env files are not generally committed to source control for security reasons. But there is a .env.example which is a template of the .env file that the project expects us to have. So we will make a copy of the .env.example file and create a .env file that we can start to fill out to do things like database configuration in the next few steps.

5. Create an database for our application
Database Name: student_management
6. In the .env file, add database information to allow Laravel to connect to the database
We will want to allow Laravel to connect to the database that you just created in the previous step. To do this, we must add the connection credentials in the .env file and Laravel will handle the connection from there.

In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created. This will allow us to run migrations and seed the database in the next step.

7. Migrate the database
php artisan migrate
8. Generate an app encryption key
php artisan key:generate

9. Run this Project
php artisan serve

