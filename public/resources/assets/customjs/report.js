function authProcess(result) {
    var datapack = [];
    datapack[0] = result;
    datapack[1] = hash;
    $.ajax({
        url: "../ajax-reportauth",
        async: false,
        type: "POST",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
            fingerprint: datapack
        },
        success: function (data) {

            if (data[0] == 1) {
                //console.log('aha! company:' + data[1] + ' user' + data[2]);
                dataLayer.push({
                    'event': 'authEvent',
                    'authCompany': 'authcompany',
                    'authCompanyAction': 'pass',
                    'authCompanyid': data[1],
                    'authUser': 'authuser',
                    'authUserAction': 'pass',
                    'authUserid': data[2]
                });
                $('#authcover').fadeOut();
                contactPop();
            } else {
                $('#verifyModal').modal('show');
            };
        },
        error: function (jqXHR, textStatus, errorThrown) {
            //console.log("Something went wrong " + errorThrown);
        },
    });
};

function sendMail(dataBag) {
    dataBag = JSON.stringify(dataBag);
    $.ajax({
        url: "../ajax-sendmail",
        async: false,
        type: "POST",
        dataType:"JSON",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
            indata: dataBag
        },
        success: function (data) {
            //console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            //console.log("Something went wrong " + errorThrown);
        },
    });

};

function sendMail2(id, msg, sender) {
    var passdata = {};
    passdata.id = id;
    passdata.msg = msg;
    passdata.hash = hash;
    passdata.sender = sender;
    passdata = JSON.stringify(passdata);
    //console.log(passdata);
    $.ajax({
        url: "../ajax-sendmail2",
        async: false,
        type: "POST",
        dataType:"JSON",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
            getdata: passdata
        },
        success: function (data) {
//            console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
//            console.log("Something went wrong " + errorThrown);
        },
    });

};

function countdowntimer() {
    var i = 3;
    setInterval(function () {
        $('#countdown').html(i);
        i -= 1;
        var i = i <= 0 ? 0 : i - 1;
    }, 1000)
}

//form validation function

function formValidate(form) {
    //console.log('running validation');
    var checker = true;
    var alertMessage = '';
    form.find('input').each(function () {
        ////console.log('find one field');
        if ($(this).prop('required') || $(this).data('required')) {
            ////console.log('checking if it is required');
            if ($(this).val().length <= 0) {
                $(this).addClass('error-input');
                $(this).attr('placeholder', 'Required');
                alertMessage += "<li>Required field is missing.</li>";
                checker = false;
            } else if ($(this).attr('type') == 'email' || $(this).data('email')) {
                ////console.log('looks like it is email');
                var email = $(this).val();
                if (email.indexOf('@') == -1 || email.indexOf('.') == -1) {
                    $(this).addClass('error-input');
                    $(this).attr('placeholder', 'Required');
                    alertMessage += "<li>Please check if the email is formatted correctly.</li>";
                    //console.log('error');
                    checker = false;
                }
            }
        }
    });
    if (alertMessage.length > 0) {
        form.find('.alert').show();
        form.find('ul').html(alertMessage);
    } else {
        form.find('.alert').hide();
    }
    //console.log(checker);
    return checker;
}

function contactForm(){
    $('#contactModal').modal('show');
    //console.log('yeah');
}

function contactPop(){
    setTimeout(contactForm,20000);
}

$('input').focusin(function () {
    if ($(this).hasClass('error-input')) {
        $(this).attr('placeholder', '');
        $(this).removeClass('error-input');
    }
});

//main code

var isMobile = false; //initiate as false
// device detection
if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) isMobile = true;

$('#therank').popover({html:true});

if (isMobile) {
    //console.log('im mobile hahahahahaha');
    $('#verifyModal').modal('show');
} else {
    new Fingerprint2().get(function (result) {
        authProcess(result);
    });
};

$("input[name='verify']").on('click', function (e) {
    e.preventDefault();
    var email = $('#verify_email').val();
    //console.log(email);
    $.ajax({
        url: "../ajax-reportauthemail",
        async: false,
        type: "POST",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
            email: email
        },
        success: function (data) {

            if (data[0] == 1 && data[1] == c_id) {
                //console.log('aha! company:' + data[1] + ' user' + data[2]);
                dataLayer.push({
                    'event': 'authEvent',
                    'authCompany': 'authcompany',
                    'authCompanyAction': 'pass',
                    'authCompanyid': data[1],
                    'authUser': 'authuser',
                    'authUserAction': 'pass',
                    'authUserid': data[2]
                });
                $('#authcover').fadeOut();
                contactPop();
                $('#verifyModal').modal('hide');
            } else {
                $('#verifyalert').html("Sorry, we didn't find your email in our system. Try another email, or <a id='newuser'>get access as a new user</a>");
                //console.log('wrong');
            };
        },
        error: function (jqXHR, textStatus, errorThrown) {
            //console.log("Something went wrong " + errorThrown);
        },
    });

});


