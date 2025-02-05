<?php
    if (isset($_GET['method'])) {
        include_once "../classes/conn.php";
        $conn = new Conn();
        $pedido = new Pedido($conn->conectar());

        if ($_GET['method'] == "listAllOrders") {
            echo json_encode($pedido->listAllOrders());
        }
    }

    Class Pedido {
        private $conn;
        
        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function addProduct($idProd, $idCliente) {
            $check = "SELECT id FROM pedidos WHERE idCliente = $idCliente AND status = 'Carrinho'";
            $priceCheck = "SELECT preco FROM produtos WHERE id = $idProd";

            $price = $this->conn->query($priceCheck)->fetch_row();
            $result = $this->conn->query($check);

            if ($result->num_rows == 0) {
                $insertOrder = "INSERT INTO pedidos (idCliente) VALUES ($idCliente)";
                $updatePrice = "UPDATE pedidos SET valor_total = {$price[0]} WHERE idCliente = $idCliente AND status = 'Carrinho'";

                if ($this->conn->query($insertOrder) && $this->conn->query($updatePrice)) {
                    $idPedido = $this->conn->query("SELECT LAST_INSERT_ID();")->fetch_row();
                    $insertItens = "INSERT INTO itens_pedido (idProduto, idPedido, idCliente, quantidade, preco_unitario) VALUES ($idProd,  $idPedido[0], $idCliente, 1, {$price[0]})";

                    if ($this->conn->query($insertItens)) {
                        $this->conn->close();
                        return true;
                    }
                };
            } elseif ($result->num_rows != 0) {
                $check = "SELECT idProduto FROM itens_pedido WHERE idProduto = $idProd AND idCliente = $idCliente";
                
                if ($this->conn->query($check)->num_rows == 0) {
                    $idPedido = $this->conn->query("SELECT idPedido FROM itens_pedido WHERE idCliente = $idCliente ORDER BY idPedido DESC LIMIT 1;")->fetch_row();
                    $insertOrder = "INSERT INTO itens_pedido (idProduto, idPedido, idCliente, quantidade, preco_unitario) VALUES ($idProd, $idPedido[0], $idCliente, 1, {$price[0]})";
                    $updatePrice = "UPDATE pedidos SET valor_total = valor_total + {$price[0]} WHERE idCliente = $idCliente AND status = 'Carrinho'";
                    
                    if ($this->conn->query($insertOrder) && $this->conn->query($updatePrice)) {
                        $this->conn->close();
                        return true;
                    };
                } elseif ($this->conn->query($check)->num_rows != 0) {
                    $update = "UPDATE itens_pedido SET quantidade = quantidade + 1 WHERE idProduto = $idProd AND idCliente = $idCliente";
                    $update2 = "UPDATE pedidos SET valor_total = (SELECT SUM(ip.quantidade * ip.preco_unitario) FROM itens_pedido ip WHERE ip.idCliente = pedidos.idCliente) WHERE idCliente = $idCliente AND status = 'Carrinho';";
                    
                    if ($this->conn->query($update) && $this->conn->query($update2)) {
                        $this->conn->close();
                        return true;
                    };
                }
            }
        }

        public function subProduct($idProd, $idCliente) {
            $check = "SELECT quantidade FROM itens_pedido WHERE idProduto = $idProd AND idCliente = $idCliente";

            if ($this->conn->query($check)->fetch_all(MYSQLI_ASSOC)[0]['quantidade'] == 1) {
                $delete = "DELETE FROM itens_pedido WHERE idProduto = $idProd AND idCliente = $idCliente";
                $update = "UPDATE pedidos SET valor_total = (SELECT SUM(ip.quantidade * ip.preco_unitario) FROM itens_pedido ip WHERE ip.idCliente = pedidos.idCliente) WHERE idCliente = $idCliente AND status = 'Carrinho';";

                if ($this->conn->query($delete) && $this->conn->query($update)) {
                    $this->conn->close();
                    return true;
                };
            } elseif ($this->conn->query($check)->fetch_all(MYSQLI_ASSOC)[0]['quantidade'] > 0) {
                $update = "UPDATE itens_pedido SET quantidade = quantidade-1 WHERE idProduto = $idProd AND idCliente = $idCliente";
                $update2 = "UPDATE pedidos SET valor_total = (SELECT SUM(ip.quantidade * ip.preco_unitario) FROM itens_pedido ip WHERE ip.idCliente = pedidos.idCliente) WHERE idCliente = $idCliente AND status = 'Carrinho';";
                if ($this->conn->query($update) && $this->conn->query($update2)) {
                    $this->conn->close();
                    return true;
                };
            } else {
                $this->conn->close();
                return false;
            }
        }

        public function listOrder($idCliente) {
            $select = "SELECT itens_pedido.*, pedidos.dataPedido, pedidos.valor_total, pedidos.status, produtos.nome, produtos.imagem FROM itens_pedido INNER JOIN produtos ON itens_pedido.idProduto = produtos.id INNER JOIN pedidos ON itens_pedido.idCliente = pedidos.idCliente  WHERE itens_pedido.idCliente = $idCliente AND itens_pedido.status = 'Carrinho' AND pedidos.status = 'Carrinho'";

            if ($result = $this->conn->query($select)->fetch_all(MYSQLI_ASSOC)) {
                $this->conn->close();
                return $result;
            }
        }

        public function listAllOrders() {
            $select = "SELECT pedidos.idCliente, pedidos.valor_total, itens_pedido.quantidade, produtos.nome, clientes.id, clientes.endereco, clientes.numero FROM pedidos INNER JOIN clientes ON pedidos.idCliente = clientes.id INNER JOIN itens_pedido ON itens_pedido.idPedido = pedidos.id INNER JOIN produtos ON itens_pedido.idProduto = produtos.id WHERE itens_pedido.status = 'Realizado' AND pedidos.status = 'Realizado';";

            if ($result = $this->conn->query($select)->fetch_all(MYSQLI_ASSOC)) {
                $this->conn->close();
                return $result;
            }
        }

        public function listHistory($idCliente) {
            $select = "SELECT itens_pedido.quantidade, pedidos.id, pedidos.dataPedido, pedidos.valor_total, pedidos.status, produtos.nome FROM produtos INNER JOIN itens_pedido ON itens_pedido.idProduto = produtos.id INNER JOIN pedidos ON itens_pedido.idPedido = pedidos.id WHERE itens_pedido.idCliente = $idCliente AND itens_pedido.status != 'Carrinho' AND pedidos.status != 'Carrinho' ORDER BY pedidos.dataPedido DESC;";

            if ($result = $this->conn->query($select)->fetch_all(MYSQLI_ASSOC)) {
                $this->conn->close();
                return $result;
            }
        }

        public function listAllHistory() {
            $select = "SELECT itens_pedido.* , produtos.nome, pedidos.*, clientes.numero FROM itens_pedido INNER JOIN pedidos ON itens_pedido.idPedido = pedidos.id INNER JOIN produtos ON itens_pedido.idProduto = produtos.id INNER JOIN clientes ON clientes.id = pedidos.idCliente WHERE itens_pedido.status != 'Carrinho' AND pedidos.status != 'Carrinho' ORDER BY pedidos.dataPedido DESC;";

            if ($result = $this->conn->query($select)->fetch_all(MYSQLI_ASSOC)) {
                $this->conn->close();
                return $result;
            }
        }

        public function endPurchase($idCliente) {
            $updateOrder = "UPDATE pedidos SET status = 'Realizado' WHERE idCliente = $idCliente AND status = 'Carrinho';";
            $updateItens = "UPDATE itens_pedido SET status = 'Realizado' WHERE idCliente = $idCliente AND status = 'Carrinho';";

            if ($this->conn->query($updateOrder) && $this->conn->query($updateItens)) {
                $this->conn->close();
                return true;
            }
        }

        public function manageOrder($act, $idCliente) {
            if ($act == "accept") {
                $updateOrder = "UPDATE pedidos SET status = 'Aceito' WHERE idCliente = $idCliente AND status = 'Realizado';";
                $updateItens = "UPDATE itens_pedido SET status = 'Aceito' WHERE idCliente = $idCliente AND status = 'Realizado';";
            } else {
                $updateOrder = "UPDATE pedidos SET status = 'Negado' WHERE idCliente = $idCliente AND status = 'Realizado';";
                $updateItens = "UPDATE itens_pedido SET status = 'Negado' WHERE idCliente = $idCliente AND status = 'Realizado';";
            }

            if ($this->conn->query($updateOrder) && $this->conn->query($updateItens)) {
                $this->conn->close();
                return true;
            } else {
                $this->conn->close();
                return false;
            }
        }

        public function calcTotalPrice($idCliente) {
            $select = "SELECT valor_total FROM pedidos WHERE idCliente = $idCliente AND status = 'Carrinho'";

            if ($result = $this->conn->query($select)->fetch_object()) {
                $this->conn->close();
                return $result->valor_total;
            }
        }
    }