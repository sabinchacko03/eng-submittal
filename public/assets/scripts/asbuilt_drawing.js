$(function () {
    $(document).on('click', ".btn-add-asbuilt-drawing-form", function () {
        $.post(ASBUILT + '/AJAXgetShopDrawingForm', function (result) {
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

    $(document).on('submit', ".addAsbuiltDrawingForm", function () {
        event.preventDefault();
        data = $(this).serialize();
        $.post(ASBUILT + '/AJAXValidateShopDrawing', data, function (result) {
            var response = JSON.parse(result);
            if (response.result == 'false') {
                $("#material_msg").html(response.msg);
            } else {
                $.post(ASBUILT + '/AJAXAddShopDrawing', data, function (result) {
                    $(".addAsbuiltDrawingForm").trigger("reset");
                    $(".ui-theme-settings").toggleClass("settings-open", 1000);
                    $("#asbuiltDrawingTable").html(result);
                    // $('.table').DataTable();
                });
            }
        });
    });

    $(document).on('click', ".viewAsbuiltDrawingDetails", function () {
        event.preventDefault();
        var project = $(this).data('project');
        $.post(ASBUILT + '/AJAXgetDeptSummary', {'project': project}, function (result) {
            $("#asbuiltDrawingTable").html(result);
            // $('.table').DataTable();
        });
    });
    
    $(document).on('click', ".viewAsbuiltDrawingDetailsDept", function () {
        event.preventDefault();
        var project = $(this).data('project');
        var department = $(this).data('department');
        $.post(ASBUILT + '/AJAXgetShopDrawingProject', {'project': project, 'department' : department}, function (result) {
            $("#asbuiltDrawingTable").html(result);
            $('.table').DataTable();
        });
    });

    $(document).on("click", ".btn-cancel", function () {
        $.post(ASBUILT + '/AJAXgetShopDrawingSummary', function (result) {
            $("#asbuiltDrawingTable").html(result);
            // $('.table').DataTable();
        });
    });

    $(document).on('click', ".enterAsbuiltDrawinglLog", function () {
        var material = $(this).data('material');
        $.post(ASBUILT + '/AJAXShopDrawingSubmittalForm', {'material': material}, function (result) {
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

    $(document).on('submit', ".asbuiltDrawingLogForm", function () {
        event.preventDefault();
        var data = $(this).serialize();
        var info = $('.table').DataTable().page.info();
        $.post(ASBUILT + '/AJAXAddShopDrawingLog', data, function (result) {
            $(".materialLogForm").trigger("reset");
            $(".ui-theme-settings").toggleClass("settings-open", 1000);
            $("#asbuiltDrawingTable").html(result);
            var table = $('.table').DataTable();
            table.page(info.page).draw('page');
        });
    });
    
    $(document).on('click', ".editAsbuiltDrawingLog", function () {
        event.preventDefault();
        var log = $(this).data('material-log');
        $.post(ASBUILT + '/AJAXGetShopDrawingLogDetails', {'log' : log}, function (result) {
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
            $(".ui-theme-settings").toggleClass("settings-open", 1000);
        });
    });
    
    $(document).on('submit', ".asbuiltDrawingLogUpdateForm", function(){
        event.preventDefault();
        var data = $(this).serialize();
        var info = $('.table').DataTable().page.info();
        $.post(ASBUILT + '/AJAXupdateShopDrawingLog', data, function (result) {
            $(".asbuiltDrawingLogUpdateForm").trigger("reset");
            $(".ui-theme-settings").toggleClass("settings-open", 1000);
            $("#asbuiltDrawingTable").html(result);
            var table = $('.table').DataTable();
            table.page(info.page).draw('page');
        });
    });
    
    $(document).on('click', ".editAsbuiltDrawing", function () {
        var material = $(this).data('material');
        $.post(ASBUILT + '/AJAXgetShopDrawingEditForm', {'material' : material}, function (result) {
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
    
    $(document).on('submit', ".editAsbuiltDrawingForm", function(){
        event.preventDefault();
        var data = $(this).serialize();
        $.post(ASBUILT + '/AJAXUpdateShopDrawing', data, function (result) {
            $(".editShopDrawingForm").trigger("reset");
            $(".ui-theme-settings").toggleClass("settings-open", 1000);
            $("#asbuiltDrawingTable").html(result);
            $('.table').DataTable();
            $(".table").trigger("update");
        });
    });

    $(document).on('click', ".deleteAsbuilt", function () {
        var material = $(this).data('material');
        if(confirm('Do you really want to Delete?')){
            $.post(ASBUILT + '/AJAXdeleteAsbuilt', {'material' : material}, function (result) {            
                $("#asbuiltDrawingTable").html(result);
                $('.table').DataTable();
            });
        }        
    });
});