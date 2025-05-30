<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/lib/includes.php");

    echo "{$_SERVER['DOCUMENT_ROOT']}/lib/includes.php";
?>

<div class="d-flex flex-row-reverse">
    <button onclick="enviaAcao<?=$md5?>(this)" acao="clientes/lista" type="button" class="btn btn-success">New</button>
</div>
<p>Aqui é o formulário de clientes</p>

<div class="m-1">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" aria-describedby="Name">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone/WhatsApp</label>
    <input type="text" class="form-control" id="phone">
  </div>
  <button onclick="enviaAcao<?=$md5?>(this)" type="button" class="btn btn-primary">Send</button>
</div>


<script>
    function enviaAcao<?=$md5?>(elemento) {
        // Lê o valor do atributo personalizado "acao"
        const nome = elemento.getElmentById('nome');
        const phone = elemento.getElmentById('phone');
        // Envia via POST usando fetch
        fetch(`lista.php`, {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded" // ou "application/json"
        },
        body: `nome=${encodeURIComponent(acao)}&phone=${encodeURIComponent(phone)}&acao=salvar`
        })
        .then(response => response.text())
        .then(data => {
            document.querySelector('.corpo').innerHTML = data;
        })
        .catch(error => {
            console.error("Erro no envio:", error);
        });
    }
</script>