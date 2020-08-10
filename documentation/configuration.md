## Configuration

#### Direct Usage
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
// Get api configuration
$response = $client->configuration()->getApiConfiguration();
var_dump($response['images']['base_url']); // -> 'http://image.tmdb.org/t/p/'
// Get countries
$response = $client->configuration()->getCountries();
var_dump($response[0]['english_name']); // -> 'Andorra'
// Get jobs
$response = $client->configuration()->getJobs();
var_dump($response[0]['department']); // -> 'Lighting'
// Get languages
$response = $client->configuration()->getLanguages();
var_dump($response[2]['english_name']); // -> 'Afrikaans'
// Get primary translations
$response = $client->configuration()->getPrimaryTranslations();
var_dump($response[0]); // -> 'ar-AE'
// Get timezones
$response = $client->configuration()->getTimezones();
var_dump($response[0]['iso_3166_1']); // -> 'AD'
```

#### Repository Usage
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\ConfigurationRepository;

$repository = new ConfigurationRepository(new Client('token'));
// Get api configuration
$results = $repository->getApiConfiguration();
var_dump($results->getImages()->getBaseUrl()); // -> 'http://image.tmdb.org/t/p/'
// Get countries
$results = $repository->getCountries();
var_dump($results[0]->getEnglishName()); // -> 'Andorra'
// Get jobs
$results = $repository->getJobs();
var_dump($results[0]->getDepartment()); // -> 'Lighting'
// Get languages
$results = $repository->getLanguages();
var_dump($results[2]->getEnglishName()); // -> 'Afrikaans'
// Get primary translations
$results = $repository->getPrimaryTranslations();
var_dump($results[0]); // -> 'ar-AE'
// Get timezones
$results = $repository->getTimezones();
var_dump($results[0]->getIso31661()); // -> 'AD'
```
