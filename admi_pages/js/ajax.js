var doc = $("p#doc") ;
doc.hide() ;

$("#form").submit(function (event) {
    var message = $("input[name=rep]").val() ;
    console.log(message);
    result = $("#result") ;
    $.ajax({
        type : 'POST' ,
        url : 'http://localhost/Ajax/php/doc.php' ,
        data : {message: message} ,
        dataType : 'html' ,
        timeout : 100 ,
        success : function (response) {
            result.text(response) ;
            //doc.show().htm(data) ;
            //alert("success") ;
        },
        error : function () {
            result.text("Erreur d'éxécution de la requette !") ;
            doc.show() ;
        }
    });
    event.preventDefault() ;
}) ;
