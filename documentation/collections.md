## Collections

#### Direct Usage
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Query\AppendToResponse;

$client = new Client('token');
// Get collection details
$response = $client->collections()->getCollection(10);
var_dump($response['name']); // -> 'Star Wars Collection'
var_dump($response['parts'][0]['title']); // -> 'Star Wars'
// Eager load relationships
$response = $client->collections()->getCollection(10, [new AppendToResponse([AppendToResponse::IMAGES])]);
var_dump($response['images']['backdrops'][0]['height']); // -> 1080
// Get images
$response = $client->collections()->getImages(10);
var_dump($response['backdrops'][0]['height']); // -> 1080
// Get translations
$response = $client->collections()->getTranslations(10);
var_dump($response['translations'][0]['english_name']); // -> 'Arabic'
```

#### Repository Usage
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Query\AppendToResponse;
use Chiiya\Tmdb\Repositories\CollectionRepository;

$repository = new CollectionRepository(new Client('token'));
// Get collection details
$response = $repository->getCollection(10);
var_dump($response->getName()); // -> 'Star Wars Collection'
var_dump($response->getParts()[0]->getTitle()); // -> 'Star Wars'
// Eager load relationships
$response = $repository->getCollection(10, [new AppendToResponse([AppendToResponse::IMAGES])]);
var_dump($response->getBackdrops()[0]->getHeight()); // -> 1080
// Get images
$response = $repository->getImages(10);
var_dump($response->getBackdrops()[0]->getHeight()); // -> 1080
// Get translations
$response = $repository->getTranslations(10);
var_dump($response[0]->getEnglishName()); // -> 'Arabic'
```
