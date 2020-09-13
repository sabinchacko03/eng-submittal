$(function () {
    $(document).on('click', ".btn-add-issue", function () {
        $.post(CRITICALISSUE + '/AJAXgetCriticalIssueForm', function (result) {
            $("#sidePanelContent").html(result);
            $("#open_date").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
            });
        });
        $(".ui-theme-settings").toggleClass("settings-open", 1000);
    });
    $(document).on('submit', ".addIssueForm", function () {
        event.preventDefault();
        data = $(this).serialize();
        $.post(CRITICALISSUE + '/AJAXvalidateIssue', data, function (result) {
            var response = JSON.parse(result);
            if (response.result == 'false') {
                $("#issue_msg").html(response.msg);
            } else {
                $.post(CRITICALISSUE + '/AJAXaddCriticalIssue', data, function (result) {
                    $("#sidePanelContent").html('');
                    $(".ui-theme-settings").toggleClass("settings-open", 1000);
                    $("#issueDetailsTable").html(result);
                    $('.table').DataTable();
                });
            }
        });
    });
    $(document).on('click', ".editIssue", function () {
        var issue = $(this).data('issue');
        $.post(CRITICALISSUE + '/AJAXissueEditForm', {'issue': issue}, function (result) {
            $("#sidePanelContent").html(result);
            $("#closed_date").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
            });
        });
        $(".ui-theme-settings").toggleClass("settings-open", 1000);
    });

    $(document).on('submit', ".editIssueForm", function () {
        event.preventDefault();
        data = $(this).serialize();
        $.post(CRITICALISSUE + '/AJAXupdateForm', data, function (result) {
            $("#sidePanelContent").html('');
            $(".ui-theme-settings").toggleClass("settings-open", 1000);
            $("#issueDetailsTable").html(result);
            $('.table').DataTable();
        });
    });

    $(document).on('click', ".viewIssueDetails", function () {
        event.preventDefault();
        var project = $(this).data('project');
        $.post(CRITICALISSUE + '/AJAXgetIssueProject', {'project': project}, function (result) {
            $("#issueDetailsTable").html(result);
            $('.table').DataTable();
        });
    });

    $(document).on("click", ".btn-cancel", function () {
        $.post(CRITICALISSUE + '/AJAXgetIssueSummary', function (result) {
            $("#issueDetailsTable").html(result);
            $('.table').DataTable();
        });
    });
});