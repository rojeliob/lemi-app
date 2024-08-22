# LEMI APP 

Instructions for project installation 

## Clone repository

Go to github and clone in your root dir the proyect repository

```bash
git clone https://github.com/rojeliob/c-pull-app
```
## Go to proyect directory

After clone go to the new directory of the proyect

```bash
cd c-pull-app
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
## Run de proyect

```bash
npm run dev
```