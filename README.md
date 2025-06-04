# AgroData - Farm Management System

This web application is designed to help farmers efficiently manage their crops, water usage, energy consumption, and finances. It also provides intelligent crop recommendations and insightful analytics to optimize farming practices. This system was originally based on a simple multi-auth Laravel application with two user types - admin and farmer, and has been expanded to offer comprehensive farm management functionalities.

## Features

- Crop Management: Track and manage all aspects of your crops, from planting to harvest.
- Water Management: Monitor and optimize water usage for efficient irrigation.
- Energy Management: Analyze and manage energy consumption on your farm.
- Finance Management: Keep track of farm-related income and expenses.
- Crop Recommendations: Receive intelligent suggestions for suitable crops based on various factors.
- Analytics: Gain insights into your farm's performance through data-driven analytics.

## Requirements

To run this application, you'll need to have the following software installed on your machine:

- [XAMPP](https://www.apachefriends.org/download.html) or another web server that supports PHP 7.4 or higher
- [Composer](https://getcomposer.org/download/)

## Getting Started

Follow these steps to get the application up and running:

1.  **Clone the repository:**
    ```bash
    git clone <repository-url>
    ```
    *Note: Replace `<repository-url>` with the actual URL of this repository.*

2.  **Navigate to the project directory:**
    ```bash
    cd <project-directory-name>
    ```
    *Note: Replace `<project-directory-name>` with the name of the directory created after cloning.*

3.  **Install dependencies:**
    ```bash
    composer install
    ```

4.  **Set up environment variables:**
    Create a `.env` file by copying `.env.example`:
    ```bash
    cp .env.example .env
    ```
    Update the `.env` file with your database credentials and other environment-specific settings.

5.  **Generate application key:**
    ```bash
    php artisan key:generate
    ```

6.  **Run database migrations:**
    ```bash
    php artisan migrate
    ```

7.  **Seed the database (optional):**
    If you want to populate the database with initial data:
    ```bash
    php artisan db:seed
    ```

### Running Tests

To run the application's test suite:

```bash
php artisan test
```

### Linting

To check the code style and ensure it adheres to the project's standards:

```bash
composer run-script styleci
```

## Usage

To use the application, start your web server (e.g., Apache or Nginx) and make sure it's running PHP 7.4 or higher. Then, point your web browser to `http://localhost/<project-public-directory>/public` (or your configured virtual host) to access the application.

*Note: Replace `<project-public-directory>` with the actual public directory name of your project (e.g., the directory name used when cloning if you are serving directly from the project root, or your configured virtual host path that points to the `public` folder).*

To log in to the application, visit either `http://localhost/<project-public-directory>/public/admin/login` or `http://localhost/<project-public-directory>/public/farmer/login`, depending on the user type you want to log in as.

## Contributing

We welcome contributions to improve and expand this application! If you'd like to contribute, please follow these guidelines:

1.  **Fork the repository** on GitHub.
2.  **Create a new branch** for your feature or bug fix:
    ```bash
    git checkout -b feature/your-feature-name
    ```
    or
    ```bash
    git checkout -b bugfix/your-bug-fix-name
    ```
3.  **Follow the existing coding style.** We use StyleCI to maintain a consistent codebase. Ensure your code adheres to these standards. You can run the linter using:
    ```bash
    composer run-script styleci
    ```
4.  **Write tests** for your changes. Ensure that your new code is well-tested and that existing tests continue to pass.
5.  **Ensure all tests pass** before submitting your pull request. Run the test suite using:
    ```bash
    php artisan test
    ```
6.  **Submit a pull request** to the `main` (or `develop`) branch of the original repository. Provide a clear and concise description of the changes you've made and the problem they solve.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
