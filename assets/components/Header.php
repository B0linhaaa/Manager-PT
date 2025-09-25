<?php
  $allUrl = $_SERVER['REQUEST_URI'];
  $url = explode('/', $allUrl);

  $class = "p-2 rounded-md select-none transition-all duration-300";
?>

<div id="header" class="w-full flex-shrink-0 bg-[#faca03]">
  <div class="w-full h-full flex justify-between items-center py-2">
    <div id="header-left" class="flex gap-4 px-4">
      <a
        class="<?php echo $class; ?> <?php echo ($_SERVER['REQUEST_URI'] === "/Manager-PT/" || $_SERVER['REQUEST_URI'] === "/Manager-PT/index.php") ? "bg-[#856c03] text-white pointer-events-none" : "hover:bg-[#b39000] hover:text-white"; ?>"
        href="<?php echo '/' . $url[1]; ?>"
      >
        Equipa
      </a>
      <a
        class="<?php echo $class; ?> <?php echo ($_SERVER['REQUEST_URI'] === "/Manager-PT/treinos.php") ? "bg-[#856c03] text-white pointer-events-none" : "hover:bg-[#b39000] hover:text-white"; ?>"
        href="<?php echo '/' . $url[1] . "/treinos.php"; ?>"
      >
        Treinos
      </a>
      <a
        class="<?php echo $class; ?> <?php echo ($_SERVER['REQUEST_URI'] === "/Manager-PT/info.php") ? "bg-[#856c03] text-white pointer-events-none" : "hover:bg-[#b39000] hover:text-white"; ?>"
        href="<?php echo '/' . $url[1] . "/info.php"; ?>"
      >
        Informações
      </a>
    </div>

    <a
      href="https://lfc.pt/"
      class="flex justify-center items-center"
      target="_blank"
      title="Liberdade FC"
    >
      <img src="./assets/images/logo.svg" alt="Logo" width="70" />
    </a>

    <div id="header-right" class="flex gap-4 px-4">
      <p
        class="hover:bg-[#b39000] hover:text-white p-2 rounded-md select-none transition-all duration-300"
      >
        Jogos
      </p>
      <p
        class="hover:bg-[#b39000] hover:text-white p-2 rounded-md select-none transition-all duration-300"
      >
        Estatísticas
      </p>
      <p
        class="hover:bg-[#b39000] hover:text-white p-2 rounded-md select-none transition-all duration-300"
      >
        Classificação
      </p>
    </div>
  </div>
</div>