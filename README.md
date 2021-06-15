# Aplikacja Kalendarz

## Technologie 
* PHP 7.4.7
* Vue 2x
* Laravel 8
* MySQL
* Bootstrap 4.6.0
* uwmap/xampp

## Instalacja 
- pobieramy projekt z https://github.com/karolinascibek/php-vue-app-calendar.git
- otworz terminal w głównym folderze aplikacji a następnie wprowadź komendy:
``` 
$ git clone https://github.com/karolinascibek/php-vue-app-calendar.git
$ composer update
$ npm install
```

## baza danych
- w pliku ```.env``` ustaw baze danych, jeżeli nie ma takigo pliku utwórz go 
  kopjując plik ```.env.example``` i zmieniając nazwe na ```.env```
- nastepnie w konsoli wprowadz nastepujące komendy.
```
$ php artisan key:generate 
$ php artisan migrate
```

## Uruchomienie
```
$ npm run watch 
$ php artisan serve
```
link do strony głownej http://127.0.0.1:8000



