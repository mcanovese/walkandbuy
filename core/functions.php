<?php

namespace Core;

function view(string $filename, array $data = []) {
  extract($data);

  return require_once "app/views/{$filename}.view.php";
}
