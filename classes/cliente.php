<?php
    Class Cliente {
        private $nome;
        private $email;
        private $numero;
        private $senha;
        private $endereco;

        public function signUp($nome, $email, $numero, $senha ,$endereco) {
            include_once 'conn.php';
            
            $check = "SELECT email FROM clientes WHERE email = '{$this->email}'";

            if ($conn->query($check)->num_rows == 0) {
                $insert = "INSERT INTO clientes (nome, email, numero, senha, endereco) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($insert);
                $stmt->bind_param('sssss', $nome, $email, $numero, $senha ,$endereco);
                if ($stmt->execute()) {
                    return "Cadastrado com sucesso! :D";
                    $stmt->close();
                    $conn->close();
                    header('Location: ../index.php');
                };
            } else {
                return "Usuário já cadastrado";
            }
        
        }
        public function login($email, $senha) {
            include_once 'conn.php';
            
            $check = "SELECT email FROM clientes WHERE email = '$email' AND senha = '$senha'";

            if ($conn->query($check)->num_rows != 0) {
                return "Logado!";
            } else {
                return "Email ou senha incorreto!";
            }
        }
    }