$('#newuser').live('click', function (e) {
    e.preventDefault();
    $('#verifyModal').modal('hide');
    $('#newModal').modal('show');
});


$("input[name='newsubmit']").on('click', function (e) {
    e.preventDefault();
    var thisForm = $("input[name='newsubmit']").parent().parent('form');
    if (!formValidate(thisForm)) {
        //console.log('will quite');
        return;
    }
    var userdata = [];
    userdata[0] = '';
    userdata[1] = $("input[name='new_name']").val();
    userdata[2] = $("input[name='new_title']").val();
    userdata[3] = $("input[name='new_email']").val();
    userdata[4] = c_id;
    userdata[5] = c_name;
    userdata[6] = 'no';
    //console.log(c_id + c_name);
    $.ajax({
        url: "../ajax-insertuser",
        async: false,
        type: "POST",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
            userdata: userdata
        },
        success: function (data) {
            //console.log(data);
            if (data != "duplicate") {
                $('#newModal').modal('hide');
                $('#doneModal').modal('show');
                if (c_account != null) {
                    //console.log('it has account manager! email is sent!');
                    $.ajax({
                        url: "../ajax-active",
                        async: false,
                        type: "POST",
                        beforeSend: function (xhr) {
                            var token = $('meta[name="csrf_token"]').attr('content');

                            if (token) {
                                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                        },
                        data: {
                            uid: data
                        },
                        success: function (output) {
                            //console.log(output);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            //console.log("Something went wrong " + errorThrown);
                        }
                    });
                    var emailData = {};
                    emailData.id = data;
                    emailData.account = c_account;
                    sendMail(emailData);
                } else {
                    //console.log('oh,poor kid, not one cares this account!');
                };
                countdowntimer();
                setTimeout(function(){ window.location = "http://www.ipullrank.com/vector-report";}, 3000);
            } else {
                thisForm.find('.alert').show();
                thisForm.find('ul').html('<li>This email already exists.</li>');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            //console.log("Something went wrong " + errorThrown);
        },
    });


});

$("input[name='newback']").on('click',function(e){
    e.preventDefault();
        $('#verifyModal').modal('show');
    $('#newModal').modal('hide');
});

$("input[name='submitinvite']").on('click', function (e) {
    e.preventDefault();
    var thisForm = $("input[name='submitinvite']").parent().parent('form');
    //console.log(formValidate(thisForm));
    if (!formValidate(thisForm)) {
        //console.log('will quite');
        return;
    }
    var userdata = [];
    userdata[0] = '';
    userdata[1] = $("input[name='invite_name']").val();
    userdata[2] = $("input[name='invite_title']").val();
    userdata[3] = $("input[name='invite_email']").val();
    userdata[4] = c_id;
    userdata[5] = c_name;
    userdata[6] = 'no';
    var msg = $("#invite_msg").val();
    //console.log(c_id + c_name);
    $.ajax({
        url: "../ajax-insertuser",
        async: false,
        type: "POST",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
            userdata: userdata
        },
        success: function (data) {
            if (data != "duplicate") {
                //console.log(data);
                dataLayer.push({
                    'event': 'inviteEvent',
                    'authCompanyid': c_id
                    });
                $('#inviteModal').modal('hide');
                $('#inviteConfirm').modal('show');
                setTimeout(function () {
                    $('#inviteConfirm').modal('hide');
                }, 2000);
                thisForm.find('.alert').hide();
                thisForm.find('input').each(function () {
                    if ($(this).attr('type') != 'submit') {
                        $(this).val('');
                    }
                });
                if (c_account != null) {
                    //console.log('it has account manager! email is sent!');
                    $.ajax({
                        url: "../ajax-active",
                        async: false,
                        type: "POST",
                        beforeSend: function (xhr) {
                            var token = $('meta[name="csrf_token"]').attr('content');

                            if (token) {
                                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                        },
                        data: {
                            uid: data
                        },
                        success: function (output) {
                            //console.log(output);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            //console.log("Something went wrong " + errorThrown);
                        }
                    });
                    sendMail2(data, msg, c_account);
                } else {
                    //console.log('oh,poor kid, not one cares this account!');
                };
            } else {
                thisForm.find('.alert').show();
                thisForm.find('ul').html('<li>This email already exiest.</li>');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            //console.log("Something went wrong " + errorThrown);
        },
    });


});

$('.insightlyForm').submit(function(e){
    //console.log('form go!');
    $('#contactModal').modal('hide');
                    dataLayer.push({
                    'event': 'contactTrackB',
                    'authCompanyid': c_id
                    });
});
