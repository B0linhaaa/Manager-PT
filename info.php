<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'assets/components/Head.php'; ?>
  </head>

  <body>
    <div
      id="container"
      class="max-w-[1400px] mx-auto w-full min-h-dvh bg-gray-500 flex flex-col select-none"
    >
      <?php include 'assets/components/Header.php'; ?>

      <div
        id="main"
        class="w-full flex-grow flex justify-center items-center bg-[#049846] text-white"
      >
        <div
          class="flex flex-col items-center gap-4 border-2 border-white shadow-2xl p-8 rounded-md"
        >
          <p class="text-center text-2xl font-bold">Liberdade Futebol Clube</p>

          <div class="flex flex-col items-start gap-2">
            <div class="flex items-center gap-2">
              <p>Morada:</p>

              <p class="hover:bg-[#017d38] p-2 rounded-md transition-all duration-300">
                Rua Manuel Febrero, nº 3 <br />
                2805-192 Cova da Piedade Almada
              </p>
            </div>

            <div class="flex items-center gap-2">
              <p>Telefone:</p>

              <a
                class="hover:bg-[#017d38] p-2 rounded-md transition-all duration-300"
                href="tel:+351218071723"
                target="_blank"
                >218071723</a
              >
            </div>

            <div class="flex items-center gap-2">
              <p>E-mail:</p>

              <a 
                class="hover:bg-[#017d38] p-2 rounded-md transition-all duration-300"
                href="mailto:direccaolfc2014@gmail.com"
                target="_blank"
              >
                direccaolfc2014@gmail.com
              </a>
            </div>

            <div class="flex items-center gap-2">
              <p>Website:</p>

              <a 
                class="hover:bg-[#017d38] p-2 rounded-md transition-all duration-300"
                href="https://lfc.pt/"
                target="_blank"
              >
                https://lfc.pt/
              </a>
            </div>
          </div>

          <div class="flex flex-col items-start gap-2">
            <div class="flex items-center gap-2">
              <p>Horários:</p>

              <p class="hover:bg-[#017d38] p-2 rounded-md transition-all duration-300">
                Terça-feira: 18:30-19:30 <br />
                Quinta-feira: 18:30-19:30 <br />
                Sexta-feira: 18:30-19:30
              </p>
            </div>

            <div class="flex items-center gap-2">
              <p>Localização:</p>

              <a
                class="hover:bg-[#017d38] p-2 rounded-md transition-all duration-300"
                href="https://maps.app.goo.gl/F8AoTHtqtrMCwVG2A"
                target="_blank"
              >
                Liberdade Futebol Clube
              </a>
            </div>

            <div class="flex items-center gap-2">
              <p>Treinadores:</p>

              <p class="hover:bg-[#017d38] p-2 rounded-md transition-all duration-300">
                Rodrigo Duarte <br />
                Marco Cruz <br />
                João Santos
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="module" src="assets/js/custom.js"></script>
  </body>
</html>
