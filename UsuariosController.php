<?php

class UsuariosController extends Controller
{

    /**
     * Lista os usuários
     */
    public function listar()
    {
        $usuarios = Usuario::all();
        return $this->view('usuarios_grade', ['usuarios' => $usuarios]);
    }

    /**
     * Mostrar formulario para criar um novo usuário
     */
    public function criar()
    {
        return $this->view('usuarios_form');
    }

    /**
     * Mostrar formulário para editar um usuário
     */
    public function editar($dados)
    {
        $id      = (int) $dados['id'];
        $usuario = Usuario::find($id);

        return $this->view('usuarios_form', ['usuario' => $usuario]);
    }

    /**
     * Salvar o usuário submetido pelo formulário
     */
    public function salvar()
    {
        $usuario        = new Usuario;
        $usuario->nome  = $this->request->nome;
        $usuario->email = $this->request->email;
        $usuario->senha = $this->request->senha;
        $usuario->ativo = isset($_POST['ativo']) ? 1 : 0;
        
        if ($usuario->save()) {
            return $this->listar();
        }
    }

    /**
     * Atualizar o usuário conforme dados submetidos
     */
    public function atualizar($dados)
    {
        $id             = (int) $dados['id'];
        $usuario        = Usuario::find($id);
        $usuario->nome  = $this->request->nome;
        $usuario->email = $this->request->email;
        if (!empty($this->request->senha)) {
            $usuario->senha = $this->request->senha;
        }
        $usuario->ativo = isset($_POST['ativo']) ? 1 : 0;
        $usuario->save();

        return $this->listar();
    }

    /**
     * Apagar um usuário conforme o id informado
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $usuario = Usuario::destroy($id);
        return $this->listar();
    }
}
