<head>
        <link rel="stylesheet" href="estilos.php">
        <title>ADICIONAR</title>
</head>
<body>
<div>
    <form class="form-add" method="POST" action="adicionar_action.php">
        <label>
            Nome: <br/>
            <input type="text" name="name">
        </label><br/><br/>
        <label>
            Email: <br/>
            <input type="text" name="email">
        </label><br/><br/>
        <label>
            Endereço: <br/>
            <input type="text" name="endereco">
        </label><br/><br/>
        <label>
            Telefone: <br/>
            <input type="tel" name="telefone" placeholder="(84) 99999-9999">
        </label><br/><br/>
        <input type="submit" value="Adicionar">
    </form>
</div>
</body>