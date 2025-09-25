<?php
include 'assets/components/db_connection.php';

$query = "select * from players where id = " . $_GET['id'];
$result = $conn->query($query);
$row = $result->fetch();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'assets/components/Head.php'; ?>
  </head>

  <body>
    <div
      class="max-w-[1400px] mx-auto w-full min-h-dvh bg-gray-500 flex flex-col"
    >
      <?php include 'assets/components/Header.php'; ?>

      <div
        class="flex flex-col justify-center items-center gap-10 w-full flex-grow bg-[#049846]"
      >
        <div class="border-2 border-white shadow-2xl p-4 rounded-md">
          <form action="/Manager-PT/editPlayer_exe.php" method="post" enctype="multipart/form-data" class="flex flex-col gap-4">
            <div class="flex items-center gap-2 text-white">
              <label for="name">Nome:</label>
              <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" class="bg-transparent border-b-1 focus:outline-none focus:bg-[#017d38] border-white p-2 transition-colors duration-300" autocomplete="off" required>
            </div>

            <div class="flex items-center gap-2 text-white">
              <label for="dateOfBirth">Data de Nascimento:</label>
              <input type="date" id="dateOfBirth" name="dateOfBirth" value="<?php echo $row['dateOfBirth']; ?>" class="bg-transparent border-b-1 focus:outline-none focus:bg-[#017d38] border-white p-2 transition-colors duration-300" max="<?php echo date('Y-m-d'); ?>" required>
            </div>

            <div class="flex items-center gap-2 text-white">
              <label>Imagem:</label>

              <div class="relative flex items-center justify-center gap-2 w-full h-60 hover:bg-[#017d38] border-1 border-white rounded-md p-2 transition-colors duration-300">
                <label for="imagem" class="flex items-center justify-center w-full h-full cursor-pointer hidden">
                  <p>Selecionar Imagem</p>
                  <input type="file" id="imagem" name="image" accept="image/*" class="hidden" required>
                </label>

                <img id="imagem-preview" src="<?php echo $row['image']; ?>" alt="Pré-visualização da Imagem" class="w-full h-full object-cover">

                <div id="remover-imagem" class="absolute top-2 right-2 cursor-pointer bg-[#cd0101] hover:bg-[#ad0101] text-white rounded-full px-2 transition-colors duration-300">X</div>
              </div>
            </div> 

            <input type="hidden" name="player_id" value="<?php echo $row['id']; ?>">
            
            <div class="flex justify-center">
                <button type="submit" class="bg-[#faca03] p-2 rounded-md hover:bg-[#b39000] hover:text-white cursor-pointer transition-all duration-300">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script type="module" src="assets/js/custom.js"></script>
    <script>
        const inputImagem = document.querySelector('input[type="file"]');
        const imagemPreview = document.getElementById('imagem-preview');
        const removerImagem = document.getElementById('remover-imagem');

        removerImagem.addEventListener('click', function() {
            imagemPreview.src = "";
            imagemPreview.classList.add('hidden');
            inputImagem.parentElement.classList.remove('hidden');
            removerImagem.classList.add('hidden');
        });

        // Adiciona um ouvinte de evento para quando o utilizador selecionar um ficheiro
        inputImagem.addEventListener('change', function(event) {
            
            // Verifica se foi selecionado pelo menos um ficheiro
            const ficheiro = event.target.files[0];

            if (ficheiro) {
                // O FileReader permite que o JavaScript leia o conteúdo de ficheiros locais
                const reader = new FileReader();

                // Define o que acontece quando o ficheiro é lido
                reader.onload = function(e) {
                    // O e.target.result contém a URL temporária dos dados (base64)
                    imagemPreview.src = e.target.result;
                    imagemPreview.classList.remove('hidden'); // Mostra a imagem
                    inputImagem.parentElement.classList.add('hidden');
                    removerImagem.classList.remove('hidden');
                };

                // Inicia a leitura do ficheiro como uma URL de dados
                reader.readAsDataURL(ficheiro);
            } else {
                // Limpa a pré-visualização se o ficheiro for desmarcado
                imagemPreview.src = "";
                imagemPreview.classList.add('hidden');
                inputImagem.parentElement.classList.remove('hidden');
                removerImagem.classList.add('hidden');
            }
        });
    </script>
  </body>
</html>
