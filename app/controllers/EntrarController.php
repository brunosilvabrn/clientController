<?php
declare(strict_types=1);

class EntrarController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->session->start();
        $authenticado = $this->session->get('authUser');

        if ($authenticado != null) {
            return $this->response->redirect("painel");
        }

        if (isset($_POST['email'])) {

            $email = $this->request->getPost('email');
            $senha = $this->request->getPost('senha');

            $administrador = new Administradores();

            $admInformacoes = $administrador::findFirst([
                    "(email = :email:)",
                    'bind' => ['email' => $email]
                ]);

            if ($admInformacoes) {
                if (password_verify($senha, $admInformacoes->senha)) {
                    // Criando sessão de login
                    $this->session->set('authUser', [
                        'id' => $admInformacoes->id,
                        'nome' => $admInformacoes->usuario,
                        'email' => $admInformacoes->email
                    ]);

                    return $this->response->redirect("painel");
                }
            }

            return $this->response->redirect("entrar");
           
        }
    }

}

