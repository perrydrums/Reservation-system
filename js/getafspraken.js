$("#selectDatum").change(function(){
    if($(this).val() != "Selecteer datum"){
        $("#selectTijd").show();

        var e = document.getElementById("selectDatum");
        var chosen = e.options[e.selectedIndex].value;
        if (chosen != 'Selecteer datum') {


            $.ajax({
                dataType: "json",
                url: "getafspraken.php?datum=" + chosen,
                context: document.body
            }).done(function () {
                $(this).addClass("done");

                $.getJSON("getafspraken.php?datum=" + chosen, function (data) {
                    var html = '';
                    html += '<option selected disabled value="Selecteer tijd">Selecteer tijd</option>';
                    $.each(data, function (key, value) {

                        html += '<option value="' + value.time + '">' + value.time + '</option>';
                    });
                    $('#selectTijd').html(html);
                });
            });
        }

    }else{
        $("#selectTijd").hide();
    }
});

