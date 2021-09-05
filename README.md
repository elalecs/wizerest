To run this repo is required to have Docker installed and a Unix/BSD environment.

The first step is run a `composer install`, it can be run with:

    ```
    make build
    ```

Then, to have this repo running:

    ```
    docker-compose up
    ```

The service runs on "http://127.0.0.1:8080/"


To test:

    ```
    make test
    ```

The .env file are in the repo on purpose to be able to run the repo