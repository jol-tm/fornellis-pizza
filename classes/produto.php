<?php
    Class Produto {
        private $conn;
        
        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function addProduct($nome, $categoria, $descricao, $preco, $imagem) {
            $insert = "INSERT INTO produtos (nome, categoria, descricao, preco, imagem) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($insert);
            $stmt->bind_param('sssss', $nome, $categoria, $descricao, $preco , $imagem);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
            $stmt->close();
            $this->conn->close();
        }

        public function editProduct($nome, $categoria, $descricao, $preco, $imagem, $id) {
            if ($imagem != "imgs/cardapio/") {
                $update = "UPDATE produtos SET nome = ?, categoria = ?, descricao = ?, preco = ?, imagem = ? WHERE id = ?";
                $stmt = $this->conn->prepare($update);
                $stmt->bind_param('sssssi', $nome, $categoria, $descricao, $preco, $imagem, $id);
            } else {
                $update = "UPDATE produtos SET nome = ?, categoria = ?, descricao = ?, preco = ? WHERE id = ?";
                $stmt = $this->conn->prepare($update);
                $stmt->bind_param('ssssi', $nome, $categoria, $descricao, $preco, $id);
            }
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
            $stmt->close();
            $this->conn->close();
        }

        public function deleteProduct($id) {
            $select = "SELECT imagem FROM produtos WHERE id = $id";
            $delete = "DELETE FROM produtos WHERE id = $id";
            $stmt = $this->conn->prepare($delete);
            $image = $this->conn->query($select)->fetch_row();
            if (unlink("../" . $image[0])) {
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
            $stmt->close();
            $this->conn->close();
        }

        public function listProducts($category) {
            $select = "SELECT * FROM produtos WHERE categoria = '$category'";
            $stmt = $this->conn->prepare($select);

            if ($stmt->execute()) {
                $stmt = $stmt->get_result();
                return $stmt->fetch_all(MYSQLI_ASSOC);
            }
            $stmt->close();
            $this->conn->close();
        }
    }