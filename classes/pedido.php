<?php
    Class Pedido {
        private $idCli;
        private $produtos;
        private $quant;
        private $data;
        private $preco;
        
        public function addProduct($idProd, $idCliente) {
            include_once 'conn.php';
            
            $check = "SELECT produtos FROM pedidos WHERE produtos = $idProd AND idCliente = $idCliente";
            // $check = "SELECT pedidos.produtos, produtos.preco FROM pedidos INNER JOIN produtos ON pedidos.produtos = produtos.id WHERE pedidos.idCliente = $idCliente";
            $check2 = "SELECT preco FROM produtos WHERE id = $idProd";

            $price = $conn->prepare($check2);
            $price->execute();
            $price = $price->get_result();
            $price = $price->fetch_all(MYSQLI_ASSOC);
            
            if ($conn->query($check)->num_rows == 0) {
                $insert = "INSERT INTO pedidos (idCliente, produtos, quant, preco) VALUES ($idCliente, $idProd, 1, {$price[0]['preco']})";
                $stmt = $conn->prepare($insert);
                if ($stmt->execute()) {
                    return 1;
                };
            } elseif ($conn->query($check)->num_rows != 0) {
                $update = "UPDATE pedidos SET quant = quant+1 WHERE produtos = $idProd AND idCliente = $idCliente;";
                $stmt = $conn->prepare($update);
                if ($stmt->execute()) {
                    return 1;
                };
            } else {
                return 0;
            }
            $stmt->close();
            $conn->close();
        }

        public function subProduct($idProd, $idCliente) {
            include_once '../conn.php';
            
            $check = "SELECT produtos, quant FROM pedidos WHERE produtos = $idProd AND idCliente = $idCliente";
            $check2 = "SELECT preco FROM produtos WHERE id = $idProd";

            $price = $conn->prepare($check2);
            $price->execute();
            $price = $price->get_result();
            $price = $price->fetch_all(MYSQLI_ASSOC);
            $price = $price[0]['preco'];

            if ($conn->query($check)->fetch_all(MYSQLI_ASSOC)[0]['quant'] == 1) {
                $delete = "DELETE FROM pedidos WHERE produtos = $idProd AND idCliente = $idCliente";
                $stmt = $conn->prepare($delete);
                if ($stmt->execute()) {
                    return 1;
                };
            } elseif ($conn->query($check)->fetch_all(MYSQLI_ASSOC)[0]['quant'] > 0) {
                $update = "UPDATE pedidos SET quant = quant-1 WHERE produtos = $idProd AND idCliente = $idCliente ;";
                $stmt = $conn->prepare($update);
                if ($stmt->execute()) {
                    return 1;
                };
            } else {
                return 0;
            }
            $stmt->close();
            $conn->close();
        }

        public function listOrder($idCliente) {
            include_once 'conn.php';

            $select = "SELECT pedidos.*, produtos.nome, produtos.imagem FROM pedidos INNER JOIN produtos ON pedidos.produtos = produtos.id WHERE pedidos.idCliente = $idCliente";
            $stmt = $conn->prepare($select);

            if ($stmt->execute()) {
                $stmt = $stmt->get_result();
                $result = $stmt->fetch_all(MYSQLI_ASSOC);
                return $result;
            }
            $stmt->close();
            $conn->close();
        }

        public function calcTotalPrice($idCliente) {
            include 'conn.php';

            $select = "SELECT SUM(preco * quant) FROM pedidos WHERE idCliente = $idCliente";
            $stmt = $conn->prepare($select);

            if ($stmt->execute()) {
                $stmt = $stmt->get_result();
                return $stmt->fetch_all();
            }
            $stmt->close();
            $conn->close();
        }
    }