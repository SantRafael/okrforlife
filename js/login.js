$(document).ready(($)=>{
    $('#eye-open').click(function(e){
        $('#senha').prop('type', 'text');
        $('#eye-open').addClass('invisible');
        $('#eye-close').removeClass('invisible');
    })

    $('#eye-close').click(function(e){
        $('#senha').prop('type', 'password');
        $('#eye-close').addClass('invisible');
        $('#eye-open').removeClass('invisible');
    })

    $('#n-eye-open').click(function(e){
        $('#novaSenha').prop('type', 'text');
        $('#n-eye-open').addClass('invisible');
        $('#n-eye-close').removeClass('invisible');
    })

    $('#n-eye-close').click(function(e){
        $('#novaSenha').prop('type', 'password');
        $('#n-eye-close').addClass('invisible');
        $('#n-eye-open').removeClass('invisible');
    })

    $("#mostraLogin").click(  function(){
        $(".cadastro").attr('style', 'display: none');
        $(".login").removeAttr('style');
        $("#mostraCadastro").removeClass('active');
        $("#mostraLogin").addClass('active');
    })  

    $("#mostraCadastro").click(  function(){
        $(".login").attr('style', 'display: none');
        $(".cadastro").removeAttr('style');
        $("#mostraLogin").removeClass('active');
        $("#mostraCadastro").addClass('active');
    })     

    $("#btnLogin").click(  function(e){
        e.preventDefault();
        $('#no-register').addClass('invisible');

        let email = $('#email').val(),
            senha = $('#senha').val();

        if(email == '' || senha == ''){
            $('#no-register').removeClass('invisible');
            $('#textoErro').html('Preencha todos os campos');
            return false;
        }
            

        $.ajax({
            type: 'POST',
            url: 'services/login.php',
            data: 'operacao=login&email='+email+'&senha='+senha,
            dataType: 'text',
            success: result => {
                if(result.trim() == 'ok')
                    window.location.href = "forms/principal.php";
                else{
                    $('#no-register').removeClass('invisible');
                    $('#textoErro').html(result);
                }
            }

        });
    })

    $("#btnCadastro").click(  function(e){
        e.preventDefault();
        $('#no-register').addClass('invisible');
        
        let nome  = $('#nome').val(),
            email = $('#novoEmail').val(),
            senha = $('#novaSenha').val();

        if(nome == '' || email == '' || senha == ''){
            $('#no-register').removeClass('invisible');
            $('#textoErro').html('Preencha todos os campos');
            return false;
        }            

        $.ajax({
            type: 'POST',
            url: 'services/login.php',
            data: 'operacao=cadastro&nome='+nome+'&email='+email+'&senha='+senha,
            dataType: 'text',
            success: result => {
                $('#success-register').removeClass('invisible');
            }

        });
    })    
});