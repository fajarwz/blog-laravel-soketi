# Unlocking Real-Time With WebSockets in Laravel with Soketi
This is an implementation of WebSockets in Laravel with [Soketi](https://soketi.app/). A blog about this can be found here: [Unlocking Real-Time With WebSockets in Laravel with Soketi | Fajarwz](https://fajarwz.com/blog/unlocking-real-time-with-websockets-in-laravel-with-soketi/).

## Simple App Demo

### Switch to `master` Branch

If you are on another branch

```
git checkout master
```

### Install Soketi Server

First download the required dependencies:

```
apt install -y git python3 gcc build-essential
```

After that, you can install Soketi CLI globally

```
npm install -g @soketi/soketi
```

You can learn more about the installation [here](https://docs.soketi.app/getting-started/installation)

### Start the Soketi Server

```
soketi start
```

### Install Composer Packages 
```
composer install
```

### Install NPM Packages 
```
npm install
```

### Create `.env` file from `.env.example`
```
cp .env.example .env
```

### Generate Laravel App Key
```
php artisan key:generate
```

### Run the Vite Dev
```
npm run dev
```

### Run the App
```
php artisan serve
```

## Chat App Demo

### Switch to `chat` Branch

```
git checkout chat
```

### Run the Migration

```
php artisan migrate
```

### Run the Vite Dev
```
npm run dev
```

### Run the App
```
php artisan serve
```