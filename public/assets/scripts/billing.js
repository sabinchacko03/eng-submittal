$(function () {
    $(document).on('click', ".btn-add-billing", function () {
        var project = $(this).data("project");
        $.post(BILLING + '/AJAXgetBillingForm', function (result) {
            $("#sidePanelContent").html(result);
            $("#project").val(project);
        });
        $(".ui-theme-settings").toggleClass("settings-open", 1000);
    });

    $(document).on('click', ".viewBilling", function () {
        event.preventDefault();
        var project = $(this).data("project");
        $.post(BILLING + '/AJAXgetBillingProject', {'project': project}, function (result) {
            $("#billingDetailsTable").html(result);
//            $('.table').DataTable();
            $("#actual_date").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    });

    $(document).on("click", ".btn-cancel", function () {
        $.post(BILLING + '/AJAXgetBillingSummary', function (result) {
            $("#billingDetailsTable").html(result);
            $('.table').DataTable();
        });
    });

    $(document).on('submit', "#add_billing_form", function () {
        event.preventDefault();
        var dept = $("#department").val();
        var pjct = $("#project").val();
        var projected = $("#projected").val();
        var projected_master, total_projected;
        var month = $("#month").val();
        var year = $("#year").val();
        var formData = $(this).serialize();
        $("#date_msg").html('');
        $("#projected_msg").html('');
        if (dept != '' && pjct != '') {
            $.post(BILLING + '/AJAXCompareDates', {'project': pjct, 'month': month, 'year': year, 'department' : dept}, function (res) {
                var data1 = JSON.parse(res);
                if (data1.result == 'false') {
                    $("#date_msg").html(data1.msg);
                } else {
                    $.post(BILLING + '/AJAXgetDeptVal', {'project': pjct, 'dept': dept, 'month': month, 'year': year}, function (result) {
                        var data = JSON.parse(result);
                        projected_master = data.dept_val;
                        total_projected = data.dept_sum;
                        if (isNaN(projected) || (Math.sign(projected) < 0)) {
                            $("#projected_msg").html('Please enter a valid number ');
                        } else if (parseInt(projected_master) < (parseInt(projected) + parseInt(total_projected))) {
                            $("#projected_msg").html('Total Projected value exceeded!');
                        } else {
                            $.post(BILLING + '/AJAXaddBilling', formData, function (result) {
                                $("#billingDetailsTable").html(result);
//                                $('.table').DataTable();
                            });
                            $(".ui-theme-settings").toggleClass("settings-open", 1000);
                        }
                    });
                }
            });
        }
    });

    $(document).on('click', ".editBilling", function () {
        event.preventDefault();
        var billing = $(this).data('billing');
        $.post(BILLING + '/AJAXEditBilling', {'billing': billing}, function (result) {
            $("#sidePanelContent").html(result);
            $("#start_date,#end_date").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
        $(".ui-theme-settings").toggleClass("settings-open", 1000);
    });

    $(document).on('submit', "#edit_billing_form", function () {
        event.preventDefault();
        var formData = $(this).serialize();
        var projected = $("#projected").val();
        var actual = $("#actual").val();
        if (isNaN(actual) || (Math.sign(actual) < 0)) {
            $("#projected_msg").html('Please enter a valid number!');
        }else {
            $.post(BILLING + '/AJAXUpdateBilling', formData, function (result) {
                $("#billingDetailsTable").html(result);
//                $('.table').DataTable();
            });
            $(".ui-theme-settings").toggleClass("settings-open", 1000);
        }

    });
});