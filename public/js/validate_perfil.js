$(document).ready(function () {
    $("#info").submit(function () {
        if (!$("#verificar").is(':checked')) {
            alert('É nessessario aceitar os termos para usar o forum');
            return false;
        }
    });
});

function excluir(value) {
    alert('Aqui vai ter verificação de usuario para deletar algo, futuramente');
    $('#exclui_id').val(value);
    $('#form-sbmt').submit();
}