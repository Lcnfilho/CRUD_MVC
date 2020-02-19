<?php


class ContatosController extends Controller {

    public function listar() {
        $contatos = Contato::all();
        return $this->view('grade', ['contatos' => $contatos]);
    }

    public function criar() {
        return $this->view('form');
    }

    public function editar($dados) {
        $id      = (int) $dados['id'];
        $contato = Contato::find($id);

        return $this->view('form', ['contato' => $contato]);
    }

    public function salvar() {
        $contato           = new Contato;
        $contato->nome     = $this->request->nome;
        $contato->telefone = $this->request->telefone;
        $contato->email    = $this->request->email;
        $contato->endereco = $this->request->endereco;
        if ($contato->save()) {
            return $this->listar();
        }
    }

    public function atualizar($dados) {
        $id                = (int) $dados['id'];
        $contato           = Contato::find($id);
        $contato->nome     = $this->request->nome;
        $contato->telefone = $this->request->telefone;
        $contato->email    = $this->request->email;
        $contato->endereco = $this->request->endereco;
        $contato->save();

        return $this->listar();
    }

    public function excluir($dados) {
        $id      = (int) $dados['id'];
        $contato = Contato::destroy($id);
        return $this->listar();
    }
}