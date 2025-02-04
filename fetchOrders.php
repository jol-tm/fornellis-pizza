<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'fornellis';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$stmt = "SELECT pedidos.idCliente, itens_pedido.quantidade, produtos.nome, clientes.id, clientes.endereco, clientes.numero FROM pedidos INNER JOIN clientes ON pedidos.idCliente = clientes.id INNER JOIN itens_pedido ON itens_pedido.idCliente = clientes.id INNER JOIN produtos ON itens_pedido.idProduto = produtos.id WHERE pedidos.status = 'Realizado';";

if ($result = $conn->query($stmt)) {
    $result = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($result);
} else {
    $conn->close();
    echo "Query error";
}