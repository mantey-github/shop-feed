# shop-feed
A simple web app that uses Vue (using [vue-cli](https://cli.vuejs.org/)) on the frontend and Lumen on the backend 
to allow pushing feeds (products) from shopify to google shopping.


## Project setup for Frontend
```
npm install 
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

## Project setup for Backend
create a ```.env``` file with your database details

### Database Setup
Setup database by running the command below
```
php artisan migrate
```

Accessing the API Locally
```
 http://localhost/shop-feed/api/public/v1
```

