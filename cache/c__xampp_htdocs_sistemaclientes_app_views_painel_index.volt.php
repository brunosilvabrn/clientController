<!-- Navbar -->
<?php $this->partial("layouts/navbar") ?>

<!-- Arquivos javascript -->
<?php echo \Phalcon\Tag::javascriptInclude("public/js/mascara.js"); ?>

<?php echo \Phalcon\Tag::javascriptInclude("public/js/verificarSenha.js"); ?>

<?php echo \Phalcon\Tag::javascriptInclude("public/js/script.js"); ?>

<main>
  <div class="card m-2 shadow-sm">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h1 class="card-title d-inline-block">Clientes</h1>
        <div class="text-end d-inline-block m-2">
          <!-- Botão para acionar modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCadastro">
            Novo Cliente
          </button>
          <button type="button" onclick="atualizarPagina()" class="btn btn-light shadow-sm">Atualizar</button>
        </div>
      </div>
      <hr>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Telefone</th>
            <th scope="col">Email</th>
            <th scope="col" width="256px" class="text-center">opções</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td><?php print_r($teste) ?></td>
            <td>cliente@email.net</td>
            <td>
              <a href="visualizar.html" type="button" class="btn btn-success">Visualizar</a>
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditar">Editar</button>
              <button type="button" class="btn btn-danger">Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>cliente@email.net</td>
            <td>
              <a href="visualizar.html" type="button" class="btn btn-success">Visualizar</a>
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditar">Editar</button>
              <button type="button" class="btn btn-danger">Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Thornton</td>
            <td>Thornton</td>
            <!-- <td colspan="2">Larry the Bird</td> -->
            <td>@twitter</td>
            <td>cliente@email.net</td>
            <td>
              <a href="visualizar.html" type="button" class="btn btn-success">Visualizar</a>
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditar">Editar</button>
              <button type="button" class="btn btn-danger">Excluir</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</main>

<!-- Cadastrar Cliente Modal -->
<?php $this->partial("layouts/modalCadastrarCliente") ?>

<!-- Editar Cliente Modal -->
<?php $this->partial("layouts/modalEditarCliente") ?>

<!-- Cadastrar administrador Modal -->
<?php $this->partial("layouts/modalCadastrarAdministrador") ?>
