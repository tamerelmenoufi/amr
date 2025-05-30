<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/lib/includes.php");
?>

<div class="d-flex flex-row-reverse">
    <button onclick="enviaAcao<?=$md5?>(this)" acao="clientes/lista" type="button" class="btn btn-success">New</button>
</div>
<p>Aqui é o formulário de clientes</p>

<script>
    function enviarAcao<?=$md5?>(elemento) {
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
            document.querySelector('.corpo').innerHTML = data;
        })
        .catch(error => {
            console.error("Erro no envio:", error);
        });
    }
</script>