<?php

require_once '../conexao.php';

$stmt = $bd->query('SELECT * FROM produtos WHERE apagado = 1');
$stmt->execute();

echo "<form method='post'>
    <table border=1>
        <tr>
            <td>ID</td><td>Descrição</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
        </tr>
";
while($registro = $stmt->fetch(PDO::FETCH_ASSOC)){
   
    $img = 'N/D';

    if( !empty($registro['imagem']) ){

        if(is_file($registro['imagem'])){
            $img = "<img src='{$registro['imagem']}'>";
        }
    }

    echo "<tr>
            <td>{$registro['id']}</td>
            <td>$img</td>
            <td>{$registro['descricao']}</td>
            <td><button type='submit' formaction='lixeira-apaga.php' name='id' value='{$registro['id']}'>Apagar</button></td>
            <td><button type='submit' formaction='lixeira-recupera.php' name='id' value='{$registro['id']}'>Recuperar</button></td>
          </tr>
    ";
}

echo "</table>
    </form>
";