## Certifications

#### Direct Usage
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
// Get movie certifications
$response = $client->certifications()->getMovieCertifications();
var_dump($response['certifications']['US'][0]['certification']); // -> 'G'
// Get TV certifications
$response = $client->certifications()->getTvCertifications();
var_dump($response['certifications']['US'][0]['certification']); // -> 'NR'
```

#### Repository Usage
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\CertificationRepository;

$repository = new CertificationRepository(new Client('token'));
// Get movie certifications
$results = $repository->getMovieCertifications();
var_dump($results->first()->getCountry()); // -> 'US'
var_dump($results->first()->getCertifications()->first()->getCertification()); // -> 'G'
//// Get TV certifications
$results = $repository->getTvCertifications();
var_dump($results->first()->getCountry()); // -> 'RU'
```
