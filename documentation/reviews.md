## Reviews

#### Direct Usage
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
// Get review details
$response = $client->reviews()->getReview('5d63da037f6c8d03acedc04b');
var_dump($response['media_title']); // -> 'Blade Runner 2049'
```

#### Repository Usage
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\ReviewRepository;

$repository = new ReviewRepository(new Client('token'));
// Get review details
$response = $repository->getReview('5d63da037f6c8d03acedc04b');
var_dump($response->getMediaTitle()); // -> 'Blade Runner 2049'
```
