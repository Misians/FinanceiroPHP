<?php

class Emprestimo {
    private $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=financeiro;host=localhost","root","");
    }
    public function adicionarEmprestimo($juros, $dividaInicial, $dataEmprestado, $dataPagar, $idCliente) {
		if($this->existeEmail($idCliente) == false) {
            $sql = "INSERT INTO emprestimo (juros, divida_inicial, data_pagar, data_emprestado, id_cliente) 
            VALUES ( :juros, :divida_inicial, :data_pagar, :data_emprestado, :id_cliente)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':juros', $juros);
            $sql->bindValue(':divida_inicial', $dividaInicial);
            $sql->bindValue(':data_emprestado', $dataEmprestado);
            $sql->bindValue(':data_pagar', $dataPagar);
            $sql->bindValue(':id_cliente', $idCliente);
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
    public function addEmprestimo($id_cliente, $juros, $data_emprestado, $data_pagar, $valor, $meses_adiados, $total_divida, $japago) {
        $sql = "INSERT INTO emprestimo (id_cliente, juros, data_emprestado, data_pagar, divida_inicial, meses_adiados, total_divida, japago)
                VALUES (:id_cliente, :juros, :data_emprestado, :data_pagar, :divida_inicial,:meses_adiados, :total_divida, :japago)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_cliente', $id_cliente);
        $stmt->bindValue(':juros', $juros);
        $stmt->bindValue(':data_emprestado', $data_emprestado);
        $stmt->bindValue(':data_pagar', $data_pagar);
        $stmt->bindValue(':divida_inicial', $valor);
        $stmt->bindValue(':japago', $japago);
        $stmt->bindValue(':meses_adiados', $meses_adiados);
        $stmt->bindValue(':total_divida', $total_divida);
        $stmt->execute();
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
    public function getInfoUnicoEmprestimo($id){ //pegando todos os campos de um emprestimo
        $sql = "SELECT * FROM emprestimo WHERE id_emprestimo = :id";
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
    public function editarEmprestimo($juros, $data_emprestado, $data_pagar,$divida_inicial, $id_emprestimo) { //editar emprestimo
		$sql = "UPDATE emprestimo SET juros = :juros,data_emprestado = :data_emprestado, data_pagar= :data_pagar,
        divida_inicial= :divida_inicial WHERE id_emprestimo = :id_emprestimo";
		$sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id_emprestimo', $id_emprestimo);
		$sql->bindValue(':data_emprestado', $data_emprestado); 
        $sql->bindValue(':data_pagar', $data_pagar);
		$sql->bindValue(':juros', $juros);
        $sql->bindValue(':divida_inicial', $divida_inicial);
        $sql->execute();
	}

    public function atualizarJaPago($id_emprestimo, $japago, $total_divida, $meses_adiados) {
        $sql = "UPDATE emprestimo SET japago = :japago WHERE id_emprestimo = :id_emprestimo";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":japago", $japago);
        $query->bindValue(":id_emprestimo", $id_emprestimo);
        $query->execute();
    }

    ///////////////////////////////////////
    public function quitarEmprestimo($id_emprestimo, $japago, $total_divida) { //editar emprestimo
		$sql = "UPDATE emprestimo SET japago = :japago, total_divida = :total_divida WHERE id_emprestimo = :id_emprestimo";
		$sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id_emprestimo', $id_emprestimo); 
        $sql->bindValue(':japago', $japago);
        $sql->bindValue(':total_divida', $total_divida);
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