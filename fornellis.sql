create database if not exists fornellis;
use fornellis;

create table cliente(
    id int auto_increment primary key,
    nome varchar(255),
    email varchar(255),
    numero varchar(255),
    senha varchar(255),
    endereco varchar(255)
);

create table produto(
    id int auto_increment primary key,
    nome varchar(255),
    categoria varchar(255),
    descricao varchar(255),
    preco decimal(3,2)
);

create table administrador(
    email varchar(255),
    senha varchar(255)
);

create table pedido(
    id int auto_increment primary key,
    idCliente int,
    descricaoPedido varchar(255),
    dataPedido date,
    precoTotal decimal(3,2)
);