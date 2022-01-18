<?php
declare(strict_types=1);

class AdministradoresController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        // Verifica se o administrador esta cadastrado 
        $dados = $this->session->get('authUser');
        $this->view->usuario = $dados['nome'];

        if ($dados == null) {
            return $this->response->redirect("entrar");
        }

        $administrador = new Administradores();

        $info = $administrador::find();
        
        $data = [];

        foreach ($info as $values) {
            $data[] = [
                'id'       => $values->id,
                'usuario'     => $values->usuario,
                'email'      => $values->email,
            ];
        }
        // Dados para retornar para view
        $this->view->admInfo = $data;
    }

    public function cadastrarAction()
    {
        $usuario = $this->request->getPost('usuario');
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
        $confirmarSenha = $this->request->getPost('confirmarSenha');

        if ($senha != $confirmarSenha) {
            return $this->response->redirect("administradores");
        }

        $administrador = new Administradores();

        $administrador->usuario = $usuario;
        $administrador->email = $email;
        $administrador->senha = password_hash($senha, PASSWORD_DEFAULT);
        $salvar = $administrador->save();

        if ($salvar) {
            return $this->response->redirect("administradores");
        }else {
            return $this->response->redirect("administradores?erro=Erro ao cadastrar");
        }

        
    }

    public function excluirAction($id = null)
    {

        $senha = $this->request->getPost('senha');

        if (!is_numeric($id) || (!isset($senha) || $senha == '')) {
            return $this->response->redirect("administradores");
        }

        $dados = $this->session->get('authUser');
        $admId = $dados['id'];

        $admAtual = Administradores::findFirst($admId);
        $administrador = Administradores::findFirst($id);

        if ($administrador != false) {
            if ($senha == $admAtual->senha) {
                if ($administrador->delete()) {
                    return $this->response->redirect("administradores");
                }else {
                    return $this->response->redirect("administradores?erro=erro ao excluir administrador");
                }

            }
        }

        return $this->response->redirect("administradores");
    }

    public function alterarSenhaAction($id = null)
    {
        $novaSenha = $this->request->getPost('novaSenha');
        $novaSenhaConfirmar = $this->request->getPost('novaSenhaConfirmar');
        $senhaVerificar = $this->request->getPost('senhaVerificar');
        $novaSenha = password_hash($novaSenha, PASSWORD_DEFAULT);
        $admTrocar =  Administradores::find($id);

        if ($admTrocar != false) {
            $dados = $this->session->get('authUser');
            $admId = $dados['id'];
            $admSolicitante = Administradores::findFirst($admId);

            if ($admSolicitante != false) {
                if (password_verify($senhaVerificar ,$admSolicitante->senha)) {
                    $atualizar = $admTrocar->update(['senha' => $novaSenha]);
                    if ($atualizar) {
                        return $this->response->redirect("administradores?sucess=senha alterada com sucesso");
                    }else {
                        return $this->response->redirect("administradores?error=erro ao atualizar senha");
                    }
                }else {
                    return $this->response->redirect("administradores?error=senha atual incorreta");
                }
            }else {
                return $this->response->redirect("administradores?error=erro ao atualizar");
            }
        }else {
            return $this->response->redirect("administradores");
        }
    }
}

