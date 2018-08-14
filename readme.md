## Get started

1. Run `docker-compose up -d` to initialize the container. Note: `hammer` database will be created after this setup.
2. After successful building containers you should see 4 containers running.
<img width="461" alt="screen shot 2018-08-14 at 4 37 06 pm" src="https://user-images.githubusercontent.com/7669734/44095042-72c1c2e4-9fe0-11e8-8248-532b2ef0beda.png">
3. Login to php container and run `composer install && php artisan migrate --seed` command. This will install dependencies and will create necessary tables and seed them with initial data such as services and cities.
4. To see those data you can connect to mysql container by using credentials given in .env file.
5. Now you are ready to test api. Please visit https://cvee.gitbook.io/my-hammer/ to get api documentation.

### Notes:
1. You can check routes api.php file inside routes folder.
2. Initial database schema insider `2018_08_13_173327_create_jobs_setup` file in `database/migrations` folder
3. Initial database table data in `DatabaseSeeder` class in `database/seeds` folder.
4. JobController in `app/Http/Controllers`.
5. JobValidation logic in `app/Http/Requests/ValidateJobRequest.php` file.
6. I would have wrote test cases for this but found it will be too overwhelming.
7. If you are facing issue with docker then you can use https://box.scotch.io/ vagrant file present in the directory.
Then you need to manual setup database connection and overwrite in .env file
