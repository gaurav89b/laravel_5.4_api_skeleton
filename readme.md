 
## Steps to follow

1) cp .env.example .env

2) php artisan key:generate

3) Make database entry in .env file

4) php artisan migrate

5) php artisan db:seed

6) php artisan serve --port=8555

7) Open http://localhost:8555/api/documentation  

8) Bingo!!! Swagger Documentation with Login [includes jwt] / logout API is there. You can take it further from here.


<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## About Laravel

[Laravel](https://laravel.com/docs) is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
