# Project setup instruction

git clone https://github.com/leonidSahakyan/challenge.git

composer install

rename (.env.example) to (.env) -> set database name and user

php artisan passport:install

php artisan key:generate

php artisan migrate

php artisan serve

you can see application in http://127.0.0.1:8000/

and API end point is http://127.0.0.1:8000/api/user

you need send token in request body in json format

{
  "token": "9b44c1e81378d19fc08d443cd17ba9df450bbc792e128470d49be6ff170f691fcaa73c40303d0518"
}

result:

[
    {
        "email": "test@gmail.com"
    },
    {
        "email": "leonid.sahakyan@gmail.com",
        "tokens": [
            "9b44c1e81378d19fc08d443cd17ba9df450bbc792e128470d49be6ff170f691fcaa73c40303d0518"
        ]
    }
]
