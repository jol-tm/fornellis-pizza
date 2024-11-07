<?php
    Class Produto {
        private $nome;
        private $categoria;
        private $descricao;
        private $preco;
        private $imagem;

        public function addProduct($nome, $categoria, $descricao, $preco, $imagem) {
            include_once 'conn.php';
        
            $insert = "INSERT INTO produtos (nome, categoria, descricao, preco, imagem) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert);
            $stmt->bind_param('sssss', $nome, $categoria, $descricao, $preco , $imagem);
            if ($stmt->execute()) {
                return "Cadastrado com sucesso! :D";
                $stmt->close();
                $conn->close();
                header('Location: ../index.php');
            } else {
                return "Erro ao cadastrar";
            }
        }

        public function editProduct($nome, $categoria, $descricao, $preco, /*$imagem,*/ $id) {
            include_once '../conn.php';
            $update = "UPDATE produtos SET nome = ?, categoria = ?, descricao = ?, preco = ?/*, imagem = ?*/ WHERE id = $id";
            $stmt = $conn->prepare($update);
            $stmt->bind_param('ssss', $nome, $categoria, $descricao, $preco/*, $imagem*/);
            if ($stmt->execute()) {
                return "Editado com sucesso! :D";
                $stmt->close();
                $conn->close();
                header('Location: ../index.php');
            } else {
                return "Erro ao editar";
            }
        }

        public function deleteProduct($id) {
            include_once '../conn.php';
        
            $delete = "DELETE FROM produtos WHERE id = $id";
            $stmt = $conn->prepare($delete);
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
            include 'conn.php';
        
            $select = "SELECT * FROM produtos WHERE categoria = '$category'";
            $stmt = $conn->prepare($select);

            if ($stmt->execute()) {
                $stmt = $stmt->get_result();
                return $stmt->fetch_all(MYSQLI_ASSOC);
                $stmt->close();
                $conn->close();
            }
        }
    }