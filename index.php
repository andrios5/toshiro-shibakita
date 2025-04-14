<html>

<head>
<title>Exemplo PHP</title>
<style>
  body {
    background-color: black;
    color: white;
    font-size: 16px;
  }
</style>
</head>
<body>

<?php
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=iso-8859-1');



echo 'Versao Atual do PHP: ' . phpversion() . '<br>';

$servername = "179.211.247.115";
$username = "and";
$password = "3570";
$database = "banco";

// Criar conexão


$link = new mysqli($servername, $username, $password, $database);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

// Contar entradas existentes no ProdutoID
$result = $link->query("SELECT COUNT(ProdutoID) AS total FROM dados");
$row = $result->fetch_assoc();
$total_produto_id = $row['total'];

// Incrementar o valor para a nova entrada
$novo_produto_id = $total_produto_id + 1;


// Gerar valores aleatórios
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$host_name = gethostname();


$query = "INSERT INTO dados (ProdutoID, Nome, Categoria, Peso, Preco, Host) VALUES ('$novo_produto_id' , '$valor_rand2', '$valor_rand2', '$valor_rand2', '$valor_rand2','$host_name')";


if ($link->query($query) === TRUE) {
  echo "Produto registrado com sucesso!";
} else {
  echo "Error: " . $link->error;
}

?>
</body>
</html>
