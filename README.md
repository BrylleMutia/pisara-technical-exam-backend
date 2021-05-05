## PISARA Full Stack Technical Exam

### Clone repository
> git clone https://github.com/BrylleMutia/pisara-technical-exam-backend.git

### Change directory
> cd pisara-technical-exam-backend

### Install dependencies (composer)
> composer install

### Setup .env file
> cp .env.example .env

### Database
I used XAMPP for my SQL database.
You can download it [here](https://www.apachefriends.org/index.html).
After installation, start Apache and MySQL.

### Run database migrations
> php artisan migrate

### Run server
> php artisan serve


### Seeding
To seed the database with initial data, run this command on the terminal:
> php artisan db:seed

### Fetching data
To fetch the data from JSONplaceholder, you can run the following commands:
* Users:
> php artisan fetch:users {limit}
* Todos:
> php artisan fetch:todos {limit}
* Albums:
> php artisan fetch:albums {limit}
* Photos:
> php artisan fetch:photos {limit}
* Posts:
> php artisan fetch:posts {limit}
* Comments:
> php artisan fetch:comments {limit}

*NOTE:*
Limits are optional, and the default value is 100.