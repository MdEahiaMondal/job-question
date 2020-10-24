##  Install
At first setup environment for laravel setup...  (https://www.techomoro.com/install-and-setup-laravel-on-windows-using-xampp/)
afetr complete you environment setup... go to htdocs and open this folder and open cmd then type bellow command..

git clone https://github.com/MdEahiaMondal/job-question

##  Install Composer Dependencies
 update composer bellow this command 
# composer install

## Install NPM Dependencies
npm install && npm run dev

## Create a copy of your .env file
.env files are not generally committed to source control for security reasons. But there is a .env.example which is a template of the .env file that the project expects us to have. So we will make a copy of the .env.example file and create a .env file that we can start to fill out to do things like database configuration in the next few steps.

copy =>  .env.example .env

This will create a copy of the .env.example file in your project and name the copy simply .env.

## Generate an app encryption key

copy =>  php artisan key:generate

##  In the .env file, add database information to allow Laravel to connect to the database
We will want to allow Laravel to connect to the database that you just created in the previous step. To do this, we must add the connection credentials in the .env file and Laravel will handle the connection from there.

In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created. This will allow us to run migrations in the next step.

## Migrate the database
Once your credentials are in the .env file, now you can migrate your database.

php artisan migrate


Regard By Md.Eahiya Khan
Thanks ..

