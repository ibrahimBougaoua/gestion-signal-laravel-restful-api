<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

<h1>gestion de signal</h1>

## Database Schema

<strong>Users</strong>('user_id','name','email','email_verified_at','password','role','rememberToken','timestamps');

<strong>Signalisation</strong>('signalisation_id','desc','localisation','photo','lieu','nature','cause','timestamps');

<strong>Signalers</strong>('user_id','signalisation_id','timestamps');

<strong>Evaluers</strong>('user_id','intervention_id','timestamps');

<strong>Interventions</strong>('id','signalisation_id','price','etat_avancement','date','timestamps');

<strong>Informers</strong>('gest_id','chef_id','signalisation_id','timestamps');

<strong>Membres</strong>('user_id','equipe_id','timestamps');

<strong>Equipe</strong>('equipe_id','d_f_equipe','mail','telephone','timestamps');

<strong>Images</strong>('id','name','size','user_id','signalisation_id','timestamps');

## jwt-auth

<strong>Read more</strong> https://jwt-auth.readthedocs.io/en/docs/laravel-installation/

## Postman

<strong>The Collaboration Platform for API Development</strong>

<b>Simplify each step of building an API and streamline collaboration so you can create better APIs—faster.</b>

<strong>Read more</strong> https://www.postman.com/

## Route List

<pre>
+--------+----------+-----------------------------+------+-------------------------------------------------------+--------------+
| Domain | Method   | URI                         | Name | Action                                                | Middleware   |
+--------+----------+-----------------------------+------+-------------------------------------------------------+--------------+
|        | GET|HEAD | /                           |      | Closure                                               | web          |
|        | POST     | api/auth/equipe             |      | App\Http\Controllers\EquipesController@store          | api          |
|        | GET|HEAD | api/auth/equipe             |      | App\Http\Controllers\EquipesController@index          | api          |
|        | DELETE   | api/auth/equipe/{id}        |      | App\Http\Controllers\EquipesController@destroy        | api          |
|        | GET|HEAD | api/auth/equipe/{id}        |      | App\Http\Controllers\EquipesController@show           | api          |
|        | PUT      | api/auth/equipe/{id}        |      | App\Http\Controllers\EquipesController@update         | api          |
|        | POST     | api/auth/evaluer            |      | App\Http\Controllers\EvaluersController@store         | api          |
|        | GET|HEAD | api/auth/evaluer            |      | App\Http\Controllers\EvaluersController@index         | api          |
|        | DELETE   | api/auth/evaluer/{id}       |      | App\Http\Controllers\EvaluersController@destroy       | api          |
|        | PUT      | api/auth/evaluer/{id}       |      | App\Http\Controllers\EvaluersController@update        | api          |
|        | GET|HEAD | api/auth/evaluer/{id}       |      | App\Http\Controllers\EvaluersController@show          | api          |
|        | POST     | api/auth/image              |      | App\Http\Controllers\ImagesController@store           | api          |
|        | GET|HEAD | api/auth/image              |      | App\Http\Controllers\ImagesController@index           | api          |
|        | DELETE   | api/auth/image/{id}         |      | App\Http\Controllers\ImagesController@destroy         | api          |
|        | GET|HEAD | api/auth/image/{id}         |      | App\Http\Controllers\ImagesController@show            | api          |
|        | PUT      | api/auth/image/{id}         |      | App\Http\Controllers\ImagesController@update          | api          |
|        | GET|HEAD | api/auth/informer           |      | App\Http\Controllers\InformersController@index        | api          |
|        | POST     | api/auth/informer           |      | App\Http\Controllers\InformersController@store        | api          |
|        | GET|HEAD | api/auth/informer/{id}      |      | App\Http\Controllers\InformersController@show         | api          |
|        | PUT      | api/auth/informer/{id}      |      | App\Http\Controllers\InformersController@update       | api          |
|        | DELETE   | api/auth/informer/{id}      |      | App\Http\Controllers\InformersController@destroy      | api          |
|        | POST     | api/auth/intervention       |      | App\Http\Controllers\InterventionsController@store    | api          |
|        | GET|HEAD | api/auth/intervention       |      | App\Http\Controllers\InterventionsController@index    | api          |
|        | GET|HEAD | api/auth/intervention/{id}  |      | App\Http\Controllers\InterventionsController@show     | api          |
|        | PUT      | api/auth/intervention/{id}  |      | App\Http\Controllers\InterventionsController@update   | api          |
|        | DELETE   | api/auth/intervention/{id}  |      | App\Http\Controllers\InterventionsController@destroy  | api          |
|        | POST     | api/auth/login              |      | App\Http\Controllers\AuthController@login             | api          |
|        | POST     | api/auth/logout             |      | App\Http\Controllers\AuthController@logout            | api,auth:api |
|        | POST     | api/auth/me                 |      | App\Http\Controllers\AuthController@me                | api,auth:api |
|        | POST     | api/auth/membre             |      | App\Http\Controllers\MembresController@store          | api          |
|        | GET|HEAD | api/auth/membre             |      | App\Http\Controllers\MembresController@index          | api          |
|        | DELETE   | api/auth/membre/{id}        |      | App\Http\Controllers\MembresController@destroy        | api          |
|        | PUT      | api/auth/membre/{id}        |      | App\Http\Controllers\MembresController@update         | api          |
|        | GET|HEAD | api/auth/membre/{id}        |      | App\Http\Controllers\MembresController@show           | api          |
|        | POST     | api/auth/refresh            |      | App\Http\Controllers\AuthController@refresh           | api,auth:api |
|        | POST     | api/auth/register           |      | App\Http\Controllers\AuthController@register          | api          |
|        | GET|HEAD | api/auth/signaler           |      | App\Http\Controllers\SignalersController@index        | api          |
|        | POST     | api/auth/signaler           |      | App\Http\Controllers\SignalersController@store        | api          |
|        | GET|HEAD | api/auth/signaler/{id}      |      | App\Http\Controllers\SignalersController@show         | api          |
|        | DELETE   | api/auth/signaler/{id}      |      | App\Http\Controllers\SignalersController@destroy      | api          |
|        | PUT      | api/auth/signaler/{id}      |      | App\Http\Controllers\SignalersController@update       | api          |
|        | GET|HEAD | api/auth/signalisation      |      | App\Http\Controllers\SignalisationsController@index   | api          |
|        | POST     | api/auth/signalisation      |      | App\Http\Controllers\SignalisationsController@store   | api          |
|        | GET|HEAD | api/auth/signalisation/{id} |      | App\Http\Controllers\SignalisationsController@show    | api          |
|        | PUT      | api/auth/signalisation/{id} |      | App\Http\Controllers\SignalisationsController@update  | api          |
|        | DELETE   | api/auth/signalisation/{id} |      | App\Http\Controllers\SignalisationsController@destroy | api          |
+--------+----------+-----------------------------+------+-------------------------------------------------------+--------------+
</pre>
