Examples for using certifications API resources. [See documentation on TMDB](https://developers.themoviedb.org/3/certifications).

## Certifications

#### Direct Usage
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
// Get movie certifications
$response = $client->certifications()->getMovieCertifications();
dump($response['certifications']['US'][0]['certification']); // -> 'G'
// Get TV certifications
$response = $client->certifications()->getTvCertifications();
dump($response['certifications']['US'][0]['certification']); // -> 'NR'
```

#### Repository Usage
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\CertificationRepository;

$repository = new CertificationRepository(new Client('token'));
// Get movie certifications
$results = $repository->getMovieCertifications();
dump($results[0]->getCountry()); // -> 'US'
dump($results[0]->getCertifications()[0]->getCertification()); // -> 'G'
// Get TV certifications
$results = $repository->getTvCertifications();
dump($results[0]->getCountry()); // -> 'RU'
```
