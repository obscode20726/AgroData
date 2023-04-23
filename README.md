# Multi-Auth Laravel Application

This is a simple multi-auth Laravel application with two user types - admin and farmer.

## Requirements

To run this application, you'll need to have the following software installed on your machine:

- [XAMPP](https://www.apachefriends.org/download.html) or another web server that supports PHP 7.4 or higher
- [Composer](https://getcomposer.org/download/)

## Installation

To install this application, follow the steps below:

1. Clone the repository using the command below:

2. Change into the project directory using the command below:


3. Install the application dependencies using the command below:


4. Create a copy of the `.env.example` file and name it `.env` using the command below:


5. Generate a new application key using the command below:


6. Create the database tables by running the migrations using the command below:


7. Seed the database with test data using the command below:


## Usage

To use the application, start your web server (e.g. Apache) and make sure it's running PHP 7.4 or higher. Then, point your web browser to `http://localhost/multi-auth-laravel/public` to access the application.

To log in to the application, visit either `http://localhost/multi-auth-laravel/public/admin/login` or `http://localhost/multi-auth-laravel/public/farmer/login`, depending on the user type you want to log in as.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
