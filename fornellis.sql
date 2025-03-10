CREATE DATABASE IF NOT EXISTS fornellis CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE fornellis;

CREATE TABLE clientes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    email VARCHAR(255),
    numero VARCHAR(255),
    senha VARCHAR(255),
    endereco VARCHAR(255)
);

CREATE TABLE produtos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    categoria VARCHAR(255),
    descricao VARCHAR(255),
    imagem VARCHAR(255),
    preco DECIMAL(10,2)
);

CREATE TABLE pedidos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    idCliente INT NOT NULL,
    dataPedido TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    valor_total DECIMAL(10,2) DEFAULT 00.00,
    status VARCHAR(255) DEFAULT "Carrinho",
    FOREIGN KEY (idCliente) REFERENCES clientes(id)
);

CREATE TABLE itens_pedido(
    id INT AUTO_INCREMENT PRIMARY KEY,
    idPedido INT NOT NULL,
    idProduto INT NOT NULL,
    idCliente INT NOT NULL,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10,2) NOT NULL,
    status VARCHAR(255) DEFAULT "Carrinho",
    FOREIGN KEY (idPedido) REFERENCES pedidos(id),
    FOREIGN KEY (idProduto) REFERENCES produtos(id),
    FOREIGN KEY (idCliente) REFERENCES pedidos(idCliente)
);