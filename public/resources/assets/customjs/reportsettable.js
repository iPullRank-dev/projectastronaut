$(function () {

    function editableTable() {

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
            jqTds[0].innerHTML = '<input type="text" class="form-control small" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="text" class="form-control small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input type="text" class="form-control small" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<input type="text" class="form-control small" value="' + aData[3] + '">';
            jqTds[4].innerHTML = '<div class="text-right"><a class="edit btn btn-sm btn-success" href="">Save</a> <a class="delete btn btn-sm btn-danger" href=""><i class="icons-office-52"></i></a></div>';
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate('<div class="text-right"> <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="fa fa-file-code-o"></i></a><a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a></div>', nRow, 4, false);
            oTable.fnDraw();
        }

        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate('<a class="edit btn btn-sm btn-default" href=""><i class="icon-note"></i></a>', nRow, 4, false);
            oTable.fnDraw();
        }

        var oTable = $('#table-editable').dataTable({
            "iDisplayLength": 10,
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

        $('#table-edit_new').click(function (e) {
            e.preventDefault();
            var aiNew = oTable.fnAddData(['', '', '', '',
                    '<p class="text-center"><a class="edit btn btn-dark" href=""><i class="fa fa-pencil-square-o"></i>Edit</a> <a class="delete btn btn-danger" href=""><i class="fa fa-times-circle"></i> Remove</a></p>'
            ]);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            editRow(oTable, nRow);
            nEditing = nRow;
        });

        $('#table-editable a.delete').live('click', function (e) {
            e.preventDefault();
            if (confirm("Delete a company will delete information, score and all contacts of it, are you sure?") == false) {
                return;
            }
            var nRow = $(this).parents('tr')[0];
            var aData = oTable.fnGetData(nRow);
            var company_name = aData[1];
            console.log(company_name);


            $.ajax({
                url: "../ajax-deletecompany",
                async: false,
                type: "POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    deletecompany: company_name
                },
                success: function (data) {
                    console.log(data)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log("Something went wrong " + errorThrown);
                },
            });

            nEditing = null;
            oTable.fnDeleteRow(nRow);

            // alert("Deleted! Do not forget to do some ajax to sync with backend :)");
        });

        $('#table-editable a.cancel').live('click', function (e) {
            e.preventDefault();
            if ($(this).attr("data-mode") == "new") {
                var nRow = $(this).parents('tr')[0];
                oTable.fnDeleteRow(nRow);
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        $('#table-editable a.edit').live('click', function (e) {
            e.preventDefault();
            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* This row is being edited and should be saved */
                saveRow(oTable, nEditing);
                nEditing = null;
                // alert("Updated! Do not forget to do some ajax to sync with backend :)");
            } else {
                /* No row currently being edited */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });

        $('.dataTables_filter input').attr("placeholder", "Search a user...");

        $("a[name='edit']").live('click', function (e) {
            e.preventDefault();
            var id = $(this).attr('value');
            console.log(id);
            $.ajax({
                url: "../ajax-loadeditor",
                async: false,
                type: "POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    companyid: id
                },
                success: function (data) {
                    var cinfo = "<input name='id' value='" + data[0]['id'] + "'>";
                    var cgrade = '';

                    for (var key in data[0]) {
                        if (data[0].hasOwnProperty(key)) {
                            //<input type="text" name="new_title" id="new_title" class="form-control form-white" >
                            if (!excludedata(key, ['id', 'deleted_at', 'created_at', 'updated_at', 'code_zone'])) {
                                var readonly = '';
                                if (key == 'account_with') {
                                    readonly = 'readonly';
                                }
                                cinfo += "<label>" + transreadable(key) + "</label><input type='text' name='" + key + "' id='" + key + "' class='form-control form-white' value='" + data[0][key] + "'" + readonly + ">";
                            };
                        };
                    };

                    for (var key in data[1]) {
                        if (data[1].hasOwnProperty(key)) {
                            //<input type="text" name="new_title" id="new_title" class="form-control form-white" >
                            if (!excludedata(key, ['id', 'deleted_at', 'created_at', 'updated_at', 'company_id'])) {
                                cgrade += "<label>" + transreadable(key) + "</label><input type='text' name='" + key + "' id='" + key + "' class='form-control form-white' value='" + data[1][key] + "'>";
                            };
                        };
                    };

                    $('#tab-1').html(cinfo);
                    $('#tab-2').html(cgrade);

                    $('#editmodal').modal('show');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log("Something went wrong " + errorThrown);
                },
            });
        });

        $("a[name='code']").live('click', function (e) {
            e.preventDefault();
            var id = $(this).attr('value');
            console.log(id);
            $.ajax({
                url: "../ajax-loadcode",
                async: false,
                type: "POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    codeid: id
                },
                success: function (data) {
                    $('#codebody').html("<textarea type='text' id='codebox' name='" + id + "' placeholder='Type your code here'>" + data + "</textarea>");

                    $('#codemodal').modal('show');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log("Something went wrong " + errorThrown);
                },
            });
        });

    };

    editableTable();

    function excludedata(keyname, array) {
        var exclusive = array;
        var check = 0;
        var i = 0;
        while (check == 0 && i < exclusive.length) {
            if (exclusive[i] == keyname) {
                check = 1;
            };
            i++;
        };
        if (check != 0) {
            return true;
        } else {
            return false;
        };
    }

    function transreadable(str) {
        str = str.replace("fc_", "");
        str = str.replace('_', ' ');
        str = str.replace('_', ' ');
        return str;
    }


    $('#upfile').on('click', function (e) {
        e.preventDefault();
        $('#uploadmodal').modal('show');
        // alert("Deleted! Do not forget to do some ajax to sync with backend :)");
    });


    $('#codesave').on('click', function (e) {
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
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: {
                scode: passdata
            },
            success: function (data) {
                console.log(data);
                $('#codemodal').modal('hide');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("Something went wrong " + errorThrown);
            },
        });
    });

    $('#print').on('click', function (e) {
        e.preventDefault();
        var i = 0;
        $('tbody').find('tr').each(function () {
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

    $("#checkall").on('ifClicked', function () {
        console.log('a');
        $('input:checkbox').not(this).iCheck('toggle');
    });

});