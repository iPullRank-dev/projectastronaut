$(function () {
    
    var currentEmailUser;
    
    function activesingle(data) {
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
}
    
    function activeIndicatorCss() {
    $('#table-editable2').find('.active-indicator').each(function () {
        if ($(this).html() == 1) {
            $(this).removeClass('active-ina');
            $(this).addClass('acitve-a');
        } else {
            $(this).removeClass('acitve-a');
            $(this).addClass('active-ina');
        }
    });
    }
    
    function activeUsers(companyid) {
    $.ajax({
        url: "../ajax-activemulti",
        async: false,
        type: "POST",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
            indata: companyid
        },
        success: function (data) {
            //console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            //console.log("Something went wrong " + errorThrown);
        },
    });
}
    
    function editableTable() {

        var tempSaver = null;

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }
            oTable.fnDraw();
        }

        function editRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            var pick = unpackimg(aData[0]);
            tempSaver = aData[3];
            jqTds[0].innerHTML = '<input type="text" class="form-control small" value="' + pick + '">';
            jqTds[1].innerHTML = '<input type="text" class="form-control small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input type="text" class="form-control small" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<input type="text" class="form-control small" value="' + aData[3] + '">';
            jqTds[4].innerHTML = '<input type="text" class="form-control small" value="' + aData[4] + '" readonly>';
            jqTds[5].innerHTML = '<div class="text-right"><a class="edit btn btn-sm btn-success" href="">Save</a> <a class="cancel btn btn-sm btn-default" href="">Cancel</a> <a class="delete btn btn-sm btn-danger" href=""><i class="icons-office-52"></i></a></div>';
        }


        function editRownew(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input type="text" class="form-control small" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="text" class="form-control small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input type="text" class="form-control small" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<input type="text" class="form-control small" value="' + aData[3] + '">';
            jqTds[4].innerHTML = '<input type="text" class="form-control small" value="' + aData[4] + '" readonly>';
            jqTds[5].innerHTML = '<div class="text-right"><a class="editn btn btn-sm btn-success" href="">Save</a>  <a class="delete btn btn-sm btn-danger" href=""><i class="icons-office-52"></i></a></div>';
        }

        function saveRow(oTable, nRow, oldEmail) {
            var jqInputs = $('input', nRow);
            var passdata = [];
            //console.log(jqInputs[0].value);
            for (var i = 0; i <= 3; i++) {
                passdata[i] = jqInputs[i].value;
            };
            passdata[4] = companyid;
            passdata[5] = oldEmail;
            //console.log(passdata);
            //ajax call to db


            var uid = 0;
            $.ajax({
                url: "../ajax-updateuser",
                async: false,
                type: "POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    update: passdata
                },
                success: function (data) {
                    //console.log(data);
                    uid = data;
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //console.log("Something went wrong " + errorThrown);
                },
            });

            //console.log(jqInputs[0].value);

            var fakeActive = 0;
            if (dbowener != null) {
                fakeActive = 1;
            }

            oTable.fnUpdate('<div class=\"uhead\"><img src=\"' + passdata[0] + '\" height=\"40\"></div>', nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate(fakeActive, nRow, 4, false);
            oTable.fnUpdate('<div class="text-right"> <a class="btn btn-sm btn-default" href="user-detail=' + uid + '">Performance</a><a class="btn btn-sm btn-default" name="sendmail" value="' + uid + '"><i class="fa fa-envelope-o"></i></a><a class="btn btn-sm btn-default" name="userurl" value="' + uid + '"><i class="fa fa-link"></i></a> <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a><a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a></div>', nRow, 5, false);
            oTable.fnDraw();
        }

        function savenewRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            var passdata = [];
            for (var i = 0; i <= 3; i++) {
                passdata[i] = jqInputs[i].value;
            };
            passdata[4] = companyid;
            passdata[5] = companyname;
            passdata[6] = 'reply';

            //ajax call to db
            //console.log('test');
            var uid = 0;
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
                    userdata: passdata
                },
                success: function (data) {
                    //console.log(data)
                    uid = data;
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //console.log("Something went wrong " + errorThrown);
                },
            });

            ////console.log(companyid);
            ////console.log(dbowener);
            var fakeActive = 0;





            ////console.log(passdata);
            ////console.log(uid);
            oTable.fnUpdate('<div class=\"uhead\"><img src=\"' + passdata[0] + '\" height=\"40\"></div>', nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate(fakeActive, nRow, 4, false);
            oTable.fnUpdate('<div class="text-right"> <a class="btn btn-sm btn-default" href="user-detail=' + uid + '">Performance</a><a class="btn btn-sm btn-default" name="sendmail" value="' + uid + '"><i class="fa fa-envelope-o"></i></a><a class="btn btn-sm btn-default" name="userurl" value="' + uid + '"><i class="fa fa-link"></i></a> <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a><a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a></div>', nRow, 5, false);
            oTable.fnDraw();

            $('#table-editable2').find('tr').each(function () {
                if (!$('td:nth-child(5)', this).hasClass('active-indicator')) {
                    $('td:nth-child(5)', this).addClass('active-indicator');
                }
            });
            
            $('.paginate_button a').on('click',function(){
                activeIndicatorCss();
            });
            
            activeIndicatorCss();

        }



        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
            oTable.fnUpdate('<a class="edit btn btn-sm btn-default" href=""><i class="icon-note"></i></a>', nRow, 5, false);
            oTable.fnDraw();
        }


        function unpackimg(str) {

            var start = str.indexOf("src=");
            var end = str.indexOf("height");
            var pick = str.slice(start + 5, end - 2);
            return pick;

        }


        var oTable = $('#table-editable2').dataTable({
            // set the initial value
            "iDisplayLength": 15,
            "oLanguage": {

                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                },
                "sSearch": ""
            },
            "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [0]
                }
            ]
        });

        jQuery('#table-edit_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
        jQuery('#table-edit_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown

        var nEditing = null;

        $('#user_new').click(function (e) {
            e.preventDefault();
            var aiNew = oTable.fnAddData(['', '', '', '', '',
                    '<p class="text-center"><a class="edit btn btn-dark" href=""><i class="fa fa-pencil-square-o"></i>Edit</a> <a class="delete btn btn-danger" href=""><i class="fa fa-times-circle"></i> Remove</a></p>'
            ]);
            //console.log(aiNew[0]);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            editRownew(oTable, nRow);
            nEditing = nRow;
        });

        $('#table-editable2 a.delete').live('click', function (e) {
            e.preventDefault();
            if (confirm("Are you sure to delete this row ?") == false) {
                return;
            }
            var nRow = $(this).parents('tr')[0];
            var aData = oTable.fnGetData(nRow);
            var email = aData[3];



            $.ajax({
                url: "../ajax-deleteuser",
                async: false,
                type: "POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    deleteuser: email
                },
                success: function (data) {
                    //console.log(data)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //console.log("Something went wrong " + errorThrown);
                },
            });


            nEditing = null;
            oTable.fnDeleteRow(nRow);

            // alert("Deleted! Do not forget to do some ajax to sync with backend :)");
        });

        $('#table-editable2 a.cancel').live('click', function (e) {
            e.preventDefault();
            if ($(this).attr("data-mode") == "new") {
                var nRow = $(this).parents('tr')[0];
                oTable.fnDeleteRow(nRow);
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        $('#table-editable2 a.edit').live('click', function (e) {
            e.preventDefault();
            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* This row is being edited and should be saved */
                //console.log(tempSaver);
                saveRow(oTable, nEditing, tempSaver);
                nEditing = null;
                // alert("Updated! Do not forget to do some ajax to sync with backend :)");
            } else {
                /* No row currently being edited */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });

        $('#table-editable2 a.editn').live('click', function (e) {
            e.preventDefault();
            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing == nRow && this.innerHTML == "Save") {
                /* This row is being edited and should be saved */
                var validate = $('input', nEditing)[3].value;
                if (validate.length <= 0) {
                    alert('email can not be empty');
                    return;
                } else {
                    if (validate.indexOf('@') == -1 || validate.indexOf('.') == -1) {
                        alert('email format is wrong');
                        return;
                    }
                }
                savenewRow(oTable, nEditing);
                nEditing = null;
                // alert("Updated! Do not forget to do some ajax to sync with backend :)");
            } else {
                /* No row currently being edited */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });

        $('.dataTables_filter input').attr("placeholder", "Search a user...");

        $("a[name='userurl']").live('click', function (e) {
            e.preventDefault();
            var id = $(this).attr('value');
            //console.log(id);
            $.ajax({
                url: "../ajax-userurl",
                async: false,
                type: "POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    userid: id
                },
                success: function (data) {
                    $('#urlboxbody').html("<input type='text' name='" + id + "' placeholder='Type your code here' value ='" + window.location.hostname + "/display-report?report=" + data + "' class='form-control form-white' autofocus/>");

                    $('#urlModal').modal('show');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //console.log("Something went wrong " + errorThrown);
                },
            });
        });

        $("a[name='sendmail']").live('click', function (e) {
                if (dbowener != null) {
                    e.preventDefault();
                    var id = $(this).attr('value');

                    var hashedUrl;

                    $.ajax({
                        url: "../ajax-userurl",
                        async: false,
                        type: "POST",
                        beforeSend: function (xhr) {
                            var token = $('meta[name="csrf_token"]').attr('content');

                            if (token) {
                                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                        },
                        data: {
                            userid: id
                        },
                        success: function (data) {
                            hashedUrl = window.location.hostname + "/display-report?report=" + data;
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            //console.log("Something went wrong " + errorThrown);
                        },
                    });

                    var receiver = $(this).parents('tr').children('td').eq(1).html();
                    var activeStatus = $(this).parents('tr').children('td').eq(4).html();
                    currentEmailUser = $(this).parents('tr').children('td').eq(4);

                    if (activeStatus != 1) {
                        $('#email-send-alert').hide();
                    } else {
                        $('#email-send-alert').show();
                    }

                    var templateEmail = '<p>Hi, ' + receiver + '</p>';

                    templateEmail += "<p>Even the best companies out there could use a boost in Organic Search. That’s why we’ve created this exclusive Vector Report for " + companyname + ". The report provides an in-depth analysis of all the factors that are affecting your website’s Google Rankings. We’d hate to keep you waiting – take a look:";


                    $('#summernote').code(templateEmail);
                    $('#email-subject').val('An Exclusive Inside Look at your Site\'s SEO!');
                    $('#email-subject').attr("contactid", id);
                    $('#emailModal').modal('show');
                    ////console.log($('#summernote').code());
                    } else {
            alert('Account Manager is needed');
        }
                });

    };

    editableTable();

    $('#summernote').summernote({
        height: 300, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: true, // set focus to editable area after initializing summernote
    });

    $('#account-save').click(function () {
    var accountOwener = $('#account-list').val();

    //console.log(accountOwener);

    var package = [companyid, accountOwener];

    $.ajax({
        url: "../ajax-manager",
        async: false,
        type: "POST",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
            indata: package
        },
        success: function (data) {
            //sendWelcomeEmails(companyid, accountOwener);
            //activeUsers(companyid);
            activeIndicatorCss();
            //console.log(data);
            $('.account-panel').html(
                "<div class='panel bg-green'><div class='panel-content companyviewgrade'><div><div class='account-owner'><p>This account is owned by:</p><h4>" + accountOwener + "</h4><button type='button' class='btn btn-dark' id='account_edit' data-toggle='modal' data-target='#accountModal'>Edit</button></div></div></div></div>"
            );
            dbowener = accountOwener;
        },
        error: function (jqXHR, textStatus, errorThrown) {
            //console.log("Something went wrong " + errorThrown);
        },
    });

});


function activeCurrentContact(){
    currentEmailUser.html(1);
}

$('#email-send').click(function () {
    var email = {};
    email.subject = $('#email-subject').val();
    email.maincontent = $('#summernote').code();
    email.contactid = $('#email-subject').attr("contactid");
    email.accountowner = dbowener;
    email = JSON.stringify(email);
    //console.log(email);
    $.ajax({
        url: "../ajax-sendmail3",
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
            indata: email
        },
        success: function (data) {
            //console.log(data);
            activesingle(data);
            activeCurrentContact();
            activeIndicatorCss();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            //console.log("Something went wrong " + errorThrown);
        },
    });
});

activeIndicatorCss();

});


