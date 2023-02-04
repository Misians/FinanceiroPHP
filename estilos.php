<?php
header("Content-type: text/css");
?>

/*PAGINA INICIAL - HOME */
.quadradinho{
    background: #EBA43A;
    align-items: center;
    box-sizing: border-box;
    background: #EBA43A;
    box-shadow: 0px 3px 13px rgba(0, 0, 0, 0.25);
    border-radius: 4px;
    display: block;
    margin: 20px;
    padding-left: 20px;
    padding-right: 20px;
    padding-top:10px;
    padding-bottom:10px;
    color: #Fff;
    font-family: 'Poppins', sans-serif;
    font-weight: bold;
    text-align: center;
    justify-content: center;
    align-items: center;
}
.dadosgerais{
    display: flex;
    justify-content: center;
}

body{
    align-items:center;
    justify-content: center;
}
.num-azul{
    color: #28335A;
    font-weight: bolder;

}


/*PAGINA LISTAR CLIENTES */

.imagem{
    width: 40px;
}
.linha-tabela{    
    background: #28335A;
    border-radius: 10px;
    display: flex;
    padding: 25px;
    margin: 20px;
    list-style: none;
    padding-right: 14px;
    color: #fff;
    font-size: 20px;
    border-box: box-sizing;
}
.informações{
    display:block;
}
ul li a{
    color: fff;
    text-decoration: none;
}
.abaixo a{
    margin: auto;
    margin: 10px;
}
.botões-editar-excluir{
    margin: auto;
}



/* PAGINA ADICIONAR CLIENTE */
.form-add{
    text-align: center;
    position: absolute;
    width:100%;
}
input{
    padding: 10px;
}
.botao-add{
    background: #28335A;
    justify-content: center;
    text-align: center;
    align-items: center;
    color: fff;
    padding: 5px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 5px;
    justify-content: center;
    text-align: center;
    align-items: center;
    text-decoration: none;
}