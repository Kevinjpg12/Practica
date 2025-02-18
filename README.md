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
*- Maestro 
    profesores
    Alumnos
    cursor
    Asignaturas
*   ** Año y Ciclo (solo es referencial) esto es solo para manejar como varchar()
    ** periodo varchar(6) 202501    date('Ym')
    php artisan make:model Alumno -m
    php artisan make:model Profesor -m
*- Planilla de Notas (Ingresar o registrar notas del alumno)
    Registra notas (CRUD)
        * Buscar alumno
        * Selecionar asignatura
        * ingresar nota y grabar
*- Reportes (Consulta de de Notas Masivas o individual)
    * reporte por Periodo (ratio de alumnos y promedios)
    * reporte por alumno (notas y promedio)
    * reporte por profesor (cantidad de alumnos)
*- Salir (form post)


### github
# Subir cambios
git add .
git commit -m 'cambios realizados'
git push

# Verficiar el LOG 
git log

# Descargar cambios
git pull


# programas a instalr
* composer
* git
* xampp php 8.2
* mysql workbench (UML)





