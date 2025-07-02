FashionablyLate 管理画面アプリケーション

Docker ビルド
1.git@github.com:komanoakari/test1_komano.git
２.docker-compose up -d --build

Laravel 環境構築

以下の手順で環境構築を行います。
1.docker-compose up -d --build
2.docker-compose exec app bash
3.composer install
4.cp .env.example .env
5.php artisan key:generate
6.php artisan migrate --seed
7.php artisan serve

使用技術
Laravel 8.x
MySQL 8.0.26
Nginx 1.21.1
Docker / Docker Compose
phpMyAdmin

URL
開発環境　 http://localhost:8010/
phpMyAdmin 　 http://localhost:8011/
