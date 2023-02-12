<?php

class Emprestimo {
    private $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=financeiro;host=localhost","root","");
    }
    public function adicionarEmprestimo($juros, $dividaInicial, $dataEmprestado, 
    $dataPagar, $idCliente, $mesesadiados, $totaldivida) {
		if($this->existeEmail($idCliente) == false) {
            $sql = "INSERT INTO emprestimo (juros, divida_inicial, data_pagar, data_emprestado, 
            id_cliente, meses_adiados, total_divida) 
            VALUES ( :juros, :divida_inicial, :data_pagar, :data_emprestado, 
            :id_cliente, :meses_adiados, :total_divida)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':juros', $juros);
            $sql->bindValue(':divida_inicial', $dividaInicial);
            $sql->bindValue(':data_emprestado', $dataEmprestado);
            $sql->bindValue(':data_pagar', $dataPagar);
            $sql->bindValue(':id_cliente', $idCliente);
            $sql->bindValue(':meses_adiados', NULL);
            $sql->bindValue(':total_divida', NULL);
    
            $sql->execute();
			return true;
		} else {
			return false;
		}
	}
    public function getNomeEmprestimos($email){ //selecionando apenas um campo do emprestimo
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
    public function addEmprestimo($juros, $idCliente = '',  $dividaInicial = '', $dataEmprestado = '', 
    $dataPagar = '') {
        $sql = "INSERT INTO `emprestimo` (`id_emprestimo`, `juros`, `meses_adiados`, `total_divida`, `divida_inicial`, `data_pagar`, `data_emprestado`, `id_cliente`) 
        VALUES ( NULL, :juros, NULL, NULL, :divida_inicial, :data_pagar, :data_emprestado, :id_cliente)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':juros', $juros);
        $sql->bindValue(':divida_inicial', $dividaInicial);
        $sql->bindValue(':data_emprestado', $dataEmprestado);
        $sql->bindValue(':data_pagar', $dataPagar);
        $sql->bindValue(':id_cliente', $idCliente);
        $sql->execute();

        return true;
    }


    public function getInfoEmprestimos($id){ //pegando todos os campos de um emprestimo
        $sql = "SELECT * FROM emprestimo WHERE id_cliente = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }else{
            return array();
        }
    }
    public function getAllEmprestimos(){ //pegando todos os dados de todos emprestimos
        $sql = "SELECT * FROM emprestimo";
        $sql = $this->pdo->query($sql);
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }else{
            return array();
        }
    }


//mudar dps

//------------------//
    public function editarEmprestimo($email, $name, $telefone, $endereco, $id) { //editar emprestimo
		$sql = "UPDATE emprestimo SET name = :name,email = :email, telefone= :telefone,
        endereco= :endereco WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id); 
		$sql->bindValue(':name', $name); 
        $sql->bindValue(':email', $email);
		$sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':endereco', $endereco);
        $sql->execute();
	}
//---------------------//
    public function removerEmprestimo($id){ //excluir emprestimo
		$sql = "DELETE FROM emprestimo WHERE id_emprestimo = :id_emprestimo";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id_emprestimo', $id);
		$sql->execute();
    }

    private function existeEmail($id_cliente){ //verificar se existe um emprestimo
        $sql = "SELECT * FROM emprestimo WHERE id_cliente = :id_cliente";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id_cliente', $id_cliente);
        $sql->execute();
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }

    }
    
}