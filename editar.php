<?php
include 'contato.class.php';
$contato = new Contato;
if(!empty($_GET['id'])){


    $id_sent = ($_GET['id']);
    $id = (int)filter_var($id_sent, FILTER_SANITIZE_NUMBER_INT);
    $info = $contato->getInfo($id);

    if(!empty($_info['email'])){
        header("Location: index.php");
        exit;
    }
} else{
    header("Location: index.php");
    exit;
    }
?>



<head>
        <link rel="stylesheet" href="estilos.php">
        <title>EDITAR USUARIO</title>
</head>
<body>
<h1>Editar usuario</h1>
<form class="form-add" method="POST" action="editar_action.php">

    <input type="hidden" name="id" value="<?php echo $info['id'];?>" />
    <label>
        Nome: <br/>
        <input type="text" name="name" value="<?php echo $info['name'];?>" />
    </label><br/><br/>

    <label>
        Email: <br/>
        <input type="text" name="email" value="<?php echo $info['email'];?>" />
    </label><br/><br/>

    <label>
        Endereço: <br/>
        <input type="text" name="endereco" value="<?php echo $info['endereco'];?>" />
    </label><br/><br/>

    <label>
        Telefone: <br/>
        <input type="text" name="telefone" value="<?php echo $info['telefone'];?>" />
    </label><br/><br/>
    <input type="submit" value="Salvar"/>
</form>
</body>