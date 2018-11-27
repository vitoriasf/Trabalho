<?php
  require_once('config/config.php');
  require_once('class/AlunoDAO.php');
  require_once('class/SeminarioDAO.php');

  require('action/verifica.sessao.php');
  $pageTitle = 'Home';
  require('header.php');
?>
  <body>  
  <?php require('navigation.php'); ?>


    <!-- Page Content -->
    <div class="container">
      <div class="row my-5">
        <div class="col-lg-12">
          <form action="action/seminario.gravar.php" method="post">
            <div class="form-group">
              <label for="campoNome">Nome do Aluno</label>
              <select id="campoNome" class="custom-select" name="aluno_id">
                <?php
                  $alunodao = new AlunoDAO();
                  $alunos = $alunodao->listarAlunos();
                ?>
                <?php foreach($alunos as $aluno): ?>
                <option value="<?= $aluno->id ?>"><?= $aluno->nome ?></option>
                <?php endforeach; ?>
                
              </select>
            </div>
            <div class="form-group">
              <label for="campoTema">Tema</label>
              <input type="text" class="form-control" id="campoTema" placeholder="Ex.: Arte Contemporânea" name="tema">
            </div>
            <div class="form-group">
              <label for="campoData">Data</label>
              <input type="date" class="form-control text-center" id="campoData" name="data">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </form>          
        </div>
      </div>
      <div class="row my-3">
        <div class="col-lg-12 text-center">
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Aluno</th>
                <th scope="col">Tema</th>
                <th scope="col">Data</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $seminarioDAO = new SeminarioDAO();

              $seminarios = $seminarioDAO->listarSeminarios();
              foreach($seminarios as $seminario) :
              ?>
              <tr>
                <th scope="row"><?= $seminario->id ?></th>
                <td><?= $seminario->nome ?></td>
                <td><?= $seminario->tema ?></td>
                <td><?= $seminario->data ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>      
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
