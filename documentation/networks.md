## Networks

#### Direct Usage
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Query\AppendToResponse;

$client = new Client('token');
// Get network details
$response = $client->networks()->getNetwork(1);
var_dump($response['name']); // -> 'Fuji TV'
// Eager load relationships
$response = $client->networks()->getNetwork(1, [
    new AppendToResponse([
        AppendToResponse::ALTERNATIVE_NAMES,
        AppendToResponse::IMAGES
    ])
]);
var_dump($response['alternative_names']['results'][0]['name']); // -> 'Fuji Television'
var_dump($response['images']['logos'][0]['file_type']); // -> '.svg'
// Get alternative names
$response = $client->networks()->getAlternativeNames(1);
var_dump($response['results'][0]['name']); // -> 'Fuji Television'
// Get images
$response = $client->networks()->getImages(1);
var_dump($response['logos'][0]['file_type']); // -> '.svg'
```

#### Repository Usage
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Query\AppendToResponse;
use Chiiya\Tmdb\Repositories\NetworkRepository;

$repository = new NetworkRepository(new Client('token'));
// Get network details
$response = $repository->getNetwork(1);
var_dump($response->getName()); // -> 'Fuji TV'
// Eager load relationships
$response = $repository->getNetwork(1, [
    new AppendToResponse([
        AppendToResponse::ALTERNATIVE_NAMES,
        AppendToResponse::IMAGES
    ])
]);
var_dump($response->getAlternativeNames()[0]->getName()); // -> 'Fuji Television'
var_dump($response->getLogos()[0]->getFileType()); // -> '.svg'
// Get alternative names
$response = $repository->getAlternativeNames(3268);
var_dump($response[0]->getName()); // -> 'Fuji Television'
// Get images
$response = $repository->getImages(3268);
var_dump($response[0]->getFileType()); // -> '.svg'
```
