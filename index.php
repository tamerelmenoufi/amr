<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/lib/includes.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABU AMR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Abu Amr</span>
    </div>
    </nav>

    <div class="m-3">
        <div class="row">
            <div class="col-2">
                <h3>Menu</h3>
                <ul class="list-group">
                    <li class="list-group-item" data-acao="clientes">Client</li>
                    <li class="list-group-item" data-acao="mensagem">Message</li>
                    <li class="list-group-item" data-acao="envios">Send WhatsApp</li>
                </ul>
            </div>
            <div class="col-10 corpo">Corpo do projeto, com novas atualizações</div>
        </div>
    </div>
</body>
</html>
<script>
    function enviarAcao(elemento) {
    // Lê o valor do atributo personalizado "acao"
    const acao = elemento.dataset.acao;

    // Envia via POST usando fetch
    fetch(`${acao}.php`, {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded" // ou "application/json"
      },
      body: `acao=${encodeURIComponent(acao)}`
    })
    .then(response => response.text())
    .then(data => {
      document.getElementById("resultado").innerHTML = data;
    })
    .catch(error => {
      console.error("Erro no envio:", error);
    });
  }
</script>