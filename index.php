<?php include 'assets/components/db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'assets/components/Head.php'; ?>
  </head>

  <body>
    <div
      id="container"
      class="max-w-[1400px] mx-auto w-full min-h-dvh bg-gray-500 flex flex-col"
    >
      <?php include 'assets/components/Header.php'; ?>

      <div class="flex flex-col justify-center items-center gap-10 w-full flex-grow bg-[#049846]">
        <div>
          <a href="/Manager-PT/addPlayer.php" class="bg-[#faca03] p-2 rounded-md hover:bg-[#b39000] hover:text-white transition-all duration-300">Adicionar Jogador</a>
        </div>

        <div class="border-2 border-white shadow-2xl p-4 pr-8 rounded-md max-h-[700px] overflow-y-auto">
          <table class="text-white border-collapse border border-white">
            <thead>
              <tr>
                <th class="border p-2">Imagem</th>
                <th class="border text-left p-2">Nome</th>
                <th class="border p-2">Data de Nascimento</th>
                <th class="border p-2">Ações</th>
              </tr>
             </thead>

             <tbody>
              <?php
                $query = "select * from players";
                $result = $conn->query($query);
                while ($row = $result->fetch()) {
                  echo "
                  <tr>
                    <td class='p-2 border'><img src='" . $row['image'] . "' alt='Imagem do Jogador' class='w-30 h-30 object-cover'></td>
                    <td class='p-2 border'>" . $row['name'] . "</td>
                    <td class='text-center p-2 border'>" . $row['dateOfBirth'] . "</td>
                    <td class='text-center p-2 border'>
                      <a href='/Manager-PT/editPlayer.php?id=" . $row['id'] . "' class='bg-[#00b8cb] hover:bg-[#037385] text-white p-1 rounded-md mr-1 transition-colors duration-300'>Editar</a>
                      <a href='/Manager-PT/deletePlayer_exe.php?id=" . $row['id'] . "' class='bg-[#cd0101] hover:bg-[#ad0101] text-white p-1 rounded-md ml-1 transition-colors duration-300'>Apagar</a>
                    </td>
                  </tr>";
                }
              ?>
             </tbody>
         </table>
        </div>
      </div>
    </div>

    <script type="module" src="assets/js/custom.js"></script>
  </body>
</html>
