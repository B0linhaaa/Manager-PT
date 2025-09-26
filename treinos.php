<?php 
    include 'assets/components/db_connection.php';

    $mes_ano_selecionado = $_GET['mes_ano'] ?? date('Y-m'); 
    list($ano, $mes) = explode('-', $mes_ano_selecionado);
    $dias_no_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
    
    $query = "select players.id, players.name, players_faults.faults from players LEFT JOIN players_faults ON players.id = players_faults.player_id";
    $result = $conn->query($query);
    $row = $result->fetchAll();
    $registo_presencas = [];
    foreach ($row as $pessoa) {
        $todos_os_registos = json_decode($pessoa['faults'] ?? '{}', true);
        $faltas_do_mes = $todos_os_registos[$mes_ano_selecionado] ?? []; 
        
        $registo_presencas[$pessoa['id']] = [
            'id' => $pessoa['id'],
            'nome' => $pessoa['name'],
            'faltas' => $faltas_do_mes
        ];
    }
?>

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
        <div id="tabela-presencas-container" class="border-2 border-white shadow-2xl p-4 pr-8 rounded-md max-h-[700px] overflow-y-auto">
            <div class="flex justify-center items-center mb-8 text-white">
                Registo de Presenças - 
                <select id="mes-selector" class="bg-[#049846] focus:outline-none border-b border-white p-2 text-center transition-colors duration-300" onchange="window.location.href = '?mes_ano=' + this.value">
                <?php
                    // Define o número de meses a gerar para trás e para a frente
                    $meses_anteriores = 6;
                    $meses_futuros = 6;
                    
                    // Calcula o timestamp do primeiro dia do mês atual
                    $timestamp_mes_atual = strtotime(date('Y-m-01'));
                    
                    // --- Gera os meses anteriores e futuros ---
                    // O ciclo vai de -6 a 6 (incluindo o 0 para o mês atual)
                    for ($i = -$meses_anteriores; $i <= $meses_futuros; $i++) {
                        
                        // Calcula o timestamp para o mês relativo (ex: "-3 month", "0 month", "+3 month")
                        $timestamp = strtotime("$i month", $timestamp_mes_atual);
                        
                        $valor = date('Y-m', $timestamp);
                        $texto = date('F Y', $timestamp);
                        
                        // Determina se a opção deve ser 'selected'
                        $selected = ($valor === $mes_ano_selecionado) ? 'selected' : '';
                        
                        echo "<option value='{$valor}' {$selected}>{$texto}</option>";
                    }
                ?>
                </select>
            </div>

            <form action="saveFaults_exe.php" method="post" class="flex flex-col items-center gap-8">
                <table class="text-white border-collapse border border-white">
                    <thead>
                        <tr>
                            <th class="border p-2">Pessoa</th>
                            <?php for ($dia = 1; $dia <= $dias_no_mes; $dia++): ?>
                                <th class="border p-2"><?= $dia ?></th>
                            <?php endfor; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registo_presencas as $pessoa_id => $dados_pessoa): ?>
                            <tr>
                                <td class="border p-2"><?= $dados_pessoa['nome'] ?></td>
                                
                                <?php for ($dia = 1; $dia <= $dias_no_mes; $dia++): ?>
                                    <?php
                                        $data_completa = sprintf("%s-%s-%02d", $ano, $mes, $dia);
                                        $dia_formatado = sprintf("%02d", $dia);
                                        $status = $dados_pessoa['faltas'][$dia_formatado] ?? '';
                                    ?>
                                    <td 
                                        class="border p-2 select-none cursor-pointer" 
                                        data-pessoa-id="<?= $pessoa_id ?>" 
                                        data-data-completa="<?= $data_completa ?>"
                                        data-dia="<?= $dia_formatado ?>"
                                        data-mes-ano="<?= $mes_ano_selecionado ?>"
                                        data-status="<?= $status ?>"
                                    >
                                        <?= $status ?>
                                    </td>
                                <?php endfor; ?>
                                <input type="hidden" name="faults-<?= $dados_pessoa['id'] ?>" value="<?= htmlspecialchars(json_encode($dados_pessoa['faltas'])) ?>">
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <input type="hidden" name="mes_ano" value="<?= $mes_ano_selecionado ?>">
                <button type="submit" class="bg-[#00b8cb] hover:bg-[#037385] text-white p-2 rounded-md mr-1 transition-colors duration-300">Salvar</button>
            </form>
        </div>
    </div>
    <script type="module" src="./assets/js/custom.js"></script>
  </body>
</html>