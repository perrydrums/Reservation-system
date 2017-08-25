$("#selectDatumG").change(function(){
    if($(this).val() != "Selecteer datum"){
        $("#selectTijdG").show();

        var e = document.getElementById("selectDatumG");
        var chosen = e.options[e.selectedIndex].value;
        if (chosen != 'Selecteer datum') {


            $.ajax({
                dataType: "json",
                url: "getafspraken.php?datumG=" + chosen,
                context: document.body
            }).done(function () {
                $(this).addClass("done");

                $.getJSON("getafspraken.php?datumG=" + chosen, function (data) {
                    var html = '';
                    html += '<option selected disabled value="Selecteer tijd">Selecteer tijd</option>';
                    $.each(data, function (key, value) {
                        html += '<option value="' + value.time + '">' + value.time + '</option>';
                    });
                    $('#selectTijdG').html(html);
                });
            });
        }

    }else{
        $("#selectTijdG").hide();
    }
});
