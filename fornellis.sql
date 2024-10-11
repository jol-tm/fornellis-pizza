create database if not exists fornellis;
use fornellis;

create table cliente(
    id int auto_increment primary key,
    nome varchar(100),
    email varchar(100),
    numero varchar(11),
    senha varchar(20),
    endereco varchar(255)
);

create table produto(
    id int auto_increment primary key,
    nome varchar(100),
    categoria varchar(20),
    descricao varchar(255),
    preco decimal(3,2)
);

create table administrador(
    email varchar(100),
    senha varchar(50)
);

create table pedido(
    id int auto_increment primary key,
    precoTotal decimal(3,2)
);