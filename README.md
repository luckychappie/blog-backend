
## Installation

### Method 1. Installation with Docker


Ensure you have Docker Desktop installed on your Windows machine. You can download it from Docker's official website [https://www.docker.com].

There are 3 steps to run the blog website:

Step1. run the comment on terminal:



```bash
docker-compose up --build
```

Step2. For database creation:

```bash
docker-compose exec app php artisan migrate --seed
```

Step3. Now you can run [http://localhost:8000] in your browser:

#

### Method 2. Manual Installation


Ensure you have Composer installed on your Windows machine. You can download it from Docker's official website [https://getcomposer.org].

There are 3 steps to run the blog website:

Step1. run the comment on terminal:


```bash
- composer install
- npm install
```

Step2. For database creation:

```bash
 php artisan migrate --seed

 # Note: you can change database and other info in .env file
```

Step3. To run the project:

```bash
 php artisan serve
```

Now you can browse [http://localhost:8000] in your browser.


#
## To Login Admin Panel
Please use the following account to login the admin panel firstly.

Admin login link :  [http://localhost:8000/admin/login]

```bash
email : admin@gmail.com
password : password
```
Note : : You can the admin account after logged in


## API Documentation

You can check API list from ``Blog.postman_collection.json`` file

## Test Case

If you want to test, you can test easily with this command:

```bash
 php artisan test
```