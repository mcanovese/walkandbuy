<?php

namespace Core;
class Request
{

public static function uri()

{
  return trim(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

}

public static function method(){

return $_SERVER['REQUEST_METHOD']; //restituisce il metodo utilzizato - GET O POST

}

public static function getPOST(string $name) {
  return empty($_POST[$name]) ? null : self::sanitize($_POST[$name]);
}

private static function sanitize($value) {
  if (\is_array($value)) {
    return \array_map(function ($x) {
      return self::sanitize($x);
    }, $value);
  }

  return \htmlentities(\trim($value));
}



}




 ?>
