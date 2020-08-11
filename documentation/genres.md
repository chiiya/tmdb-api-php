## Genres

#### Direct Usage
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
// Get movie genres
$response = $client->genres()->getMovieGenres();
var_dump($response['genres'][0]['id']); // -> 28
var_dump($response['genres'][0]['name']); // -> 'Action'
// Get TV genres
$response = $client->genres()->getTvGenres();
var_dump($response['genres'][0]['id']); // -> 10759
var_dump($response['genres'][0]['name']); // -> 'Action & Adventure'
```

#### Repository Usage
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\GenreRepository;

$repository = new GenreRepository(new Client('token'));
// Get movie genres
$results = $repository->getMovieGenres();
var_dump($results[0]->getId()); // -> 28
var_dump($results[0]->getName()); // -> 'Action'
// Get tv genres
$results = $repository->getTvGenres();
var_dump($results[0]->getId()); // -> 10759
var_dump($results[0]->getName()); // -> 'Action & Adventure'
```
