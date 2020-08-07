## Changes

#### Direct Usage
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
// Get movie changes
$response = $client->changes()->getMovieChanges();
var_dump($response['results'][0]['id']); // -> 724623
var_dump($response['page']); // -> 1
// Get TV changes
$response = $client->changes()->getTvChanges();
var_dump($response['results'][0]['id']); // -> 6249
var_dump($response['page']); // -> 1
// Get person changes
$response = $client->changes()->getTvChanges();
var_dump($response['results'][0]['id']); // -> 1572271
var_dump($response['page']); // -> 1
```

#### Repository Usage
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\ChangeRepository;

$repository = new ChangeRepository(new Client('token'));
// Get movie changes
$results = $repository->getMovieChanges();
var_dump($results->getResults()[0]->getId()); // -> 724623
var_dump($results->getPage()); // -> 1
// Get tv changes
$results = $repository->getTvChanges();
var_dump($results->getResults()[0]->getId()); // -> 6249
var_dump($results->getPage()); // -> 1
// Get person changes
$results = $repository->getPersonChanges();
var_dump($results->getResults()[0]->getId()); // -> 1572271
var_dump($results->getPage()); // -> 1
```
