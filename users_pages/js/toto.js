$(function (){
    $("#valider").click( function () {
        var selected = $("#selected").val();
        var result = $("#result");
        if(selected != ""){
            $.ajax({
                url: "php/selection.php",
                method: "POST",
                data: {selected : selected },

                success: function (data) {
                    result.html(data);
                    $("#tableau_result").DataTable();
                },
                
                error: function() {
                    alert("Oups !!!!")
                }
            })
        }
    })
})