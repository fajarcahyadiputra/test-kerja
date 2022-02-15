## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Tutorial menjalan projek
1. membuat file copy file .env.example menjadi .env
2. run composer Install
3. create database
4. config database di file .env
5. run php artisan migrate 
6. run php artisan db:seed 
7. run php artisan serve

## List Url API

## Auth
- POST http://127.0.0.1:8000/api/register (for register user)
    - name string
    - email string
    - password string

    response
    {
        "status: "success",
        "statusCode" : 201,
        "data": {
            "name": "admin",
            "email": "admin@gmail.com",
            "updated_at": "2022-02-15T16:48:14.000000Z",
            "created_at": "2022-02-15T16:48:14.000000Z",
            "id": 1
        },
        "access_token": "1|LCEY0NoLN7RwmQVzTgDphDjoSWBEv9I08L5r3ybE",
        "token_type": "Bearer"
    }


- POST http://127.0.0.1:8000/api/login
    - email string
    - password string

    response
    {
        "status": "success",
        "statusCode" : "200:,
        "access_token": "7|esxs8G7fAhQyF2O73HtTrC4QmHVbalQFF044CA6D",
        "token_type": "Bearer"
    }

## ENDPOINT TRIP
- GET http://127.0.0.1:8000/api/trip

    response
    [
    "status": "success",
    "statusCode": 200,
    "data": [
        {
            "id": 3,
            "user_id": 2,
            "title": "trip to pelabuan bajo",
            "destination": "pelabuan bajo",
            "start_date": "2022-10-16 10:00:00",
            "end_date": "2022-10-20 10:00:00",
            "type_of_trip": "solo trip",
            "deleted_at": null,
            "created_at": "2022-02-15 17:47:19",
            "updated_at": "2022-02-15 17:47:19"
        }
    ]
    ]

- GET http://127.0.0.1:8000/api/trip/{trip_id}
    response
    [
     "status": "success",
    "statusCode": 200,
    "data": 
        {
            "id": 3,
            "user_id": 2,
            "title": "trip to pelabuan bajo",
            "destination": "pelabuan bajo",
            "start_date": "2022-10-16 10:00:00",
            "end_date": "2022-10-20 10:00:00",
            "type_of_trip": "solo trip",
            "deleted_at": null,
            "created_at": "2022-02-15 17:47:19",
            "updated_at": "2022-02-15 17:47:19"
        }
    ]
- POST http://127.0.0.1:8000/api/trip
    response
    [
        {
            "status": "success",
            "statusCode": 201,
            "message": "Insert Data Successfully"
        }
    ]
- PUT http://127.0.0.1:8000/api/trip/trip_id
   response
   [
       {
    "status": "success",
    "statusCode": 200,
    "message": "Update Data Successfully",
    "data": {
        "id": 3,
        "user_id": 2,
        "title": "coba update",
        "destination": "pelabuan bajo",
        "start_date": "2022-10-16 10:00:00",
        "end_date": "2022-10-20 10:00:00",
        "type_of_trip": "solo trip",
        "deleted_at": null,
        "created_at": "2022-02-15 17:47:19",
        "updated_at": "2022-02-15 17:47:19"
    }
    }
    ]
- DELETE http://127.0.0.1:8000/api/trip/trip_id
   response 
   [
       {
    "status": "success",
    "statusCode": 200,
    "message": "Destroy Data Successfully"
    }
    ]


