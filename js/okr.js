$( document ).ready(function() {
    $("#mostraObjetivo").click(  function(){
        $("#grupoResultadoChave").attr('style', 'display: none');
        $("#grupoObjetivo").removeAttr('style');
        $("#mostraResultadoChave").removeClass('active');
        $("#mostraObjetivo").addClass('active');
    })  

    $("#mostraResultadoChave").click(  function(){
        $("#grupoObjetivo").attr('style', 'display: none');
        $("#grupoResultadoChave").removeAttr('style');
        $("#mostraObjetivo").removeClass('active');
        $("#mostraResultadoChave").addClass('active');
    })  
    
    $("#salvarOkr").click(  function(e){
        e.preventDefault();

        let form = $("#formOkr").serialize();

        $.ajax({
            type: 'POST',
            url: '../services/okr.php',
            data: form+'&operacao=criar',
            dataType: 'html',
            success: result => {
                $("#notes").html(result)
            }

        });
    }) 
    
    function getstickNotes(){
        $.ajax({
            type: 'POST',
            url: '../services/okr.php',
            data: 'operacao=selecionar',
            dataType: 'html',
            success: result => {
                $("#notes").html(result)
            }

        });
    }
    
    getstickNotes();
});