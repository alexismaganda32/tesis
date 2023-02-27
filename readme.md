Fecha: 1 septiembre 2019

## PERMISSIONS - SEADUST CANCÚN FAMILY RESORT

Back Office para la administración de permisos por roles.

- Cada role tendra ciertos permisos para cada modulo de su sistema.
- A cada usuario se le asignará un role.

## ARCHIVOS

1. Se adjunta diagrama relacional de la base de datos en la carpeta /documents.

## CONFIGURACIONES

- Cambiar la información del administrador en /database/seeds/UsersTableSeeder.php para acceder al sistema. Ya que se le enviara un correo electrónico para la confirmación.
- Modificar la linea 105 del archivo ResetsPasswords.php (vendor/laravel/framework/src/Illuminate/Foundation/Auth/ResetsPasswords.php)
	- Elimnar Hash
		- sustituir por el siguiente codigo -> $user->password = $password;

1. composer install
2. copiar archivo ".env-example" y crear un archivo nuevo con el nombre de ".env"
	2.1. crear una base de datos
	2.2. configurar archivo ".env" con información de tu base de datos y los datos de correo electrónico
3. php artisan key:generate
4. php artisan migrate:fresh --seed
5. php artisan serve

## NOTAS
- Cuando se elimina algun registro, tomar en cuenta que tambien se eliminan todas sus dependencias.
- Las configuraciónes de email por defecto se encuentran en /resources/views/vendor/ ahí se encuentran las plantillas.

## LIBRERIAS
- AngularJS v1.7.8
- Template Jais Admin
- Bootstrap 3
- Font Awesome Free 5.10.2
- Bootstrap-select v1.13.9
- Toastr v2.1.3

## FRAMEWORKS
- Laravel 6.*
- Log Activities - laravel-activitylog v3 - https://docs.spatie.be/laravel-activitylog/v3/introduction/



##MUDAR REPOSITORIO A SU PROPIO REPOSITORIO

1. Crear nuevo repositorio en blanco en bitbucket
2. Clonar repositorio con el siguiente comando
	2.1. git clone --bare (url del repositorio)
3. ingresar a la carpeta recién creada
4. git push --mirror (url del nuevo repositorio)
5. rm -rf permissions.git/# tesis
