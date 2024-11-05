<?php
    Class Pedido {
        private $idCli;
        private $produtos;
        private $quant;
        private $data;
        private $preco;

        // public function __construct($nome, $email, $numero, $senha, $endereco) {
        //     $this->nome = $nome;
        //     $this->email = $email;
        //     $this->numero = $numero;
        //     $this->senha = $senha;
        //     $this->endereco = $endereco;
        // }

        public function addProduct($idProd, $idCliente) {
            include_once 'conn.php';
            
            $check = "SELECT produtos FROM pedidos WHERE produtos = $idProd AND idCliente = $idCliente";
            $check2 = "SELECT preco FROM produtos WHERE id = $idProd";

            $price = $conn->prepare($check2);
            $price->execute();
            $price = $price->get_result();
            $price = $price->fetch_all(MYSQLI_ASSOC);
            $price = $price[0]['preco'];
            

            if ($conn->query($check)->num_rows == 0) {
                $insert = "INSERT INTO pedidos (idCliente, produtos, quant, precoTotal) VALUES ($idCliente, $idProd, 1, $price)";
                $stmt = $conn->prepare($insert);
                if ($stmt->execute()) {
                    return "Adicionado com sucesso! :D";
                    $stmt->close();
                    $conn->close();
                    header('Location: ../index.php');
                };
            } elseif ($conn->query($check)->num_rows != 0) {
                $update = "UPDATE pedidos SET quant = quant+1, precoTotal = precoTotal+$price WHERE produtos = $idProd AND idCliente = $idCliente";
                $stmt = $conn->prepare($update);
                if ($stmt->execute()) {
                    return "Adicionado com sucesso! :D";
                    $stmt->close();
                    $conn->close();
                    header('Location: ../index.php');
                };
            } else {
                return "Erro ao adicionar!";
            }
        }

        // public function signUp() {
        //     include_once '../conn.php';
            
        //     $check = "SELECT email FROM clientes WHERE email = '{$this->email}'";

        //     if ($conn->query($check)->num_rows == 0) {
        //         $insert = "INSERT INTO clientes (nome, email, numero, senha, endereco) VALUES (?, ?, ?, ?, ?)";
        //         $stmt = $conn->prepare($insert);
        //         $stmt->bind_param('sssss', $this->nome, $this->email, $this->numero, $this->senha ,$this->endereco);
        //         if ($stmt->execute()) {
        //             return "Cadastrado com sucesso! :D";
        //             $stmt->close();
        //             $conn->close();
        //             header('Location: ../index.php');
        //         };
        //     } else {
        //         return "Usuário já cadastrado";
        //     }
        // }
    }