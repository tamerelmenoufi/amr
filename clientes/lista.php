<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/amr/lib/includes.php");

    if($_POST['acao'] == 'salvar'){
        print_r($_POST);
    }

    $query = "SELECT *, dados->>'$.message_type' as tipo, dados->>'$.message_body' as mensagem FROM `logs_wapp` where dados->>'$.message_type' in ('text', 'image') and dados->>'$.chat_type' = 'group'";
    $result = mysqli_query($con, $query);
    
?>

<div class="d-flex flex-row-reverse">
    <button onclick="enviaAcao<?=$md5?>(this)" data-acao="clientes/form" type="button" class="btn btn-success">New</button>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>tipo</th>
            <th>Mensagem</th>
        </tr>
    </thead>
    <tbody>
<?php
while($d = mysqli_fetch_object($result)){

    if($d->tipo == 'image'){
        $arq = base64_decode($d->mensagem);
        $arq = str_replace('+', ' ', $arq);
        $mensagem = base64_encode($arq);
    }else{
        $mensagem = $d->mensagem;
    }
?>
        <tr>
            <td><?=$d->codigo?></td>
            <td><?=$d->tipo?></td>
            <td><?=(($d->tipo == 'image') ? "<img src='data:image/jpeg;base64,{$mensagem}' />" : $mensagem)?></td>
        </tr>
<?php
    ///////////////////////
}

?>
    </tbody>
</table>


<script>
    function enviaAcao<?=$md5?>(elemento) {
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