## Keywords

#### Direct Usage
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
// Get keyword details
$response = $client->keywords()->getKeyword(378);
var_dump($response['id']); // -> 378
var_dump($response['name']); // -> 'prison'
// Get movies that belong to a keyword
$response = $client->keywords()->getMovies(378);
var_dump($response['total_results']); // -> 833
var_dump($response['results'][0]['title']); // -> 'Escape Plan 2: Hades'
```

#### Repository Usage
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\KeywordRepository;

$repository = new KeywordRepository(new Client('token'));
// Get keyword details
$result = $repository->getKeyword(378);
var_dump($result->getId()); // -> 378
var_dump($result->getName()); // -> 'prison'
// Get movies that belong to a keyword
$response = $repository->getMovies(378);
var_dump($response->getTotalResults()); // -> 833
var_dump($response->getResults()[0]->getTitle()); // -> 'Escape Plan 2: Hades'
```
