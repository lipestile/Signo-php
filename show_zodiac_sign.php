<?php include('layouts/header.php'); ?>

<?php
function getSigno($data_nascimento, $signos) {
  $data = DateTime::createFromFormat('Y-m-d', $data_nascimento);
  $dia = (int)$data->format('d');
  $mes = (int)$data->format('m');

  foreach ($signos->signo as $signo) {
    list($diaInicio, $mesInicio) = explode('/', $signo->dataInicio);
    list($diaFim, $mesFim) = explode('/', $signo->dataFim);

    $inicio = DateTime::createFromFormat('d/m', "$diaInicio/$mesInicio");
    $fim = DateTime::createFromFormat('d/m', "$diaFim/$mesFim");
    $dataComparacao = DateTime::createFromFormat('d/m', "$dia/$mes");

    if ($mesInicio > $mesFim) {
      if ($dataComparacao >= $inicio || $dataComparacao <= $fim) {
        return $signo;
      }
    } else {
      if ($dataComparacao >= $inicio && $dataComparacao <= $fim) {
        return $signo;
      }
    }
  }
  return null;
}

$data_nascimento = $_POST['data_nascimento'] ?? null;
$signos = simplexml_load_file("signos.xml");
?>

<div class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
  <div class="card shadow p-5" style="width: 100%; max-width: 600px;">
    <?php
    if ($data_nascimento) {
      $signo = getSigno($data_nascimento, $signos);
      if ($signo) {
        echo "<h2 class='text-center text-primary mb-3'>Seu signo é:</h2>";
        echo "<h3 class='text-center fw-bold mb-3'>{$signo->signoNome}</h3>";
        echo "<p class='text-center'>{$signo->descricao}</p>";
        echo "<div class='text-center mt-4'>";
        echo "<a href='index.php' class='btn btn-outline-secondary'>Voltar</a>";
        echo "</div>";
      } else {
        echo "<p class='text-center text-danger'>Não foi possível identificar seu signo.</p>";
      }
    } else {
      echo "<p class='text-center text-danger'>Data inválida.</p>";
    }
    ?>
  </div>
</div>
</body>
</html>
