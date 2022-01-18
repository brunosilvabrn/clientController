<?php
declare(strict_types=1);

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->session->start();
        $authenticado = $this->session->get('authUser');

        if ($authenticado != null) {
            return $this->response->redirect("painel");
        }

        return $this->response->redirect("entrar");
    }

}

