$(function () {
    // Do Event Delegation for all asynchronously loaded elements
    $(document).on('click', ".viewMilestoneDetails", function () {
        event.preventDefault();
        var project = $(this).data("project");
        milestoneFunctions.loadMilestonesProject(project);
        $("#milestoneDetailsTable").hide();
    });
    $(document).on("click", ".sidePanelClose,.sidebar-cancel", function () {
        $(".ui-theme-settings").removeClass('settings-open');
        $("#sidePanelContent").html('');
    });

    $(document).on("click", ".btn-cancel", function () {
        milestoneFunctions.showAllMilestoneTable();
    });

    $(document).on('click', ".showAddMilestoneForm,.btn-add-milestone", function () {
        var project = $(this).data("project");
        $.post(MILESTONEFORMURL, function (result) {
            $("#sidePanelContent").html(result);
            $("#project").val(project);
            $('#planned_date_icon').click(function () {
                $('#planned_date').datepicker('show');
            });
        });
        $(".ui-theme-settings").toggleClass("settings-open", 1000);
    });

    $(document).on('submit', ".addMilestonForm", function () {
        event.preventDefault();
        var data = $(this).serialize();
        var project = $("#project").val();
        var milestone = $("#milestone").val();

        $.post(MILESTONE + '/AJAXcheckMilestoneExist', {'milestone': milestone, 'project': project}, function (result) {
            if (result == 'false') {
                $("#milestone_msg").html('Milestone Already Exists!');
            } else {
                $.post(ADDMILESTONE, data, function (result) {
                    $(".addMilestonForm").trigger("reset");
                    $(".ui-theme-settings").toggleClass("settings-open", 1000);
                    milestoneFunctions.loadMilestonesProject(project);
                    $("#milestoneDetailsTable").hide();
                });
            }
        });
    });

    $(document).on("click", ".addMaster", function () {
        event.preventDefault();
        $.post(MASTERFORMURL, function (result) {
            $("#masterDiv").html(result);
        });
    });

    $(document).on("click", ".add-master-submit", function () {
        event.preventDefault();
        var masterName = $("#name").val();
        if (masterName == '')
            return false;
        $.post(MILESTONE + '/AJAXvalidateMilestoneMaster', {'name': masterName}, function (result) {
            var data = JSON.parse(result);
            if (data.result == 'false') {
                $("#mileston-master-msg").html(data.msg);
            } else {
                $.post(MASTERADDURL, {'name': masterName}, function (result) {
                    $(".addMilestonForm").find("#milestone").html(result);
                    $("#masterDiv").html('');
                });
            }
        });
    });

    $(document).on("submit", "#addMilestoneMasterForm", function () {
        event.preventDefault();
        var data = $(this).serialize();
        $.post(MASTERADDURL, data, function (result) {
            $("#addMilestoneMasterForm").trigger('reset');
            $(".addMilestonForm").find("#milestone").html(result);
            $(".ui-theme-settings").removeClass('settings-open');
        });
    });

    $(document).on("click", ".editMilestone", function () {
        event.preventDefault();
        var milestone = $(this).data('milestone');
        $.post(EDITMILESTONEFORMURL, {'milestone': milestone}, function (result) {
            $("#sidePanelContent").html(result);
            $('#actual_date_icon').click(function () {
                $('#actual_date').datepicker('show');
            });
            $('#amended_date_icon').click(function () {
                $('#amended_date').datepicker('show');
            });
        });
        $(".ui-theme-settings").toggleClass("settings-open", 1000);
    });

    $(document).on("submit", ".editMilestonForm", function () {
        event.preventDefault();
        var data = $(this).serialize();
        var project = $("#project").val();
        $.post(UPDATEMILESTONEURL, data, function (result) {
            $(".editMilestonForm").trigger("reset");
            $(".ui-theme-settings").toggleClass("settings-open", 1000);
            milestoneFunctions.loadMilestonesProject(project);
        });
    });

    var milestoneFunctions = {
        loadMilestonesProject: function (project) {
            $.post(MILESTONE_URL, {'project': project}, function (result) {
                $("#viewContent").html(result);
                $("#viewContent").show('slow');
                $('.table').DataTable();
                $("#actual_date").datepicker({
                    dateFormat: "yy-mm-dd"
                });
            });
        },
        showAllMilestoneTable: function () {
            $.post(SHOWALLMILESTONEURL, function (result) {
                $("#milestoneDetailsTable").html(result);
                $("#milestoneDetailsTable").show();
                $("#viewContent").hide();
                $('.table').DataTable();
            });
        }
    };

    //To delete Milestone
    $(document).on("click", ".deleteMilestone", function () {
        event.preventDefault();
        var milestone = $(this).data('milestone');
        var project = $("#project").val();
        if (confirm("You really want to delete this Milestone?")) {
            $.post(DELETEMILESTONEURL, {'milestone': milestone}, function (result) {
                milestoneFunctions.loadMilestonesProject(project);
            });
        }
    });

    $(document).on("click", ".master-cancel", function () {
        event.preventDefault();
        $("#masterDiv").html('');
    });

    // $(document).mouseup(function (e)
    // {
    //     var container = $(".theme-settings__inner");

    //     // if the target of the click isn't the container nor a descendant of the container
    //     if (!container.is(e.target) && container.has(e.target).length === 0 && $('#ui-datepicker-div').has(e.target).length === 0)
    //     {
    //         $(".ui-theme-settings").removeClass("settings-open");
    //     }
    // });
});
