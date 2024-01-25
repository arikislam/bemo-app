## Developed a demo trello app with laravel & vuejs 2

### Add this `env` variables

```
MIX_ACCESS_TOKEN=your-mix-access-token
MIX_APP_URL=your-app-url
ACCESS_TOKEN=your-access-token

```
## Run DB migration

```
php artisan migrate

```
### If you need lots of data run the seeders

```
php artisan db:seed --class=CardListSeeder
php artisan db:seed --class=CardSeeder

```
### Build Assets for Production: Compile and build your assets for production:
```
npm run prod

```
