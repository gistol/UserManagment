Setup your app:

1. copy .env.dist file
    `cp .env.dist .env`
2. Setup your database URL in `.env` file

3. Create Database

    ``` bin/console d:d:c```

    ``` bin/console d:m:m```

4. Run php server

    ```php -S 127.0.0.1:8000 -t public```
 
5. Open in website url `http://localhost:8000` and enjoy your application