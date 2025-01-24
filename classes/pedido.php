<?php
    Class Pedido {
        private $conn;
        
        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function addProduct($idProd, $idCliente) {
            $check = "SELECT id FROM pedidos WHERE idCliente = $idCliente AND status == 'Carrinho'";
            $check2 = "SELECT preco FROM produtos WHERE id = $idProd";

            $price = $this->conn->prepare($check2);
            $price->execute();
            $price = $price->get_result();
            $price = $price->fetch_all(MYSQLI_ASSOC);
            
            if ($this->conn->query($check)->num_rows == 0) {
                $insert = "INSERT INTO pedidos (idCliente) VALUES ($idCliente)";
                $update = "UPDATE pedidos SET valor_total =  {$price[0]['preco']} WHERE idCliente = $idCliente AND status == 'Carrinho';";
                $insert2 = "INSERT INTO itens_pedido (idProduto, idCliente, quantidade, preco_unitario) VALUES ($idProd, $idCliente,1, {$price[0]['preco']})";
                $stmt = $this->conn->prepare($insert);
                $stmt2 = $this->conn->prepare($update);
                $stmt3 = $this->conn->prepare($insert2);
                if ($stmt->execute() && $stmt2->execute() && $stmt3->execute()) {
                    return 1;
                };
            } elseif ($this->conn->query($check)->num_rows != 0) {
                $check = "SELECT idProduto FROM itens_pedido WHERE idProduto = $idProd AND idCliente = $idCliente";
                
                if ($this->conn->query($check)->num_rows == 0) {
                    $insert = "INSERT INTO itens_pedido (idProduto, idCliente, quantidade, preco_unitario) VALUES ($idProd, $idCliente, 1, {$price[0]['preco']})"; 
                    $stmt = $this->conn->prepare($insert);
                    if ($stmt->execute()) {
                        return 1;
                    };
                } elseif ($this->conn->query($check)->num_rows != 0) {
                    $update = "UPDATE itens_pedido SET quantidade = quantidade+1 WHERE idProduto = $idProd AND idCliente = $idCliente";
                    $update2 = "UPDATE pedidos SET valor_total = (SELECT SUM(ip.quantidade * ip.preco_unitario) FROM itens_pedido ip WHERE ip.idCliente = pedidos.idCliente) WHERE idCliente = $idCliente AND status == 'Carrinho';";
                    $stmt = $this->conn->prepare($update);
                    $stmt2 = $this->conn->prepare($update2);
                    if ($stmt->execute() && $stmt2->execute()) {
                        return 1;
                    };
                }
            } else {
                return 0;
            }
            $stmt->close();
            $this->conn->close();
        }

        public function subProduct($idProd, $idCliente) {
            $check = "SELECT quantidade FROM itens_pedido WHERE idProduto = $idProd AND idCliente = $idCliente";
            /*$check2 = "SELECT preco FROM produtos WHERE id = $idProd";

            $price = $this->conn->prepare($check2);
            $price->execute();
            $price = $price->get_result();
            $price = $price->fetch_all(MYSQLI_ASSOC);
            $price = $price[0]['preco'];*/

            if ($this->conn->query($check)->fetch_all(MYSQLI_ASSOC)[0]['quantidade'] == 1) {
                $delete = "DELETE FROM itens_pedido WHERE idProduto = $idProd AND idCliente = $idCliente";
                $update = "UPDATE pedidos SET valor_total = (SELECT SUM(ip.quantidade * ip.preco_unitario) FROM itens_pedido ip WHERE ip.idCliente = pedidos.idCliente) WHERE idCliente = $idCliente AND status == 'Carrinho';";
                $stmt = $this->conn->prepare($delete);
                $stmt2 = $this->conn->prepare($update);
                if ($stmt->execute() && $stmt2->execute()) {
                    return 1;
                };
            } elseif ($this->conn->query($check)->fetch_all(MYSQLI_ASSOC)[0]['quantidade'] > 0) {
                $update = "UPDATE itens_pedido SET quantidade = quantidade-1 WHERE idProduto = $idProd AND idCliente = $idCliente";
                $update2 = "UPDATE pedidos SET valor_total = (SELECT SUM(ip.quantidade * ip.preco_unitario) FROM itens_pedido ip WHERE ip.idCliente = pedidos.idCliente) WHERE idCliente = $idCliente AND status == 'Carrinho';";
                $stmt = $this->conn->prepare($update);
                $stmt2 = $this->conn->prepare($update2);
                if ($stmt->execute() && $stmt2->execute()) {
                    return 1;
                };
            } else {
                return 0;
            }
            $stmt->close();
            $this->conn->close();
        }

        public function listOrder($idCliente) {
            $select = "SELECT itens_pedido.*, pedidos.dataPedido, pedidos.valor_total, pedidos.status, produtos.nome, produtos.imagem FROM itens_pedido INNER JOIN produtos ON itens_pedido.idProduto = produtos.id INNER JOIN pedidos ON itens_pedido.idCliente = pedidos.idCliente  WHERE itens_pedido.idCliente = $idCliente";
            $stmt = $this->conn->prepare($select);

            if ($stmt->execute()) {
                $stmt = $stmt->get_result();
                $result = $stmt->fetch_all(MYSQLI_ASSOC);
                return $result;
            }
            $stmt->close();
            $this->conn->close();
        }

        public function listAllOrders() {
            $select = "SELECT pedidos.idCliente, itens_pedido.quantidade, produtos.nome, clientes.id, clientes.endereco, clientes.numero FROM pedidos INNER JOIN clientes ON pedidos.idCliente = clientes.id INNER JOIN itens_pedido ON itens_pedido.idCliente = clientes.id INNER JOIN produtos ON itens_pedido.idProduto = produtos.id ;" ;//WHERE pedidos.status = 'Realizado'
            $stmt = $this->conn->prepare($select);

            if ($stmt->execute()) {
                $stmt = $stmt->get_result();
                $result = $stmt->fetch_all(MYSQLI_ASSOC);
                return $result;
            }
            $stmt->close();
            $this->conn->close();
        }

        public function manageOrder($act) {
            if ($act == "accept") {
                $update = "UPDATE pedidos SET status = 'Aceito';" ;
            } else {
                $update = "UPDATE pedidos SET status = 'Negado';" ;
            }

            $stmt = $this->conn->prepare($update);

            if ($stmt->execute()) {
                return 1;
            }

            $stmt->close();
            $this->conn->close();
        }

        public function calcTotalPrice($idCliente) {
            $select = "SELECT valor_total FROM pedidos WHERE idCliente = $idCliente AND status == 'Carrinho'";
            $stmt = $this->conn->prepare($select);

            if ($stmt->execute()) {
                $stmt = $stmt->get_result();
                $result = $stmt->fetch_object();
                return $result->valor_total;
            }
            $stmt->close();
            $this->conn->close();
        }
    }