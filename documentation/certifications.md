## Certifications

#### Direct Usage
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
// Get movie certifications
$response = $client->certifications()->getMovieCertifications();
// Get TV certifications
$response = $client->certifications()->getTvCertifications();
```

#### Repository Usage
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\CertificationRepository;

$repository = new CertificationRepository(new Client('token'));
// Get movie certifications
$results = $repository->getMovieCertifications();
var_dump($results->first()->getCountry()); // -> 'US'
// Get TV certifications
$results = $repository->getTvCertifications();
var_dump($results->first()->getCountry()); // -> 'RU'
```
