   $('#upfile').on('click', function (e) {
            e.preventDefault();
            if (confirm("Upload a new .csv file will overwrite all the exist data, do you want to continue? ") == false) {
                return;
            }else{
                $('#uploadmodal').modal('show');
            };
            
            // alert("Deleted! Do not forget to do some ajax to sync with backend :)");
        });


   $("a[name='code']").on('click', function (e) {
       e.preventDefault();
        var id = $(this).attr('value');
        console.log(id);
          $.ajax({ 
                 url: "../ajax-loadcode", 
                 async:false, 
                 type: "POST", 
                 beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
                 data: { codeid: id} , 
                 success: function(data) {
                     $('#codebody').html("<textarea type='text' id='codebox' name='" + id + "' placeholder='Type your code here'>" + data +"</textarea>");
                     
                     $('#codemodal').modal('show');
                    }, 
                 error: function (jqXHR, textStatus, errorThrown){console.log("Something went wrong " + errorThrown);}, 
                });
   });

    
    $('#codesave').on('click', function (e) {
        e.preventDefault();
        var newcode = $('#codebox').val();
        var id = $('#codebox').attr('name');
        console.log(newcode);
        console.log(id);
        var passdata=[id,newcode];
        $.ajax({ 
                 url: "../ajax-savecode", 
                 async:false, 
                 type: "POST", 
                 beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
                 data: { scode: passdata} , 
                 success: function(data) {
                     console.log(data);
                     $('#codemodal').modal('hide');
                    }, 
                 error: function (jqXHR, textStatus, errorThrown){console.log("Something went wrong " + errorThrown);}, 
                });
    });