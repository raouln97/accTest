# Laravel Project

This repository contains a Laravel project that showcases ACCTEST. The project was done for a job interview.

## Prerequisites

Before running the application, please ensure that you have the following prerequisites installed:

- PHP 8.2.6
- Composer 2.5.7
- MySQL 8.0.33

## Installation

To install and set up the project, follow these steps:

1. Clone the repository:

   ```shell
   git clone https://github.com/raouln97/accTest.git

2. Navigate to the project directory:
    
    ```shell
    cd [project-directory]

3. Install PHP dependencies:

    ```shell
    composer install

4. Create a copy of the .env.example file and name it .env. Update the file with your database credentials.

5. Generate an application key:

    ```shell
    php artisan key:generate

6. Run database migrations and seeders:

    ```shell
    php artisan migrate --seed

## Usage

1. Start the Laravel development server:

    ```shell
    php artisan serve

2. Access the application in your web browser at http://localhost:8000.


## Running Tests

The project includes a test suite to ensure its functionality.

1. To run the tests, use the following command:

    ```shell 
    php artisan test


## Documentation

The API documentation and diagram is included in the link below: 

https://sugar-top-07d.notion.site/Accredify-Test-0732ece855be4a9b81d40cf697def381

