$(function () {
    // Add Project
    $(document).on('click', ".btn-add-project", function () {
        $.post(ADDPROJECTFORMURL, function (result) {
            $("#sidePanelContent").html(result);

            $("#start_date,#end_date").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                
            });

            $('#start_date_icon,#start_date').click(function () {
                $('#start_date').datepicker('show');
            });
            $('#end_date,#end_date_icon').click(function () {
                $('#end_date').datepicker('show');
            });
        });
        $(".ui-theme-settings").toggleClass("settings-open", 1000);
    });

    $(document).on('submit', "#add_project_form", function () {
        event.preventDefault();
        var formData = $(this).serialize();
        $.post(ADDPROJECTURL, formData, function (result) {
            $("#projectDetailsTable").find(".card-body").html(result);
            $('.table').DataTable();
        });
        $(".ui-theme-settings").toggleClass("settings-open", 1000);
    });

    $(document).on('click', ".editProject", function () {
        event.preventDefault();
        var project = $(this).data('project');
        $.post(EDITPROJECTFORMURL, {'project': project}, function (result) {
            $("#sidePanelContent").html(result);
            $("#start_date,#end_date").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
            });
            $('#start_date_icon').click(function () {
                $('#start_date').datepicker('show');
            });
            $('#end_date_icon').click(function () {
                $('#end_date').datepicker('show');
            });
        });
        $(".ui-theme-settings").toggleClass("settings-open", 1000);
    });

    $(document).on('submit', "#editProjectForm", function () {
        event.preventDefault();
        var formData = $(this).serialize();
        $.post(EDITPROJECTURL, formData, function (result) {
            $("#projectDetailsTable").find(".card-body").html(result);
            $('.table').DataTable();
        });
        $(".ui-theme-settings").toggleClass("settings-open", 1000);
    });
});