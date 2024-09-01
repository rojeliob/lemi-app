# LEMI APP 

Instructions for project installation 

## Clone repository

Go to github and clone in your root dir the proyect repository

```bash
git clone https://github.com/rojeliob/lemi-app
```
## Go to proyect directory

After clone go to the new directory of the proyect

```bash
cd lemi-app
```

## Create .env and database

```bash
copy .env.example .env
```

## Install composer

```bash
composer install
```

## Install npm 

```bash
npm install
```
## Run migrations to create tables in db

```bash
php artisan migrate

```

## Run seed

```bash
php artisan db:seed

```

## Run de proyect

```bash
npm run dev
```