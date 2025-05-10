<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contatos</title>
</head>
<body>
    <form action="?act=save" method="POST" name="form1">
        <h1>Agenda de Contatos</h1>
        <hr>

        <!-- Campo oculto para ID -->
        <input type="hidden" name="id" 
        <?php
            if (isset($id) && $id !== "") {
                echo "value=\"{$id}\"";
            }
        ?> 
        />

        <!-- Campo Nome -->
        Nome:
        <input type="text" name="nome" 
        <?php
            if (isset($nome) && $nome !== "") {
                echo "value=\"{$nome}\"";
            }
        ?> 
        /><br><br>

        <!-- Campo E-mail -->
        E-mail:
        <input type="text" name="email" 
        <?php
            if (isset($email) && $email !== "") {
                echo "value=\"{$email}\"";
            }
        ?> 
        /><br><br>

        <!-- Campo Celular -->
        Celular:
        <input type="text" name="celular" 
        <?php
            if (isset($celular) && $celular !== "") {
                echo "value=\"{$celular}\"";
            }
        ?> 
        /><br><br>

        <input type="submit" value="Salvar" />
        <input type="reset" value="Novo" />
        <hr>
    </form>
</body>
</html>
