### probar el servidor
php artisan serve


### migracion de estructura de base de datos
php artisan migrate:fresh
php artisan migrate:fresh --seed

### CRUD
php artisan make:controller --resource
php artisan make:model Alumno -m
php artisan make:model Profesor -m

### FAKE (Libreria para crear datos falsos)

### Objetivo
- Sistema de Clases
*- Maestro de Alumnos
    php artisan make:model Alumno -m
*- Maestro de Profesores
    php artisan make:model Profesor -m
*- Maestro de Cursor
*- Maestro de Notas
*- Maestro de Año Academico


### github
# Subir cambios
git add .
git commit -m 'cambios realizados'
git push

# Descargar cambios
git pull






