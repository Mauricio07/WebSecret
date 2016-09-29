<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    @foreach ($vSpecies as $vSpecie)
      <p>trabajando ... {{$vSpecie->ID_SPECIE}}</p>
    @endforeach
  </body>
</html>
