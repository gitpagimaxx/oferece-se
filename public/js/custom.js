var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

function copyFunction(url) {
    var copyText = url;
    let input = document.createElement('input');
    input.setAttribute('type', 'text');
    input.value = copyText;
    document.body.appendChild(input);
    input.select();
    document.execCommand("copy");
    document.body.removeChild(input)
}

function clearFilter() {
    document.getElementById('buscar').value = '';
}

$(function() {
    $('#Telefone').inputmask('(99) 99999-9999');
    $('#CEP').inputmask('99999-999');

    $('#CEP').on('blur', function() {
        var cep = $(this).val().replace('-', '');
        if (cep.length == 8) {
            $.get('https://viacep.com.br/ws/' + cep + '/json/', function(data) {
                $('#Endereco').val(data.logradouro);
                $('#Bairro').val(data.bairro);
                $('#Cidade').val(data.localidade);
                $('#Estado').val(data.uf);
            });
        }

        $('#Numero').focus();
    });

});