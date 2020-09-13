$(function () {
    $(document).on('click', ".btn-add-inspection", function () {
        $.post(ADDINSPECTIONFORM, function (result) {
            $("#sidePanelContent").html(result);
            // commented the following as per Anand's Logic to freeze the planned date field
//            $("#planned_date").datepicker({
//                dateFormat: "yy-mm-dd",
//                changeMonth: true,
//                changeYear: true,
//            });
            $('#planned_date_icon').click(function () {
                $('#planned_date').datepicker('show');
            });
        });
        $(".ui-theme-settings").toggleClass("settings-open", 1000);
    });
    $(document).on('submit', ".addInspectionForm", function () {
        event.preventDefault();
        data = $(this).serialize();
        $.post(INSPECTIONS + '/AJAXvalidateInspection', data, function (result) {
            var response = JSON.parse(result);
            if (response.result == 'false') {
                $("#inspection_msg").html(response.msg);
            } else {
                $.post(ADDINSPECTION, data, function (result) {
                    $(".addInspectionForm").trigger("reset");
                    $(".ui-theme-settings").toggleClass("settings-open", 1000);
                    $("#inspectionDetailsTable").html(result);
                    $('.table').DataTable();
                });
            }
        });
    });

    $(document).on('click', ".viewInspectionDetails", function () {
        event.preventDefault();
        var project = $(this).data('project');
        $.post(INSPECTIONS + '/AJAXgetInspectionProject', {'project': project}, function (result) {
            $("#inspectionDetailsTable").html(result);
            $('.table').DataTable();
        });
    });

    $(document).on("click", ".addInspectionMaster", function () {
        event.preventDefault();
        $.post(INSPECTIONMASTERFORM, function (result) {
            $("#masterDiv").html(result);
        });
    });

    $(document).on('click', ".enterInspection", function () {
        var inspection = $(this).data('inspection');
        $.post(INSPECTIONS + '/AJAXInspectionHistoryForm', {'inspection': inspection}, function (result) {
            $("#sidePanelContent").html(result);
            $("#date").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
            });
            $('#date_icon').click(function () {
                $('#date').datepicker('show');
            });
        });
        $(".ui-theme-settings").toggleClass("settings-open", 1000);
    });

    $(document).on('submit', ".enterInspectionForm", function () {
        event.preventDefault();
        data = $(this).serialize();
        $.post(INSPECTIONS + '/AJAXaddInspectionHistory', data, function (result) {
            $(".enterInspectionForm").trigger("reset");
            $(".ui-theme-settings").toggleClass("settings-open", 1000);
            $("#inspectionDetailsTable").html(result);
            $('.table').DataTable();
            $(".table").trigger("update");
        });
    });

    $(document).on("click", ".btn-cancel", function () {
        $.post(INSPECTIONS + '/AJAXgetInspectionSummary', function (result) {
            $("#inspectionDetailsTable").html(result);
            $('.table').DataTable();
        });
    });
});