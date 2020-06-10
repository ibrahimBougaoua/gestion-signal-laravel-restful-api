<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Database Schema

<Strong>Users</Strong>('user_id','name','email','email_verified_at','password','role','rememberToken','timestamps');
Signalisation('signalisation_id','desc','localisation','photo','lieu','nature','cause','timestamps');
Signalers('user_id','signalisation_id','timestamps')
Evaluers('user_id','intervention_id','timestamps');
Interventions('id','signalisation_id','price','etat_avancement','date','timestamps');
Informers('gest_id','chef_id','signalisation_id','timestamps');
Membres('user_id','equipe_id','timestamps');
Equipe('equipe_id','d_f_equipe','mail','telephone','timestamps');
Images('id','name','size','user_id','signalisation_id','timestamps');


## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
