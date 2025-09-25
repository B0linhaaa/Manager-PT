<?php
  include './assets/components/db_connection.php';
  session_start();

  function create_file_name($texto) {
    $texto = strtolower($texto);
    $texto = iconv('UTF-8', 'ASCII//TRANSLIT', $texto);
    $texto = preg_replace('/[^a-z0-9_]/', '_', $texto);
    $texto = preg_replace('/__+/', '_', $texto);
    $texto = trim($texto, '_');
    
    return $texto;
  }

  $destination = "assets/images/players/";
  if (!is_dir($destination)) {
      mkdir($destination, 0777, true);
  }

  function upload_image($nome_do_campo, $diretorio) {
    if (!isset($_FILES[$nome_do_campo]) || $_FILES[$nome_do_campo]['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'message' => 'Erro no upload do ficheiro.'];
    }

    $ficheiro = $_FILES[$nome_do_campo];
    $tipo_permitido = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($ficheiro['type'], $tipo_permitido)) {
        return ['success' => false, 'message' => 'Tipo de ficheiro não permitido. Apenas JPG, PNG ou GIF.'];
    }
    
    $extensao = pathinfo($ficheiro['name'], PATHINFO_EXTENSION);
    $nome_unico = create_file_name($_POST['name']) . '.' . $extensao;
    $caminho_final = $diretorio . $nome_unico;
    if (move_uploaded_file($ficheiro['tmp_name'], $caminho_final)) {
        return [
            'success' => true,
            'message' => 'Upload da imagem concluído com sucesso!',
            'caminho' => $caminho_final
        ];
    } else {
        return ['success' => false, 'message' => 'Falha ao mover o ficheiro para o destino.'];
    }
  }

  $resultado = upload_image('image', $destination);
  if (!$resultado['success']) {
    echo $resultado['message'];
    exit;
  }

  $query = "update players set name = '" . $_POST['name'] . "', dateOfBirth = '" . $_POST['dateOfBirth'] . "', image = '" . $resultado['caminho'] . "' where id = " . $_POST['player_id'];
  $conn->exec($query);

  header("Location: /Manager-PT/");
?>
