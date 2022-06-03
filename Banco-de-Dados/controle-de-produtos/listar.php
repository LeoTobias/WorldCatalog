<?php
require '../conexao.php';
require '../controleDeAcesso.php';

$consulta = $bd->query("SELECT id, nome, descricao, ano, imagem, id_raridade, id_categoria, tipo_produto FROM produtos WHERE apagado = 0");
$consulta->execute();

?>

<style>
    .table {
        width: 150px; 
        border: solid 2px #ddd; 
        border-collapse: collapse; 
        background-color: #c6c6c6;
        text-align: center;
    }
    td{
        padding: 15px;
        border: solid 2px #000;

    }
    .table td, .table th {
        border: 1px solid #ddd;
        padding: 8px;
        background-color: #4254c8;
    }
</style>

<form method="post">
    <table class="table">
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Tipo do Produto</th>
        <th>ano</th>
        <th>imagem</th>
        <th>Raridade</th>
        <th>Categoria</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
        <?php while($linha = $consulta->fetch(PDO::FETCH_ASSOC)):
                $img = 'N/D';
                if( !empty($linha['imagem']) ){

                    if(is_file($linha['imagem'])){
                        $img = "<img src='{$linha['imagem']} width='350' height='350'>";
                    }
                }
            ?>
                <tr>
                    <td><?php echo $linha['nome']; ?></td>
                    <td><?php echo $linha['descricao']; ?></td>
                    <td><?php echo $linha['tipo_produto']; ?></td>
                    <td><?php echo $linha['ano']; ?></td>
                    <td><?php echo $img ?></td>
                    <td><?php echo $linha['id_raridade']; ?></td>
                    <td><?php echo $linha['id_categoria']; ?></td>
                    <td><button name="id" formaction="delete.php" value = "<?php echo $linha['id'] ?>">Exluir</button></td>
                    <td><button name="id" formaction="editar.php" value = "<?php echo $linha['id']; ?>">Editar</button></td>
                </tr>
        <?php endwhile;?>
    </table>
</form>
<a href="../../home.php">Voltar</a>