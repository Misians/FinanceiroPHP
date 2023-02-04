<?php

class Contato {
    private $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=financeiro;host=localhost","root","");
    }
    public function adicionar($email, $name = '',$telefone = '', $endereco = '') {
		if($this->existeEmail($email) == false) {
			$sql = "INSERT INTO cliente (name, email,endereco,telefone) VALUES (:name, :email,:endereco,:telefone)";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':name', $name);
			$sql->bindValue(':telefone', $telefone);
			$sql->bindValue(':endereco', $endereco);
            $sql->bindValue(':email', $email);
			$sql->execute();

			return true;
		} else {
			return false;
		}
	}
    public function getNome($email){
        $sql = "SELECT name FROM cliente WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            $info = $sql->fetch();
            return $info['name'];
        }
        else{
            return '';
        }
    }
    public function getInfo($id){
        $sql = "SELECT * FROM cliente WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetch();
        }else{
            return array();
        }
    }
    public function getAll(){
        $sql = "SELECT * FROM cliente";
        $sql = $this->pdo->query($sql);
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }else{
            return array();
        }
    }
    public function getAllEmprestimos(){
        $sql = "SELECT * FROM emprestimo";
        $sql = $this->pdo->query($sql);
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }else{
            return array();
        }
    }
    public function editar($email, $name, $telefone, $endereco, $id) {
		$sql = "UPDATE cliente SET name = :name,email = :email, telefone= :telefone,
        endereco= :endereco WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id); 
		$sql->bindValue(':name', $name); 
        $sql->bindValue(':email', $email);
		$sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':endereco', $endereco);
        $sql->execute();
	}
    
    public function excluir($email) {
		if($this->existeEmail($email)) {
			$sql = "DELETE FROM cliente WHERE email = :email";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':email', $email);
			$sql->execute();

			return true;
		} else {
			return false;
		}
	}

    public function removerCliente($id){
		$sql = "DELETE FROM cliente WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
    }

    private function existeEmail($email){
        $sql = "SELECT * FROM cliente WHERE email = :email ";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }

    }
    
}