## MLP To-DO - Instructions

A simple app where you can add, delete, mark a task as complete/incomplete. The app runs in docker for easy development and consistency.

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

Install node packages

```bash
npm install
```

Run Vite dev server

```bash
npm run dev
```

View the app

```bash
http://localhost:8000/
```

## Run tests

```bash
docker-compose exec app php artisan test
```

## Future considerations

-   Tailwind / SCSS / Responsive design
-   Vue.js / React.js for the front-end to leverage component-based, reactive design capabilities. Potentially also implement Inertia.js for seamless integration.
-   Toggle tick instead of having two methods for tick and untick
-   Import svgs instead of embedding within blade file
