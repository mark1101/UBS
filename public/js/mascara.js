$(function () {

    $('.cpf').mask('000.000.000-00');
    $('.telefone').mask('(00) 0 0000-0000');
    $('.data').mask('00/00/0000');
    $('.sus').mask('000 0000 0000 0000');
    $('.idade').mask('000');
    $('.peso').mask('0,00');
    $('.altura').mask('0,00');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
