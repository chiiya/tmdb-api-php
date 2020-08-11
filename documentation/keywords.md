## Keywords

#### Direct Usage
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
// Get keyword details
$response = $client->keywords()->getDetails(378);
var_dump($response['id']); // -> 378
var_dump($response['name']); // -> 'prison'
```

#### Repository Usage
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\KeywordRepository;

$repository = new KeywordRepository(new Client('token'));
// Get keyword details
$result = $repository->getDetails(378);
var_dump($result->getId()); // -> 378
var_dump($result->getName()); // -> 'prison'
```
