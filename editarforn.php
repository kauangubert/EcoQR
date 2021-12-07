<?php
  include"conexao2.php";

    $codigo = intval($_GET['forn_codigo']); 


    if(!isset($_SESSION))
    session_start();


    else{
    $sql_code = "SELECT * FROM fornecedores WHERE forn_codigo = '$codigo'"; 
    $sql_query = $conn->query ($sql_code) or die($conn->error); 
    $linha = $sql_query->fetch_assoc(); 

    $_SESSION[nome] = $linha['nome']; 
    $_SESSION[cpf_cnpj] = $linha['cpf_cnpj']; 
    $_SESSION[email] = $linha['email']; 
    $_SESSION[estado] = $linha['estado']; 
    $_SESSION[obs] = $linha['obs']; 
    $_SESSION[fone] = $linha['fone']; 
    $_SESSION[rua] = $linha['rua']; 
    $_SESSION[numero] = $linha['numero']; 
    $_SESSION[bairro] = $linha['bairro'];
    $_SESSION[cidade] = $linha['cidade'];
    $_SESSION[cep] = $linha['cep'];   
    }                                   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>EcoQR</title>
</head>
<body>
  
  <form class="form" method="POST" action="processa_fornecedor.php">
    <div class="card">
      <div class="card-top">
        <img class="imgcadastro" src="img/cadastro.png" alt="Imagem não carregada!">
        <h2 class="title">FORNECEDOR</h2>
      </div>

      <div class="card-group">
        <label>Nome Do Fornecedor</label>
        <input type="text" name="namef" placeholder="Digite o nome do Fornecedor" required>
      </div>

      <div class="card-group">
        <label>CPF/CNPJ</label>
        <input type="number" name="CPF/CNPJf" placeholder="Digite o CPF/CNPJ do fornecedor" required>
      </div>

      <div class="card-group">
        <label>Telefone</label>
        <input type="number" name="fonef" placeholder="Digite o telefone do fornecedor" required>
      </div>

      <div class="card-group">
        <label>Email</label>
        <input type="email" name="emailf" placeholder="Digite o Email do fornecedor" required>
      </div>
      
      <div class="card-group">
        <label>Estado</label>
        <select name="est" class="selecao" style="width:353px">
          <?php
            $sql="SELECT * FROM estados order by uf";
            $res=mysqli_query($conn,$sql);
            while($vcod=mysqli_fetch_row($res)) {
              $vuf=$vcod[0];
              $vsigla=$vcod[1];
              echo "<option value=$vuf>$vsigla</option>";
            }
          ?>
        </select>
      </div>

      <div class="card-group">
        <label>Cidade</label>
        <input type="text" name="cidade" placeholder="Digite a Cidade" required>
      </div>

      <div class="card-group">
        <label>Bairro</label>
        <input type="text" name="bairro" placeholder="Digite o Bairro" required>
      </div>

      <div class="card-group">
        <label>Rua</label>
        <input type="text" name="rua" placeholder="Digite a Rua" required>
      </div>

      <div class="card-group">
        <label>Número</label>
        <input type="number" name="numero" placeholder="Digite o Número do local" required>
      </div>

      <div class="card-group">
        <label>CEP</label>
        <input type="number" name="cep" placeholder="Digite o CEP" required>
      </div>

      <div class="card-group">
        <label>Observação</label>
        <textarea name="comentariosf" rows="3" cols="42" placeholder="Digite a descrição do produto"></textarea>
      </div>
      
        <div class="card-group btn lul">
          <button type="submit">CADASTRAR</button>
        </div>

      <footer>Contato: ecoqr@gmail.com &bull; 2021 &copy;</footer>
    </div>
  </form>
 
</body>
</html>