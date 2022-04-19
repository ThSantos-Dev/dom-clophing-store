<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CMS - DOM</title>

  <!-- Importação de font externa GoogleFonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/dashboard-usuarios.css" />
  <link rel="stylesheet" type="text/css" href="css/dashboard-contatos.css" />
</head>

<body>
  <!-- Header -->
  <header>
    <div class="header-content container">
      <!-- Title -->
      <div class="header-content-title">
        <h1>
          <span>CMS</span>
          DOM - Desvende o mundo!
        </h1>
        <h2>Gerenciamneto de Conteúdo do Site</h2>
      </div>
      <!-- // Title -->

      <!-- Logo -->
      <div class="header-content-logo">
        <img src="assets/img/icon/logo.png" alt="Logo" />
      </div>
      <!-- // Logo -->
    </div>
  </header>
  <!-- // Header -->

  <!-- Dashboard -->
  <section class="dashboard container">
    <!-- Actions container -->
    <div class="dashboard-content-actions-container">
      <!-- Action - Adm de Produtos -->
      <div class="dashboard-content-action">
        <a href="">
          <img src="assets/img/icon/box.png" alt="" />
          <span>Adm. de Produtos</span>
        </a>
      </div>
      <!-- // Action - Adm de Produtos -->

      <!-- Action - Adm de Produtos -->
      <div class="dashboard-content-action">
        <a href="dashboard-categorias.php">
          <img src="assets/img/icon/lista-de-controle.png" alt="" />
          <span>Adm. de Categorias</span>
        </a>
      </div>
      <!-- // Action - Adm de Produtos -->

      <!-- Action - Adm de Produtos -->
      <div class="dashboard-content-action">
        <a href="dashboard-contatos.php">
          <img src="assets/img/icon/contact-form.png" alt="" />
          <span>Contatos</span>
        </a>
      </div>
      <!-- // Action - Adm de Produtos -->

      <!-- Action - Adm de Produtos -->
      <div class="dashboard-content-action">
        <a href="dashboard-usuarios.php">
          <img src="assets/img/icon/people.png" alt="" />
          <span>Usuários</span>
        </a>
      </div>
      <!-- // Action - Adm de Produtos -->
    </div>
    <!-- // Actions container -->

    <!-- User container -->
    <div class="dashboard-content-user-container">
      <!-- User name -->
      <div class="dashboard-content-user-name">
        <p>Bem vindo! <span>Thales Santos</span>.</p>
      </div>
      <!-- // User name -->

      <!-- User action -->
      <div class="dashboard-content-user-logout">
        <img src="assets/img/icon/logout.png" alt="" />
        <input type="button" value="Logout" />
      </div>
      <!-- // User action -->
    </div>
    <!-- // User container -->
  </section>
  <!-- Dashboard -->

  <!-- Content Area -->
  <section class="content container">
    <h1 class="section-title">Usuários</h1>

    <div class="form-container">
      <!-- Form  -->
      <form action="router.php?component=usuarios">
        <h2>Cadastro de Usuários</h2>

        <!-- Name -->
        <div class="form-group">
          <label for="txtNome">Nome completo:</label>
          <input type="text" required name="txtNome" placeholder="Digite seu nome completo..." />
        </div>
        <!-- // Name -->

        <!-- Email -->
        <div class="form-group">
          <label for="txtEmail">E-mail:</label>
          <input type="email" required name="txtEmail" placeholder="Digite seu e-mail..." />
        </div>
        <!-- // Email -->

        <div class="form-group-row">
          <!-- Phone -->
          <div class="form-group">
            <label for="txtTelefone">Telefone:</label>
            <input type="text" name="txtTelefone" placeholder="(00) 99999-9999" />
          </div>
          <!-- // Phone -->

          <!-- Phone -->
          <div class="form-group">
            <label for="dateNasc">Data de nascimento:</label>
            <input type="date" name="dateNasc" />
          </div>
          <!-- // Phone -->
        </div>

        <!-- Password -->
        <div class="form-group-row">
          <div class="form-group">
            <label for="txtSenha">Senha:</label>
            <input type="password" name="txtSenha" placeholder="Insira uma senha..." required />
          </div>

          <div class="form-group">
            <label for="txtConfirmarSenha">Confirme sua senha:</label>
            <input type="password" name="txtConfirmarSenha" placeholder="Confirme sua senha..." required />
          </div>
        </div>
        <!-- // Password -->

        <div class="form-group-button">
          <button type="submit" value="salvar">salvar</button>
        </div>
      </form>
      <!-- // Form  -->
    </div>

    <div class="list-users">
      <h2>Lista de usuários</h2>

      <!-- Table Users -->
      <table>
        <thead>
          <th>Nome</th>
          <th>Telefone</th>
          <th>E-mail</th>
          <th>Opções</th>
        </thead>

        <tbody>
          <?php
          // Import do arquivo da controller para solicitar a listagem dos dados
          require_once('controller/controllerUsuario.php');

          // Chama a função que vai retornar os dados de contato
          if ($listContato = listaUsuarios()) {

            // Estrutura de repetição para retornar os dados do array e printar na tela
            foreach ($listContato as $item) {
          ?>
              <tr>
                <td><?= $item['nome'] ?></td>
                <td><?= $item['telefone'] ?></td>
                <td><?= $item['email'] ?></td>
                <td class="acoes">
                  <a onclick="return confirm('Deseja realmente excluir o contato: <?= $item['nome'] ?>')" href="../router.php?component=usuarios&action=deletar&id=<?= $item['id'] ?>">
                    <i class="fa-solid fa-trash-can" title="Excluir"></i>
                  </a>
                  <a href="router.php?component=usuarios&action=buscar&id=<?= $item['id'] ?>">
                    <i class="fa-solid fa-pen-to-square" title="Editar"></i>
                  </a>
                  <i class="fa-solid fa-eye" title="Visualizar"></i>
                </td>
              </tr>
          <?php
            }
          }
          ?>
        </tbody>
      </table>
      <!-- // Table Users -->
    </div>

  </section>
  <!-- // Content Area -->

  <!-- Footer -->
  <footer>
    <div class="footer-content container">
      <!-- Content align center -->
      <div class="footer-content-center">
        <span>&copy;Copyright 2022</span>
        <span>Todos os direitos reservados -
          <a href="">Política de Privacidade</a></span>
      </div>
      <!-- // Content align center -->

      <!-- Content align right -->
      <div class="footer-content-right">
        <span>Desenvolvido por Thales Santos</span>
        <span>versão 1.0.0</span>
      </div>
      <!-- // Content align right -->
    </div>
  </footer>
  <!-- Footer -->
</body>

</html>