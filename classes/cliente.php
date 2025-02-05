<?php
    Class Cliente {
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function signUp($nome, $email, $numero, $senha ,$endereco) {
            $check = "SELECT email FROM clientes WHERE email = '$email'";

            if ($this->conn->query($check)->num_rows == 0) {
                $senha = password_hash($senha, PASSWORD_DEFAULT);
                $insert = "INSERT INTO clientes (nome, email, numero, senha, endereco) VALUES (?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($insert);
                $stmt->bind_param('sssss', $nome, $email, $numero, $senha ,$endereco);
                if ($stmt->execute()) {
                    $stmt->close();
                    $this->conn->close();
                    return true;
                };
            } else {
                $this->conn->close();
                return false;
            }
        }

        public function login($email, $senha) {
            $check = "SELECT * FROM clientes WHERE email = '$email'";
            $result = $this->conn->query($check);
            
            if ($result->num_rows != 0) {
                $result = $result->fetch_assoc();
                if (password_verify($senha, $result['senha'])) {
                    $this->conn->close();
                    return $result;
                } else {
                    $this->conn->close();
                    return false;
                }
            } else {
                $this->conn->close();
                return false;
            }
        }

        public function editAcc($nome, $email, $numero, $senha ,$endereco, $id) {
            if ($senha == null && $email == null) {
                $update = "UPDATE clientes SET nome = ?, numero = ?, endereco = ? WHERE id = ?";
                $stmt = $this->conn->prepare($update);
                $stmt->bind_param('sssi', $nome, $numero, $endereco, $id);
            } elseif ($senha == null) {
                $update = "UPDATE clientes SET nome = ?, email = ?, numero = ?, endereco = ? WHERE id = ?";
                $stmt = $this->conn->prepare($update);
                $stmt->bind_param('ssssi', $nome, $email, $numero, $endereco, $id);
            } elseif ($email == null) {
                $update = "UPDATE clientes SET nome = ?, numero = ?, senha = ?, endereco = ? WHERE id = ?";
                $stmt = $this->conn->prepare($update);
                $senha = password_hash($senha, PASSWORD_DEFAULT);
                $stmt->bind_param('ssssi', $nome, $numero, $senha ,$endereco, $id);
            } else {
                $update = "UPDATE clientes SET nome = ?, email = ?, numero = ?, senha = ?, endereco = ? WHERE id = ?";
                $stmt = $this->conn->prepare($update);
                $senha = password_hash($senha, PASSWORD_DEFAULT);
                $stmt->bind_param('sssssi', $nome, $email, $numero, $senha ,$endereco, $id);
            }

            if ($stmt->execute()) {
                $stmt->close();
                $this->conn->close();
                return true;
            } else {
                $stmt->close();
                $this->conn->close();
                return false;
            }
        }

        public function deleteAcc($id) {
            $delete = "DELETE FROM clientes WHERE id = ?";
            $stmt = $this->conn->prepare($delete);
            $stmt->bind_param('i', $id);

            if ($stmt->execute()) {
                $stmt->close();
                $this->conn->close();
                return true;
            } else {
                $stmt->close();
                $this->conn->close();
                return false;
            }
        }

        /*public function listOrders($id) {
            $select = "SELECT * FROM pedidos WHERE idCliente = $id";

            $stmt = $this->conn->prepare($select);

            if ($stmt->execute()) {
                $stmt = $stmt->get_result();
                return $stmt->fetch_all(MYSQLI_ASSOC);
            }
            $stmt->close();
            $this->conn->close();
        }*/
    }