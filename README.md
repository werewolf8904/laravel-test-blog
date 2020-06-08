# Test Blog


- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__
- Setup project __docker-compose run app composer run setup-project__
- Install npm dependencies __docker-compose run mix npm install__
- Run mix __docker-compose run mix npm run dev__ or __docker-compose run mix npm run watch__
- Start docker-compose __docker-compose up -d__

If needed add __127.0.0.1 test-blog.localhost__ to system hosts file.

Running tests __docker-compose exec app php artisan test__
