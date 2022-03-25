$(document).ready(function () {
    if (/alterar/.test(document.baseURI)) {
        $('form').attr('action','cadastrar.php?form=alterar1')
        var url=document.baseURI.replace('http://localhost/crud_conteiner/cadastro.php?alterar=','')
        $.ajax({
            url: 'pesquisa.php',
            type: 'post',
            dataype: 'text',
            data: { id:  url},
        }).done(function (data) {
            console.log(data)
            $('[name=numconteiner]').val(data[0].cd_conteiner)
            $('[name=cliente]').val(data[0].nm_cliente)
            $('#tp_'+data[0].tp_conteiner).attr('checked',true)
            $('#st_'+data[0].tp_status).attr('checked',true)
            $('#ct_'+data[0].tp_categoria).attr('checked',true)
        }).fail(function (data) {
            console.log(data);
        })
    }
})
$('[name=realizamov]').on('click',function(){
    if($(this)[0].children[0].innerText=='sim'){
        $('form').attr('action','cadastrar.php?form=alterar1')
    }
    else{
        $('form').attr('action','cadastrar.php?form=alterar')
    }
})
$('[name=numconteiner]').on('input', function () {
    let letra = $(this).val().slice(0, 4).replace(/\d/g, '')
    let num = $(this).val().slice(4, 11).replace(/[a-z]/gi, '')
    $(this).val(letra + num)
})
$('[name=cliente]').on('input', function () {
    $(this).val($(this).val().replace(/\d/g, ''))
})
$('.conteiners').on('click', function () {
    window.location.href = "./cadastro.php?alterar=" + $(this)[0].children[0].innerText
})
$('#delete').on('click', function () {
    window.location.href = "./cadastrar.php?form=deletar"
    $.ajax({
        url: 'cadastrar.php?form=deletar',
        type: 'post',
        dataype: 'text',
        data: { numconteiner:  $('[name=numconteiner]').val()},
    }).done(function (data) {
    }).fail(function (data) {
        console.log(data);
    })
    window.location.href = "./index.php"
})