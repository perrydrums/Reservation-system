//Group lessons form

$('form.groupFormAjax').on('submit', function(){

    var that = $(this),
        url = that.attr('action'),
        method = that.attr('method'),
        data = {};

    that.find('[name]').each(function(index, value){
        var that = $(this),
            name = that.attr('name'),
            value = that.val();

        data[name] = value;

        if($(this).is(':radio')) {
            data[name] = $('[name=' + name + ']:checked').val();
        }
    });

    $.ajax({
        url: url,
        type: method,
        data: data,
        success: function(response){


            var values = {};
            $.each($('#groupForm').serializeArray(), function(i, field) {
                values[field.name] = field.value;
            });

            var firstName = values['firstName'];
            var lastName = values['lastName'];
            var email = values['email'];
            var tel = values['tel'];
            var age = values['age'];
            var gender = values['gender'];
            var date = values['date'];
            var time = values['time'];
            $(".confirmMessage").html("Naam: "+firstName+" "+lastName+
                                        "<br>Email: "+email+
                                        "<br>Telefoonnummer: "+tel+
                                        "<br>Leeftijd: "+age+
                                        "<br>Geslacht: "+gender+
                                        "<br>Tijd: "+date+" om "+time+" uur.");

            //Hide form, show confirmation message
            document.getElementById('groupFormDiv').style.display = "none";
            document.getElementById('groupFormSuccess').style.display = "block";
        }
    });

    return false;
});



//Private lessons form

$('form.privateFormAjax').on('submit', function(){

    var that = $(this),
        url = that.attr('action'),
        method = that.attr('method'),
        data = {};

    that.find('[name]').each(function(index, value){
        var that = $(this),
            name = that.attr('name'),
            value = that.val();

        data[name] = value;
    });

    $.ajax({
        url: url,
        type: method,
        data: data,
        success: function(response){

            var values = {};
            $.each($('#privateForm').serializeArray(), function(i, field) {
                values[field.name] = field.value;
            });

            var firstName = values['firstName'];
            var lastName = values['lastName'];
            var email = values['email'];
            var tel = values['tel'];
            var age = values['age'];
            var gender = values['gender'];
            var date = values['date'];
            var time = values['time'];

            $(".confirmMessage").html("Naam: "+firstName+" "+lastName+
                "<br>Email: "+email+
                "<br>Telefoonnummer: "+tel+
                "<br>Leeftijd: "+age+
                "<br>Geslacht: "+gender+
                "<br>Datum: "+date+" om "+time+" uur.");

            //Hide form, show confirmation message
            document.getElementById('privateFormDiv').style.display = "none";
            document.getElementById('privateFormSuccess').style.display = "block";
        }
    });

    return false;
});
