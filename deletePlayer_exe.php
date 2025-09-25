<?php
  include './assets/components/db_connection.php';
  session_start();

  $query = "select * from players where id = " . $_GET['id'];
  $result = $conn->query($query);
  $row = $result->fetch();

  $caminho_da_imagem = "assets/images/players/" . $row['image'];
  print_r($caminho_da_imagem);
  print_r(file_exists($caminho_da_imagem));

  if ($row && file_exists($row['image'])) {
    unlink($row['image']);
  } else {
      echo "Aviso: Ficheiro não encontrado ou caminho não especificado.";
  }
  $query = "delete from players where id = " . $_GET['id'];
  $conn->exec($query);

  header("Location: /Manager-PT/");
?>
