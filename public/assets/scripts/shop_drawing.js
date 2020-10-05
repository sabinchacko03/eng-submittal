$(function () {
    $(document).on('click', ".btn-add-shop-drawing-form", function () {
        $.post(SHOPDRAWING + '/AJAXgetShopDrawingForm', function (result) {
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

    $(document).on('submit', ".addShopDrawingForm", function () {
        event.preventDefault();
        data = $(this).serialize();
        $.post(SHOPDRAWING + '/AJAXValidateShopDrawing', data, function (result) {
            var response = JSON.parse(result);
            if (response.result == 'false') {
                $("#material_msg").html(response.msg);
            } else {
                $.post(SHOPDRAWING + '/AJAXAddShopDrawing', data, function (result) {
                    $(".addShopDrawingForm").trigger("reset");
                    $(".ui-theme-settings").toggleClass("settings-open", 1000);
                    $("#shopDrawingTable").html(result);
                    // $('.table').DataTable();
                });
            }
        });
    });

    $(document).on('click', ".viewShopDrawingDetails", function () {
        event.preventDefault();
        var project = $(this).data('project');
        $.post(SHOPDRAWING + '/AJAXgetDeptSummary', {'project': project}, function (result) {
            $("#shopDrawingTable").html(result);
            // $('.table').DataTable();
        });
    });
    
    $(document).on('click', ".viewShopDrawingDetailsDept", function () {
        event.preventDefault();
        var project = $(this).data('project');
        var department = $(this).data('department');
        $.post(SHOPDRAWING + '/AJAXgetShopDrawingProject', {'project': project, 'department' : department}, function (result) {
            $("#shopDrawingTable").html(result);
            $('.table').DataTable();
        });
    });

    $(document).on("click", ".btn-cancel", function () {
        $.post(SHOPDRAWING + '/AJAXgetShopDrawingSummary', function (result) {
            $("#shopDrawingTable").html(result);
            // $('.table').DataTable();
        });
    });

    $(document).on('click', ".enterShopDrawinglLog", function () {
        var material = $(this).data('material');
        $.post(SHOPDRAWING + '/AJAXShopDrawingSubmittalForm', {'material': material}, function (result) {
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

    $(document).on('submit', ".shopDrawingLogForm", function () {
        event.preventDefault();
        var data = $(this).serialize();
        $.post(SHOPDRAWING + '/AJAXAddShopDrawingLog', data, function (result) {
            $(".materialLogForm").trigger("reset");
            $(".ui-theme-settings").toggleClass("settings-open", 1000);
            $("#shopDrawingTable").html(result);
            $('.table').DataTable();
            $(".table").trigger("update");
        });
    });
    
    $(document).on('click', ".editShopDrawingLog", function () {
        event.preventDefault();
        var log = $(this).data('material-log');
        $.post(SHOPDRAWING + '/AJAXGetShopDrawingLogDetails', {'log' : log}, function (result) {
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
    
    $(document).on('submit', ".shopDrawingLogUpdateForm", function(){
        event.preventDefault();
        var data = $(this).serialize();
        $.post(SHOPDRAWING + '/AJAXupdateShopDrawingLog', data, function (result) {
            $(".shopDrawingLogUpdateForm").trigger("reset");
            $(".ui-theme-settings").toggleClass("settings-open", 1000);
            $("#shopDrawingTable").html(result);
            $('.table').DataTable();
            $(".table").trigger("update");
        });
    });
    
    $(document).on('click', ".editShopDrawing", function () {
        var material = $(this).data('material');
        $.post(SHOPDRAWING + '/AJAXgetShopDrawingEditForm', {'material' : material}, function (result) {
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
    
    $(document).on('submit', ".editShopDrawingForm", function(){
        event.preventDefault();
        var data = $(this).serialize();
        $.post(SHOPDRAWING + '/AJAXUpdateShopDrawing', data, function (result) {
            $(".editShopDrawingForm").trigger("reset");
            $(".ui-theme-settings").toggleClass("settings-open", 1000);
            $("#shopDrawingTable").html(result);
            $('.table').DataTable();
            $(".table").trigger("update");
        });
    });

    $(document).on('click', ".deleteShopDrawing", function () {
        var material = $(this).data('material');
        if(confirm('Do you really want to Delete?')){
            $.post(SHOPDRAWING + '/AJAXdeleteShopDrawing', {'material' : material}, function (result) {            
                $("#shopDrawingTable").html(result);
                $('.table').DataTable();
            });
        }        
    });
});