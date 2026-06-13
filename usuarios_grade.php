<h1>Usuários</h1>
<hr>
<div class="container">
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ativo</th>
                <th>Data de Criação</th>
                <th>Data de Atualização</th>
                <th><a href="?controller=UsuariosController&method=criar" class="btn btn-success btn-sm">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($usuarios) && $usuarios) {
                foreach ($usuarios as $usuario) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario->nome); ?></td>
                        <td><?php echo htmlspecialchars($usuario->email); ?></td>
                        <td><?php echo $usuario->ativo ? '<span class="badge badge-success">Sim</span>' : '<span class="badge badge-danger">Não</span>'; ?></td>
                        <td><?php echo htmlspecialchars($usuario->data_criacao); ?></td>
                        <td><?php echo htmlspecialchars($usuario->data_atualizacao); ?></td>
                        <td>
                            <a href="?controller=UsuariosController&method=editar&id=<?php echo $usuario->id; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="?controller=UsuariosController&method=excluir&id=<?php echo $usuario->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">Nenhum registro encontrado</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
