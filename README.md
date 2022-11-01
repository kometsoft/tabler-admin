### Dependencies

- "laravel/ui": "^4.0",
- "maatwebsite/excel": "^3.1",
- "psr/simple-cache": "^2.0",
- "spatie/laravel-activitylog": "^4.6",
- "spatie/laravel-permission": "^5.5",
- "yajra/laravel-datatables": "^9.0"

### Manual Installations

#### Add this to your psr-4 autoload key

```json
"Tabler\\": "tabler/"
```

#### Also this to your `config/app.php`

```php
...

/*
* Package Service Providers...
*/
Tabler\App\Providers\AppServiceProvider::class,

...
```