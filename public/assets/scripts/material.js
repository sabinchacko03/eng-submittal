$(function () {
    $(document).on('click', ".btn-add-material-form", function () {
        $.post(MATERIAL + '/AJAXgetMaterialForm', function (result) {
            $("#sidePanelContent").html(result);
            $("#planned_date").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
            });
            $('#planned_date_icon').click(function () {
                $('#planned_date').datepicker('show');
            });
        });
        $(".ui-theme-settings").toggleClass("settings-open", 1000);
    });

    $(document).on('submit', ".addMaterialForm", function () {
        event.preventDefault();
        data = $(this).serialize();
        $.post(MATERIAL + '/AJAXValidateMaterial', data, function (result) {
            var response = JSON.parse(result);
            if (response.result == 'false') {
                $("#material_msg").html(response.msg);
            } else {
                $.post(MATERIAL + '/AJAXAddMaterial', data, function (result) {
                    $(".addMaterialForm").trigger("reset");
                    $(".ui-theme-settings").toggleClass("settings-open", 1000);
                    $("#materialDetailsTable").html(result);
                    $('.table').DataTable();
                });
            }
        });
    });

    $(document).on('click', ".viewMaterialDetails", function () {
        event.preventDefault();
        var project = $(this).data('project');
        $.post(MATERIAL + '/AJAXgetMaterialProject', {'project': project}, function (result) {
            $("#materialDetailsTable").html(result);
            $('.table').DataTable();
        });
    });

    $(document).on("click", ".btn-cancel", function () {
        $.post(MATERIAL + '/AJAXgetMaterialSummary', function (result) {
            $("#materialDetailsTable").html(result);
            $('.table').DataTable();
        });
    });

    $(document).on('click', ".enterMaterialLog", function () {
        var material = $(this).data('material');
        $.post(MATERIAL + '/AJAXMaterialSubmittalForm', {'material': material}, function (result) {
            $("#sidePanelContent").html(result);
            $("#actual_submittal_date, #returned_date").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
            });
            $('#returned_date_icon').click(function () {
                $('#returned_date').datepicker('show');
            });
            $('#actual_submittal_date_icon').click(function () {
                $('#actual_submittal_date').datepicker('show');
            });
        });
        $(".ui-theme-settings").toggleClass("settings-open", 1000);
    });

    $(document).on('submit', ".materialLogForm", function () {
        event.preventDefault();
        var data = $(this).serialize();
        $.post(MATERIAL + '/AJAXAddMaterialLog', data, function (result) {
            $(".materialLogForm").trigger("reset");
            $(".ui-theme-settings").toggleClass("settings-open", 1000);
            $("#materialDetailsTable").html(result);
            $('.table').DataTable();
            $(".table").trigger("update");
        });
    });
});