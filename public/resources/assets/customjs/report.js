function authProcess(result){
    var datapack = [];
    datapack[0] = result;
    datapack[1] = hash;
    $.ajax({ 
                 url: "../ajax-reportauth", 
                 async:false, 
                 type: "POST", 
                 beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
                 data: { fingerprint: datapack} , 
                 success: function(data) {
                    
                     if(data == 1){
                         console.log('aha!');
                         $('#authcover').fadeOut();
                     }else{
                     $('#verifyModal').modal('show');
                     };}, 
                 error: function (jqXHR, textStatus, errorThrown){console.log("Something went wrong " + errorThrown);}, 
                });
};

function sendMail(id){
    $.ajax({ 
                 url: "../ajax-sendmail", 
                 async:false, 
                 type: "POST", 
                 beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
                 data: { userid: id} , 
                 success: function(data) {
                        console.log(data);
                    }, 
                 error: function (jqXHR, textStatus, errorThrown){console.log("Something went wrong " + errorThrown);}, 
                });
    
};

function sendMail2(id,msg){
    var passdata=[];
    passdata[0] = id;
    passdata[1] = msg;
    passdata[2] = hash;
    $.ajax({ 
                 url: "../ajax-sendmail2", 
                 async:false, 
                 type: "POST", 
                 beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
                 data: { getdata: passdata} , 
                 success: function(data) {
                        console.log(data);
                    }, 
                 error: function (jqXHR, textStatus, errorThrown){console.log("Something went wrong " + errorThrown);}, 
                });
    
};

function countdowntimer(){
    var i = 3;
    setInterval(function(){
        $('#countdown').html(i);
        i-=1;
    },1000)
}


new Fingerprint2().get(function(result){
  authProcess(result);
});

$("input[name='verify']").on('click', function (e) {
    e.preventDefault();
    var email = $('#verify_email').val();
    console.log(email);
    $.ajax({ 
                 url: "../ajax-reportauthemail", 
                 async:false, 
                 type: "POST", 
                 beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
                 data: { email: email} , 
                 success: function(data) {
                    
                     if(data == 1){
                         console.log('aha!');
                         $('#authcover').fadeOut();
                         $('#verifyModal').modal('hide');
                     }else{
                     $('#verifyalert').html("Sorry, we didn't find your email in our system. Try another email or <a id='newuser'>get access as a new user</a>");
                    console.log('wrong');     
                     };}, 
                 error: function (jqXHR, textStatus, errorThrown){console.log("Something went wrong " + errorThrown);}, 
                });
    
});


$('#newuser').live('click',function(e){
    e.preventDefault();
    $('#verifyModal').modal('hide');
    $('#newModal').modal('show');
});


$("input[name='newsubmit']").on('click', function (e) {
    e.preventDefault();
    var userdata = [];
    userdata[0] = '';
    userdata[1] = $("input[name='new_name']").val();
    userdata[2] = $("input[name='new_title']").val();
    userdata[3] = $("input[name='new_email']").val();
    userdata[4] = c_id;
    userdata[5] = c_name;
    console.log(c_id + c_name);
    $.ajax({ 
                 url: "../ajax-insertuser", 
                 async:false, 
                 type: "POST", 
                 beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
                 data: { userdata: userdata} , 
                 success: function(data) {
                    console.log(data);
                     $('#newModal').modal('hide');
                     $('#doneModal').modal('show');
                     sendMail(data);
                     countdowntimer();
                     setTimeout(function(){ window.location = "http://www.ipullrank.com";}, 3000);
                     }, 
                 error: function (jqXHR, textStatus, errorThrown){console.log("Something went wrong " + errorThrown);}, 
                });
    

});


$("input[name='submitinvite']").on('click', function (e) {
    e.preventDefault();
    var userdata = [];
    userdata[0] = '';
    userdata[1] = $("input[name='invite_name']").val();
    userdata[2] = $("input[name='invite_title']").val();
    userdata[3] = $("input[name='invite_email']").val();
    userdata[4] = c_id;
    userdata[5] = c_name;
    var msg = $("#invite_msg").val();
    console.log(c_id + c_name);
    $.ajax({ 
                 url: "../ajax-insertuser", 
                 async:false, 
                 type: "POST", 
                 beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
                 data: { userdata: userdata} , 
                 success: function(data) {
                    console.log(data);
                     $('#inviteModal').modal('hide');
                     sendMail2(data,msg);
                     }, 
                 error: function (jqXHR, textStatus, errorThrown){console.log("Something went wrong " + errorThrown);}, 
                });
    

});


