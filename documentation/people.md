## People

### Get Details
**Repository**
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getPerson(287);
$response->getName(); // -> "Brad Pitt"
```
**Direct Usage**
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
$response = $client->people()->getPerson(287);
$response['name']; // -> "Brad Pitt"
```

### Eager Loading
**Repository**
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Query\AppendToResponse;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getPerson(287, [new AppendToResponse([
    AppendToResponse::MOVIE_CREDITS,
    AppendToResponse::TV_CREDITS,
    AppendToResponse::COMBINED_CREDITS,
    AppendToResponse::EXTERNAL_IDS,
    AppendToResponse::TAGGED_IMAGES,
    AppendToResponse::IMAGES,
    AppendToResponse::CHANGES,
    AppendToResponse::TRANSLATIONS,
])]);
$response->getName(); // -> "Brad Pitt"
$response->getMovieCredits()->getCast()[0]->getTitle(); // -> "Ocean's Twelve"
$response->getTvCredits()->getCast()[0]->getName(); // -> "Growing Pains"
$response->getCombinedCredits()->getCast()[0]->getTitle(); // -> "Ocean's Twelve"
$response->getExternalIds()->getImdbId(); // -> "nm0000093"
$response->getImages()[0]->getHeight(); // -> 2400
$response->getProfiles()[0]->getHeight(); // -> 2400
$response->getTranslations()[0]->getIso31661(); // -> "BG"
$response->getChanges()[0]->getItems()[0]->getOriginalValue()['profile']['file_path']; // -> "/kcZJAEj9IjUloJVoM41DPDKMn8W.jpg"
```
**Direct Usage**
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Query\AppendToResponse;

$client = new Client('token');
$response = $client->people()->getPerson(287, [
    new AppendToResponse([
        AppendToResponse::MOVIE_CREDITS,
        AppendToResponse::TV_CREDITS,
        AppendToResponse::COMBINED_CREDITS,
        AppendToResponse::EXTERNAL_IDS,
        AppendToResponse::TAGGED_IMAGES,
        AppendToResponse::IMAGES,
        AppendToResponse::CHANGES,
        AppendToResponse::TRANSLATIONS,
    ])
]);
$name = $response['name']; // -> "Brad Pitt"
$response['movie_credits']['cast'][0]['title']; // -> "Ocean's Twelve"
$response['tv_credits']['cast'][0]['name']; // -> "Growing Pains"
$response['combined_credits']['cast'][0]['title']; // -> "Ocean's Twelve"
$response['external_ids']['imdb_id']; // -> "nm0000093"
$response['tagged_images']['total_results']; // -> 0
$response['images']['profiles'][0]['width']; // -> 1600
$response['changes']['changes'][0]['items'][0]['original_value']['profile']['file_path']; // -> "/kcZJAEj9IjUloJVoM41DPDKMn8W.jpg"
$response['translations']['translations'][0]['iso_3166_1']; // -> "BG"
```

### Get Changes
**Repository**
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getChanges(2751611);
$response[0]->getKey(); // -> "name"
$response[0]->getItems()[0]->getValue(); // -> "Ani Vardanyan"
```
**Direct Usage**
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
$response = $client->people()->getChanges(2751611);
$response['changes'][0]['key']; // -> "name"
$response['changes'][0]['items'][0]['value']; // -> "name"
```

### Get Movie Credits
**Repository**
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getMovieCredits(287);
$response->getCast()[0]->getTitle(); // -> "Ocean's Twelve"
```
**Direct Usage**
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
$response = $client->people()->getMovieCredits(287);
$response['cast'][0]['title']; // -> "Ocean's Twelve"
```

### Get TV Credits
**Repository**
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getTvCredits(287);
$response->getCast()[0]->getName(); // -> "Growing Pains"
```
**Direct Usage**
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
$response = $client->people()->getTvCredits(287);
$response['cast'][0]['name']; // -> "Growing Pains"
```

### Get Combined Credits
**Repository**
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getCombinedCredits(287);
$response->getCast()[0]->getTitle(); // -> "Ocean's Twelve"
```
**Direct Usage**
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
$response = $client->people()->getCombinedCredits(287);
$response['cast'][0]['title']; // -> "Ocean's Twelve"
```

### Get External IDs
**Repository**
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getExternalIds(287);
$response->getImdbId(); // -> "nm0000093"
```
**Direct Usage**
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
$response = $client->people()->getExternalIds(287);
$response['imdb_id']; // -> "nm0000093"
```

### Get Images
**Repository**
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getImages(287);
$response[0]->getWidth(); // -> 1600
```
**Direct Usage**
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
$response = $client->people()->getImages(287);
$response['profiles'][0]['width']; // -> 1600
```

### Get Tagged Images
**Repository**
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getTaggedImages(31);
$response->getResults()[0]->getHeight(); // -> 2100
$response->getResults()[0]->getMedia()->getOriginalTitle(); // -> "A Beautiful Day in the Neighborhood"
```
**Direct Usage**
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
$response = $client->people()->getTaggedImages(31);
$response['results'][0]['height']; // -> 2100
$response['results'][0]['media']['original_title']; // -> "A Beautiful Day in the Neighborhood"
```

### Get Translations
**Repository**
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getTranslations(287);
$response[2]->getName(); // -> "Deutsch"
$response[2]->getData()->getBiography(); // -> "..."
```
**Direct Usage**
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
$response = $client->people()->getTranslations(287);
$response['translations'][2]['name']; // -> "Deutsch"
$response['translations'][2]['data']['biography']; // -> "..."
```

### Get Latest
**Repository**
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getLatest();
$response->getName(); // -> "Lelia Sakai"
```
**Direct Usage**
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
$response = $client->people()->getLatest();
$response['name']; // -> "Lelia Sakai"
```

### Get Popular
**Repository**
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getPopular();
$response->getResults()[0]->getName(); // -> "Keanu Reeves"
```
**Direct Usage**
```php
use Chiiya\Tmdb\Client;

$client = new Client('token');
$response = $client->people()->getPopular();
$response['results'][0]['name']; // -> "Keanu Reeves"
```
