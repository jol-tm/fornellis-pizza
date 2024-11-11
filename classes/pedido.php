<?php
    // Os metodos de pedido provavelmente vão ser refeitos porque vai ter que mudar o banco de dados
    Class Pedido {
        private $idCli;
        private $produtos;
        private $quant;
        private $data;
        private $preco;
        private $conn;
        
        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function addProduct($idProd, $idCliente) {
            $check = "SELECT produtos FROM pedidos WHERE produtos = $idProd AND idCliente = $idCliente";
            // $check = "SELECT pedidos.produtos, produtos.preco FROM pedidos INNER JOIN produtos ON pedidos.produtos = produtos.id WHERE pedidos.idCliente = $idCliente";
            $check2 = "SELECT preco FROM produtos WHERE id = $idProd";

            $price = $this->conn->prepare($check2);
            $price->execute();
            $price = $price->get_result();
            $price = $price->fetch_all(MYSQLI_ASSOC);
            
            if ($this->conn->query($check)->num_rows == 0) {
                $insert = "INSERT INTO pedidos (idCliente, produtos, quant, preco) VALUES ($idCliente, $idProd, 1, {$price[0]['preco']})";
                $stmt = $this->conn->prepare($insert);
                if ($stmt->execute()) {
                    return 1;
                };
            } elseif ($this->conn->query($check)->num_rows != 0) {
                $update = "UPDATE pedidos SET quant = quant+1 WHERE produtos = $idProd AND idCliente = $idCliente;";
                $stmt = $this->conn->prepare($update);
                if ($stmt->execute()) {
                    return 1;
                };
            } else {
                return 0;
            }
            $stmt->close();
            $this->conn->close();
        }

        public function subProduct($idProd, $idCliente) {
            $check = "SELECT produtos, quant FROM pedidos WHERE produtos = $idProd AND idCliente = $idCliente";
            $check2 = "SELECT preco FROM produtos WHERE id = $idProd";

            $price = $this->conn->prepare($check2);
            $price->execute();
            $price = $price->get_result();
            $price = $price->fetch_all(MYSQLI_ASSOC);
            $price = $price[0]['preco'];

            if ($this->conn->query($check)->fetch_all(MYSQLI_ASSOC)[0]['quant'] == 1) {
                $delete = "DELETE FROM pedidos WHERE produtos = $idProd AND idCliente = $idCliente";
                $stmt = $this->conn->prepare($delete);
                if ($stmt->execute()) {
                    return 1;
                };
            } elseif ($this->conn->query($check)->fetch_all(MYSQLI_ASSOC)[0]['quant'] > 0) {
                $update = "UPDATE pedidos SET quant = quant-1 WHERE produtos = $idProd AND idCliente = $idCliente ;";
                $stmt = $this->conn->prepare($update);
                if ($stmt->execute()) {
                    return 1;
                };
            } else {
                return 0;
            }
            $stmt->close();
            $this->conn->close();
        }

        public function listOrder($idCliente) {
            $select = "SELECT pedidos.*, produtos.nome, produtos.imagem FROM pedidos INNER JOIN produtos ON pedidos.produtos = produtos.id WHERE pedidos.idCliente = $idCliente";
            $stmt = $this->conn->prepare($select);

            if ($stmt->execute()) {
                $stmt = $stmt->get_result();
                $result = $stmt->fetch_all(MYSQLI_ASSOC);
                return $result;
            }
            $stmt->close();
            $this->conn->close();
        }

        public function listAllOrders() { //Não ta pronto
            $select = "SELECT pedidos.quant, pedidos.idCliente, produtos.nome, clientes.id, clientes.endereco, clientes.numero FROM pedidos, produtos INNER JOIN clientes WHERE pedidos.idCliente = clientes.id;" ;
            $stmt = $this->conn->prepare($select);

            if ($stmt->execute()) {
                $stmt = $stmt->get_result();
                $result = $stmt->fetch_all(MYSQLI_ASSOC);
                return $result;
            }
            $stmt->close();
            $this->conn->close();
        }

        public function calcTotalPrice($idCliente) {
            $select = "SELECT SUM(preco * quant) FROM pedidos WHERE idCliente = $idCliente";
            $stmt = $this->conn->prepare($select);

            if ($stmt->execute()) {
                $stmt = $stmt->get_result();
                return $stmt->fetch_all();
            }
            $stmt->close();
            $this->conn->close();
        }
    }