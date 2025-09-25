<?php
  $allUrl = $_SERVER['REQUEST_URI'];
  $url = explode('/', $allUrl);

  $title = "Liberdade FC - ";
  if ($url[2] === '') {
    $title .= "Equipa";
  } else if (str_contains($url[2], 'treinos')) {
    $title .= "Treinos";
  } else if (str_contains($url[2], 'info')) {
    $title .= "Informações";
  } else if (str_contains($url[2], 'addPlayer')) {
    $title .= "Adicionar Jogador";
  } else if (str_contains($url[2], 'editPlayer')) {
    $title .= "Editar Jogador";
  }
?>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo $title; ?></title>

<!-- TailwindCSS -->
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<!-- Global CSS -->
<link rel="stylesheet" href="./assets/css/global.css" />

<!-- Favicon -->
<link
    rel="shortcut icon"
    href="./assets/images/favicon.ico"
    type="image/x-icon"
/>