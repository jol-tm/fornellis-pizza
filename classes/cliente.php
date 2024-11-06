<?php
    Class Cliente {
        private $nome;
        private $email;
        private $numero;
        private $senha;
        private $endereco;

        public function signUp($nome, $email, $numero, $senha ,$endereco) {
            include '../conn.php';
            
            $check = "SELECT email FROM clientes WHERE email = '{$this->email}'";

            if ($conn->query($check)->num_rows == 0) {
                $insert = "INSERT INTO clientes (nome, email, numero, senha, endereco) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($insert);
                $stmt->bind_param('sssss', $nome, $email, $numero, $senha ,$endereco);
                if ($stmt->execute()) {
                    return 1;
                };
            } else {
                return 0;
            }
            $stmt->close();
            $conn->close();
        }

        public function login($email, $senha) {
            include '../conn.php';
            
            $check = "SELECT email, id FROM clientes WHERE email = '$email' AND senha = '$senha'";
            
            if ($conn->query($check)->num_rows != 0) {
                return 1;
            } else {
                return 0;
            }
            $stmt->close();
            $conn->close();
        }

        public function editAcc($nome, $email, $numero, $senha ,$endereco, $id) {
            include '../conn.php';
            
            $update = "UPDATE clientes SET nome = ?, email = ?, numero = ?, senha = ?, endereco = ? WHERE id = ?";
            $stmt = $conn->prepare($update);
            $stmt->bind_param('sssssi', $nome, $email, $numero, $senha ,$endereco, $id);

            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
            $stmt->close();
            $conn->close();
        }

        public function deleteAcc($id) {
            include '../conn.php';
            
            $delete = "DELETE FROM clientes WHERE id = ?";
            $stmt = $conn->prepare($delete);
            $stmt->bind_param('i', $id);

            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
            $stmt->close();
            $conn->close();
        }

        public function listOrders($id) {
            include 'conn.php';
            
            $select = "SELECT * FROM pedidos WHERE idCliente = $id";

            $stmt = $conn->prepare($select);

            if ($stmt->execute()) {
                $stmt = $stmt->get_result();
                return $stmt->fetch_all(MYSQLI_ASSOC);
            }
            $stmt->close();
            $conn->close();
        }
    }