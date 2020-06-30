# Laravel Tests

Built with Laravel, Bootstrap, MDBootstrap and VueJS

## Testing website
http://a4f5.com
  
## Setup
1. Add your favorite relational database to the project or in the database directory create a file called database.sqlite.
2. Add the database to the .env file.
3. Then run ```php artisan migrate```
  
## Dealership Vehicle Scraper (for CDK websites)
Google "sitemap-inventory-cdk.xml" to get urls to add to the scraper.  

## Weather using Openweather API
I saw a tutorial on using Dark Sky API to build a weather app.  When I went to Dark Sky they had been purchased by Apple and were no longer allowing new sign-ups.

I found Openweather and decided to give it a try.

#### Setup:
Edit: /config/services.php  

Add:
```
'openweather' => [  
    'endpoint' => env('OPENWEATHER_ENDPOINT'),  
    'key' => env('OPENWEATHER_KEY')  
], 
```

### Laravel collection macros
https://github.com/spatie/laravel-collection-macros  
Pull in the package via composer:
```
composer require spatie/laravel-collection-macros
```

## Built with Laravel
The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
  
If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.
