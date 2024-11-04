<?php
    Class Cliente {
        private $nome;
        private $email;
        private $numero;
        private $senha;
        private $endereco;

        public function __construct($nome, $email, $numero, $senha, $endereco) {
            $this->nome = $nome;
            $this->email = $email;
            $this->numero = $numero;
            $this->senha = $senha;
            $this->endereco = $endereco;
        }

        public function signUp() {
            include_once '../conn.php';
            
            $check = "SELECT email FROM clientes WHERE email = '{$this->email}'";

            if ($conn->query($check)->num_rows == 0) {
                $insert = "INSERT INTO clientes (nome, email, numero, senha, endereco) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($insert);
                $stmt->bind_param('sssss', $this->nome, $this->email, $this->numero, $this->senha ,$this->endereco);
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
    }