<?php
declare(strict_types=1);

class PainelController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        
        $dados = $this->session->get('authUser');
        $this->view->usuario = $dados['nome'];
        // Verifica se o administrador esta cadastrado 
        if ($dados == null) {
            return $this->response->redirect("entrar");
        }

        $clientes = new Clientes();

        $info = $clientes::find(['order' => 'id']);
        
        $data = [];

        foreach ($info as $values) {
            $data[] = [
                'id'       => $values->id,
                'nome'     => $values->nome,
                'cpf'      => $values->cpf,
                'telefone' => $values->telefone,
                'email'    => $values->email 
            ];
        }
        // Dados para retornar para view
        $this->view->clientesInfo = $data;

    }

    public function cadastrarClienteAction() 
    {
        $nome = $this->request->getPost('nome');
        $cpf = $this->request->getPost('cpf');
        $telefone = $this->request->getPost('telefone');
        $email = $this->request->getPost('email');
        
        $cliente = new Clientes();

        $cliente->nome = $nome;
        $cliente->cpf = $cpf;
        $cliente->telefone = $telefone;
        $cliente->email = $email;

        $salvar = $cliente->save();

        if ($salvar) {
            $this->view->msg = 'Cadastrado com sucesso';
            return $this->response->redirect("painel");
        }
        
        return $this->response->redirect("painel?erro=Erro ao cadastrar cliente");
    }

    public function editarClienteAction() 
    {      
        $cliente = Clientes::find($id);

        $salvar = $cliente->update($this->request->getPost());

        if ($salvar) {
            return $this->response->redirect("painel");
        }
        
        return $this->response->redirect("painel?erro=Erro ao cadastrar editar");
    }

    public function excluirAction($id = null)
    {
        if (!is_numeric($id)) {
            return $this->response->redirect("painel");
        }

        $cliente = Clientes::findFirst($id);

        if ($cliente != false) {
            if ($cliente->delete() == true) {
                return $this->response->redirect("painel");
            }else {
                return $this->response->redirect("painel?erro=erro ao excluir usuario");
            }
        }

        return $this->response->redirect("painel");
    }


    public function searchAction($query = null) {
      
        if ($query == null) {
            return $this->response->redirect("painel");
        }

        $dados = $this->session->get('authUser');
        $this->view->usuario = $dados['nome'];

        $clientes = new Clientes();

        $info = $clientes::find(['conditions' => "nome LIKE '%{$query}%'"]);
        
        $data = [];

        foreach ($info as $values) {
            $data[] = [
                'id'       => $values->id,
                'nome'     => $values->nome,
                'cpf'      => $values->cpf,
                'telefone' => $values->telefone,
                'email'    => $values->email 
            ];
        }
        // Dados para retornar para view
        $this->view->clientesInfo = $data;

    }

    public function visualizarAction($id = null) {

        $dados = $this->session->get('authUser');
        $this->view->usuario = $dados['nome'];

        if ($id == null) {
            return $this->response->redirect("painel");
        }

        $clientes = new Clientes();

        $info = $clientes::find($id);
        
        $data = [];

        foreach ($info as $values) {
            $data[] = [
                'id'       => $values->id,
                'nome'     => $values->nome,
                'cpf'      => $values->cpf,
                'telefone' => $values->telefone,
                'email'    => $values->email 
            ];
        }
        // Verifica se a dados do usuário
        if (empty($data)) {
            return $this->response->redirect("painel");
        }

        // Dados para retornar para view
        $this->view->clienteInfo = $data;

    }

    public function sairAction() 
    {
        $this->session->start();
        $this->session->destroy();
        $this->response->redirect("entrar");
    }

}

