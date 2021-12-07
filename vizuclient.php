<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/stylecad.css">
  <title>EcoQR</title>
</head>

<body>
  <header>
    <nav>
    <div class="mobile-menu">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
        <ul class="nav-list">
          <li><a onclick="window.location.href ='vizuforn.php' " href="#"><img src="css/img/cadastroN.png" width="20" height="20" /> Fornecedor</a></li>
          <li><a onclick="window.location.href ='vizuclient.php' " href="#"><img src="css/img/cliente.png" width="20" height="20" /> Cliente</a></li>
          <li><a onclick="window.location.href ='vizuprodut.php' " href="#"><img src="css/img/org2.png" width="20" height="20" /> Produto</a></li>
          <li><a onclick="window.location.href ='vizuvenda.php' " href="#"><img src="css/img/venda1.png" width="20" height="20" /> Venda</a></li>
        </ul>

        <a class="qr" href="login.php"> <img src="css/img/qrcode.png" width="40" height="40" /> </a>

        <a class="logo" href="login.php"> EcoQR </a>

        <a class="sair" href="cadastromenu.php">Voltar </a>

        <a class="logout" href="login.php"><img src="css/img/logout.png" width="40" height="40" /></a>
        
      </nav>

</header>

<script src="js/mobile-navbar.js"></script>

</body>
</html>


<?php
include("conexao2.php");

$consulta = "SELECT * FROM cliente";
$con = $conn->query($consulta) or die($conn->error);
?>
<html>
    <head>
        <meta charset="utf8">
    </head>
    <body>
        <table border="1">
            <tr>
                 <td>Nome</td>
                 <td>CPF/CNPJ</td>
                 <td>E-mail</td>
                 <td>Estado</td>
                 <td>OBS</td>
                 <td>Data de Cadastro</td>
                 <td>Fone</td>
                 <td>Rua</td>
                 <td>Numero</td>
                 <td>Bairro</td>
                 <td>Cidade</td>
                 <td>CEP</td>
                 <td>Responsavel</td>
                 
            </tr>
            <?php while($dado = $con->fetch_array()){ ?>
            <tr>
                 <td><?php echo $dado ["nome"]; ?></td>
                 <td><?php echo $dado["cpf_cnpj"]; ?></td>
                 <td><?php echo $dado["email"]; ?></td>
                 <td><?php echo $dado["estado"]; ?></td>
                 <td><?php echo $dado["obs"]; ?></td>
                 <td><?php echo $dado["data_cadastro"]; ?></td>
                 <td><?php echo $dado["fone"]; ?></td>
                 <td><?php echo $dado["rua"]; ?></td>
                 <td><?php echo $dado["numero"]; ?></td>
                 <td><?php echo $dado["bairro"]; ?></td>
                 <td><?php echo $dado["cidade"]; ?></td>
                 <td><?php echo $dado["cep"]; ?></td>
                 <td><?php echo $dado["responsavel"]; ?></td>
                 <td><a href="editarclient.php?codigo=<?php echo $dado ["cod"]; ?>">Editar</a> |
                 <a href="javascript: if(confirm('Tem certeza que deseja excluir o(a) Cliente <?php echo $dado['nome']; ?> ?'))
                 location.href='excluirclient.php?codigo=<?php echo $dado['cod']; ?>'">Excluir</a></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>