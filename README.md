# Magnigames Testaufgabe

## Voraussetzungen:
``` 
-Node.js (inkl. npm)
-Composer
-PHP 8.x
``` 
## Installation & Start:
#### Frontend (Vue.js)

Im Terminal:

``` 
cd frontend
npm install
npm run dev
```

läuft auf: http://localhost:5173

#### Backend (Laravel)

Im Terminal:

```
cd laravel
npm install
composer install
cp .env.example .env
php artisan key:generate
```

In der .env Datei ist die SQLite-Datenbank wie folgt gesetzt:

```
DB_DATABASE=leaderboard-db.sqlite
```

Danach kann der Laravel-Server gestartet werden:

```
php artisan serve
```

läuft auf: http://127.0.0.1:8000