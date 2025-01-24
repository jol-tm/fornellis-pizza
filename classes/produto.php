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
                return "Cadastrado com sucesso! :D";
                $stmt->close();
                $this->conn->close();
                header('Location: ../index.php');
            } else {
                return "Erro ao cadastrar";
            }
        }

        public function editProduct($nome, $categoria, $descricao, $preco, /*$imagem,*/ $id) {
            $update = "UPDATE produtos SET nome = ?, categoria = ?, descricao = ?, preco = ?/*, imagem = ?*/ WHERE id = $id";
            $stmt = $this->conn->prepare($update);
            $stmt->bind_param('ssss', $nome, $categoria, $descricao, $preco/*, $imagem*/);
            if ($stmt->execute()) {
                return "Editado com sucesso! :D";
                $stmt->close();
                $this->conn->close();
                header('Location: ../index.php');
            } else {
                return "Erro ao editar";
            }
        }

        public function deleteProduct($id) {
            $delete = "DELETE FROM produtos WHERE id = $id";
            $stmt = $this->conn->prepare($delete);
            if ($stmt->execute()) {
                return "Excluído com sucesso! :D";
                $stmt->close();
                $conn->close();
                header('Location: ../index.php');
            } else {
                return "Erro ao excluir";
            }
        }

        public function listProducts($category) {
            $select = "SELECT * FROM produtos WHERE categoria = '$category'";
            $stmt = $this->conn->prepare($select);

            if ($stmt->execute()) {
                $stmt = $stmt->get_result();
                return $stmt->fetch_all(MYSQLI_ASSOC);
                $stmt->close();
                $conn->close();
            }
        }
    }