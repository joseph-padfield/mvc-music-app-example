# MVC Dependency Injection Example - Music App

Install the slim components by running:

```bash
composer install
```

To run the application locally:
```bash
composer start

```
Run this command in the application directory to run the test suite
```bash
composer test
```

# Notes

- `dependencies.php` - added   
````use App\Factories\PDOFactory;````  
````$container[PDO::class] = DI\factory(PDOFactory::class);````

- `routes.php` - added routes. e.g. of access: ``http://0.0.0.0:8080/courses`` , ``http://0.0.0.0:8080/songs/2``
````
	use App\Controllers\AlbumsController;
	use App\Controllers\SongsController;
	use App\Controllers\ArtistsController;
````

````
    $app->get('/courses', CoursesAPIController::class);

    $app->get('/artists[/{id}]', ArtistsController::class);

    $app->get('/albums[/{id}]', AlbumsController::class);

    $app->get('/songs[/{id}]', SongsController::class);
````

- `Factories/PDOFactory.php` - contains DB access details

- `/Models` - SQL queries. note PDO injection

- `/Controllers` - calling methods from models to generate data to pass to...

- `/Templates` - rendering data into html. what the user sees

