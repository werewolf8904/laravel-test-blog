# Test Blog


- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__
- Setup project __docker-compose run app composer run setup-project__
- Install npm dependencies __docker-compose run mix npm install__
- Run mix variants
    - only build assets __docker-compose run mix npm run dev__
    - with watch mode __docker-compose run mix npm run watch__
    - run node dev server with HMR __docker-compose up mix -d__
- Start application __docker-compose up app nginx -d__


If needed add __127.0.0.1 test-blog.localhost__ to system hosts file.

If using HMR add __127.0.0.1 mix__ to system hosts file.

Running tests __docker-compose exec app php artisan test__
