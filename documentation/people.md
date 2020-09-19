## People

### Get Details
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getPerson(287);
$response->getName(); // -> "Brad Pitt"
```

----------

### Eager Loading
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

----------

### Get Changes
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getChanges(2751611);
$response[0]->getKey(); // -> "name"
$response[0]->getItems()[0]->getValue(); // -> "Ani Vardanyan"
```

----------

### Get Movie Credits
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getMovieCredits(287);
$response->getCast()[0]->getTitle(); // -> "Ocean's Twelve"
```

----------

### Get TV Credits
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getTvCredits(287);
$response->getCast()[0]->getName(); // -> "Growing Pains"
```

----------

### Get Combined Credits
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getCombinedCredits(287);
$response->getCast()[0]->getTitle(); // -> "Ocean's Twelve"
```

----------

### Get External IDs
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getExternalIds(287);
$response->getImdbId(); // -> "nm0000093"
```

----------

### Get Images
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getImages(287);
$response[0]->getWidth(); // -> 1600
```

----------

### Get Tagged Images
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getTaggedImages(31);
$response->getResults()[0]->getHeight(); // -> 2100
$response->getResults()[0]->getMedia()->getOriginalTitle(); // -> "A Beautiful Day in the Neighborhood"
```

----------

### Get Translations
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getTranslations(287);
$response[2]->getName(); // -> "Deutsch"
$response[2]->getData()->getBiography(); // -> "..."
```

----------

### Get Latest
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getLatest();
$response->getName(); // -> "Lelia Sakai"
```

----------

### Get Popular
```php
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\PersonRepository;

$repository = new PersonRepository(new Client('token'));
$response = $repository->getPopular();
$response->getResults()[0]->getName(); // -> "Keanu Reeves"
```
