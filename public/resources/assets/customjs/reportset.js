$(document).ready(function() {
    
    function excludedata(keyname,array){
        var exclusive = array;
        var check = 0;
        var i = 0;
        while( check == 0 && i<exclusive.length){
            if(exclusive[i] == keyname){
                check = 1;
            };
            i++;
        };
        if(check != 0){
            return true;
        }else{
            return false;
        };
    }
    
    function transreadable(str){
        str = str.replace("fc_","");
        str = str.replace('_',' ');
        str = str.replace('_',' ');
        return str;
    }
    
    
    $('#upfile').on('click', function(e) {
        e.preventDefault();
        $('#uploadmodal').modal('show');
        // alert("Deleted! Do not forget to do some ajax to sync with backend :)");
    });


    $("a[name='code']").on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('value');
        console.log(id);
        $.ajax({
            url: "../ajax-loadcode",
            async: false,
            type: "POST",
            beforeSend: function(xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {
                codeid: id
            },
            success: function(data) {
                $('#codebody').html("<textarea type='text' id='codebox' name='" + id + "' placeholder='Type your code here'>" + data + "</textarea>");

                $('#codemodal').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Something went wrong " + errorThrown);
            },
        });
    });


    $('#codesave').on('click', function(e) {
        e.preventDefault();
        var newcode = $('#codebox').val();
        var id = $('#codebox').attr('name');
        console.log(newcode);
        console.log(id);
        var passdata = [id, newcode];
        $.ajax({
            url: "../ajax-savecode",
            async: false,
            type: "POST",
            beforeSend: function(xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {
                scode: passdata
            },
            success: function(data) {
                console.log(data);
                $('#codemodal').modal('hide');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Something went wrong " + errorThrown);
            },
        });
    });

    $('#print').on('click', function(e) {
        e.preventDefault();
        var i = 0;
        $('tbody').find('tr').each(function() {
            if ($(this).find('input').is(':checked')) {
                i++;
                var id = $(this).find('input').val();
                window.open("./print=" + id);
            };
        });
        if (i == 0) {
            alert('No report is selected');
        }
    });

    $("#checkall").on('ifClicked', function() {
        console.log('a');
        $('input:checkbox').not(this).iCheck('toggle');
    });



});