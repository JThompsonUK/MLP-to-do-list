## MLP To-DO - Instructions

A simple app where you can add, delete and mark a task as complete. The app runs in docker for easy development and consistent .

Completed is a dateTime field which allows to check if and when the task was completed

## Installation

Create new .env file copying details in .env.example

Ensure Docker is running then spin up containers

```bash
docker-compose up -d
```

Install required packages

```bash
docker-compose exec app composer install
```

Generate your app key

```bash
docker-compose exec app php artisan key:generate
```

Migrate database

```bash
docker-compose exec app php artisan migrate
```

Seed the database with some test data

```bash
docker-compose exec app php artisan db:seed
```

View the app

```bash
http://localhost:8000/
```

## Run tests

```bash
docker-compose exec app php artisan test
```

update bootstrap / front end library / SCSS

You must demonstrate the following abilities/skills: make models, controllers, migrations, HTML, CSS, blade, Git commits, blade templates, etc.

**1. Fork this repo**

**2. Build front-end**

Layout must be as follows:

![Alt text](assets/site-layout.png?raw=true "Title")
Please note that the above image and logo are in the 'assets' folder.

**3. Build To-Do list functionality**

     A user should be able to
     * Create a task.
     * Delete a task.
     * Mark a task as completed.

**Good Luck !!! Once done, please send us the link of your repo.**
