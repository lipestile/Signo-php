<?php include('layouts/header.php'); ?>
<div class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
  <div class="card shadow p-4" style="width: 100%; max-width: 500px;">
    <h1 class="text-center mb-4 text-primary">Descubra seu Signo</h1>
    <form method="POST" action="show_zodiac_sign.php">
      <div class="mb-3">
        <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" required>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Consultar Signo</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>
