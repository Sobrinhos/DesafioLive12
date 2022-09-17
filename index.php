<?php
  if(isset($_POST['nota1']) && isset($_POST['nota2']) && isset($_POST['nota3'])){
    // MA = (N1 + N2 + N3 + ME)/7
    $mediaDeAproveitamento = mediaDeAproveitamento($_POST['nota1'], $_POST['nota2'], $_POST['nota3']);
    renderHtml($mediaDeAproveitamento);
  }

  function mediaDeTresNumeros($primeiroNumero, $segundoNumero, $terceiroNumero){
    return ($primeiroNumero + $segundoNumero + $terceiroNumero)/3;
  }

  function mediaDeAproveitamento($primeiroNumero, $segundoNumero, $terceiroNumero){
    return ($primeiroNumero + $segundoNumero*2 + $terceiroNumero*3 + mediaDeTresNumeros($primeiroNumero, $segundoNumero, $terceiroNumero))/7;
  }

  function calculaNotaDoAluno($mediaDeAproveitamento)
  {
    if($mediaDeAproveitamento >= 9) return "A";
    else if($mediaDeAproveitamento >= 7.5) return "B";
    else if($mediaDeAproveitamento >= 6) return "C";
    else if($mediaDeAproveitamento >= 4) return "D";
    else return "E";
  }

  function renderHtml($mediaDeAproveitamento)
  {
    echo "Nota 1: ".$_POST['nota1']."<br>";
    echo "Nota 2: ".$_POST['nota2']."<br>";
    echo "Nota 3: ".$_POST['nota3']."<br>";
    echo "Média Atividades: ".mediaDeTresNumeros($_POST['nota1'],$_POST['nota2'],$_POST['nota3'])."<br>";
    echo "Média de aproveitamento: ".number_format($mediaDeAproveitamento, 2, ',', '.')."<br><br>";
    echo "<b>Nota Final do aluno: ".calculaNotaDoAluno($mediaDeAproveitamento)."</b><br><br>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desafio - Live 12</title>
</head>
<body>
  <form action="index.php" method="post">
    <label for="nota1">Nota 1</label>
    <input type="text" min="0" max="10" name="nota1" id="nota1">

    <label for="nota2">Nota 2</label>
    <input type="text" min="0" max="10" name="nota2" id="nota2">

    <label for="nota3">Nota 3</label>
    <input type="text" min="0" max="10" name="nota3" id="nota3">

    <button type="submit">Calcular</button>
  </form>
</body>
</html>