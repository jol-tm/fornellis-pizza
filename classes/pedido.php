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
                $update = "UPDATE pedidos SET quant = quant+1 WHERE idCliente = $idCliente;";
                $update2 = "UPDATE pedidos SET precoTotal = precoTotal+$price;"; // nao ta funcionando como esperado
                $stmt = $conn->prepare($update);
                $stmt2 = $conn->prepare($update2);
                if ($stmt->execute() && $stmt2->execute()) {
                    return "Adicionado com sucesso! :D";
                    $stmt->close();
                    $conn->close();
                    header('Location: ../index.php');
                };
            } else {
                return "Erro ao adicionar!";
            }
        }

        public function subProduct($idProd, $idCliente) {
            include_once 'conn.php';
            
            $check = "SELECT produtos, quant FROM pedidos WHERE idCliente = $idCliente";
            $check2 = "SELECT preco FROM produtos WHERE id = $idProd";

            $price = $conn->prepare($check2);
            $price->execute();
            $price = $price->get_result();
            $price = $price->fetch_all(MYSQLI_ASSOC);
            $price = $price[0]['preco'];

            if ($conn->query($check)->fetch_all(MYSQLI_ASSOC)[0]['quant'] == 0) {
                $delete = "DELETE FROM pedidos WHERE produtos = $idProd AND idCliente = $idCliente";
                $stmt = $conn->prepare($delete);
                if ($stmt->execute()) {
                    return "Deletado com sucesso! :D";
                    $stmt->close();
                    $conn->close();
                    header('Location: ../index.php');
                };
            } elseif ($conn->query($check)->fetch_all(MYSQLI_ASSOC)[0]['quant'] != 0) {
                $update = "UPDATE pedidos SET quant = quant-1 WHERE idCliente = $idCliente;";
                $stmt = $conn->prepare($update);
                if ($stmt->execute()) {
                    return "Subtraído com sucesso! :D";
                    $stmt->close();
                    $conn->close();
                    header('Location: ../index.php');
                };
            } else {
                return "Erro ao subtrair!";
            }
        }

        public function listOrder($idCliente) {
            include_once 'conn.php';
            
            $select = "SELECT * FROM pedidos WHERE idCliente = $idCliente";

            $stmt = $conn->prepare($select);

            if ($stmt->execute()) {
                $stmt = $stmt->get_result();
                return $stmt->fetch_all(MYSQLI_ASSOC);
                $stmt->close();
                $conn->close();
            }
        }
    }