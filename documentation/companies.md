## Companies

#### Direct Usage
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Query\AppendToResponse;

$client = new Client('token');
// Get company details
$response = $client->companies()->getCompany(3268);
var_dump($response['name']); // -> 'HBO'
// Eager load relationships
$response = $client->companies()->getCompany(3268, [
    new AppendToResponse([
        AppendToResponse::ALTERNATIVE_NAMES,
        AppendToResponse::IMAGES
    ])
]);
var_dump($response['alternative_names']['results'][0]['name']); // -> 'Home Box Office'
var_dump($response['images']['logos'][0]['file_type']); // -> '.svg'
// Get alternative names
$response = $client->companies()->getAlternativeNames(3268);
var_dump($response['results'][0]['name']); // -> 'Home Box Office'
// Get images
$response = $client->companies()->getImages(3268);
var_dump($response['logos'][0]['file_type']); // -> '.svg'
```

#### Repository Usage
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Query\AppendToResponse;
use Chiiya\Tmdb\Repositories\CompanyRepository;

$repository = new CompanyRepository(new Client('token'));
// Get company details
$response = $repository->getCompany(3268);
var_dump($response->getName()); // -> 'HBO'
// Eager load relationships
$response = $repository->getCompany(3268, [
    new AppendToResponse([
        AppendToResponse::ALTERNATIVE_NAMES,
        AppendToResponse::IMAGES
    ])
]);
var_dump($response->getAlternativeNames()[0]->getName()); // -> 'Home Box Office'
var_dump($response->getLogos()[0]->getFileType()); // -> '.svg'
// Get alternative names
$response = $repository->getAlternativeNames(3268);
var_dump($response[0]->getName()); // -> 'Home Box Office'
// Get images
$response = $repository->getImages(3268);
var_dump($response[0]->getFileType()); // -> '.svg'
```
