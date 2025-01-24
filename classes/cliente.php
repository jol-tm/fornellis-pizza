<?php
    Class Cliente {
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function signUp($nome, $email, $numero, $senha ,$endereco) {
            $check = "SELECT email FROM clientes WHERE email = '$email'";

            if ($this->conn->query($check)->num_rows == 0) {
                $insert = "INSERT INTO clientes (nome, email, numero, senha, endereco) VALUES (?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($insert);
                $stmt->bind_param('sssss', $nome, $email, $numero, $senha ,$endereco);
                if ($stmt->execute()) {
                    return 1;
                };
            } else {
                return 0;
            }
            $stmt->close();
            $this->conn->close();
        }

        public function login($email, $senha) {
            $check = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'";
            $stmt = $this->conn->prepare($check);
            $stmt->execute(); 
            $result = $stmt->get_result();
            
            if ($result->num_rows != 0) {
                $result = $result->fetch_all(MYSQLI_ASSOC);
                return $result;
            } else {
                return 0;
            }
            $stmt->close();
            $this->conn->close();
        }

        public function editAcc($nome, $email, $numero, $senha ,$endereco, $id) {
            $update = "UPDATE clientes SET nome = ?, email = ?, numero = ?, senha = ?, endereco = ? WHERE id = ?";
            $stmt = $this->conn->prepare($update);
            $stmt->bind_param('sssssi', $nome, $email, $numero, $senha ,$endereco, $id);

            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
            $stmt->close();
            $this->conn->close();
        }

        public function deleteAcc($id) {
            $delete = "DELETE FROM clientes WHERE id = ?";
            $stmt = $this->conn->prepare($delete);
            $stmt->bind_param('i', $id);

            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
            $stmt->close();
            $this->conn->close();
        }

        public function listOrders($id) {
            $select = "SELECT * FROM pedidos WHERE idCliente = $id";

            $stmt = $this->conn->prepare($select);

            if ($stmt->execute()) {
                $stmt = $stmt->get_result();
                return $stmt->fetch_all(MYSQLI_ASSOC);
            }
            $stmt->close();
            $this->conn->close();
        }
    }