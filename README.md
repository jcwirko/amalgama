### AMALGAMA

1. Clonar el proyecto `git clone git@github.com:jcwirko/amalgama.git`
2. Ejecutar `php -S localhost:8000 -t public`
3. Ejecutar en el navegador: `http://localhost:8000/`

### Consideraciones

* En el archivo `index.php` que esta dentro de `public` hay ejemplos que se imprimen 
  en el navegador de las funcionalidades como crear Ejercitos con civilizaciones y unidades, 
  y los entrenamientos y transformaciones de cada unidad.
 
* A este desarrollo se le podría agregar un archivo de configuracion y un `.env` 
  donde permitiría realizar cambios en la configuración inicial de:
  * La cantidad de piqueros, arqueros y caballeros que tiene cada civilización.
  * La cantidad de unidades a eliminar cuando un ejercito pierde o empata una batalla.
