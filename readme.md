# News-task

## INSTALLATION
- checkout to specific branch
    ```shell
    $ git checkout [branchname]
    ```
- create `.env` file
- copy content from `env.example` to `.env`
- configure `env` according to your settings
- run following commands
    ```shell
    $ composer install
    $ php artisan migrate
    $ php artisan db:seed
    ```
- For reload all db data
  ```shell
  $ php artisan migrate:fresh --seed
  ```
