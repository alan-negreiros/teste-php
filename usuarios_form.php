<div class="container">
    <form action="?controller=UsuariosController&<?php echo isset($usuario->id) ? "method=atualizar&id={$usuario->id}" : "method=salvar"; ?>" method="post" >
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Cadastro de Usuário</span>
            </div>
            <div class="card-body">
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Nome:</label>
                    <input type="text" class="form-control col-sm-8" name="nome" id="nome" required value="<?php
                    echo isset($usuario->nome) ? htmlspecialchars($usuario->nome) : null;
                    ?>" />
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Email:</label>
                    <input type="email" class="form-control col-sm-8" name="email" id="email" required value="<?php
                    echo isset($usuario->email) ? htmlspecialchars($usuario->email) : null;
                    ?>" />
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Senha:</label>
                    <input type="password" class="form-control col-sm-8" name="senha" id="senha" <?php echo isset($usuario->id) ? '' : 'required'; ?> placeholder="<?php echo isset($usuario->id) ? 'Deixe em branco para manter a senha atual' : ''; ?>" />
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Ativo:</label>
                    <div class="col-sm-8 pt-2">
                        <input type="checkbox" name="ativo" id="ativo" value="1" <?php echo (!isset($usuario->ativo) || $usuario->ativo) ? 'checked' : ''; ?> />
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="hidden" name="id" id="id" value="<?php echo isset($usuario->id) ? $usuario->id : null; ?>" />
                <button class="btn btn-success" type="submit">Salvar</button>
                <button class="btn btn-secondary" type="reset">Limpar</button>
                <a class="btn btn-danger" href="?controller=UsuariosController&method=listar">Cancelar</a>
            </div>
        </div>
    </form>
</div>
