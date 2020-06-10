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
