$(function() {
    startForm();
    validateAll();
    renderMenuLeft();
});

function renderMenuLeft() {
    $(".menu_left .menu_icon").mouseover(function() {
        $(this).addClass("menu_left_hover");
    });
    $(".menu_left .menu_icon").mouseout(function() {
        $(this).removeClass("menu_left_hover");
    });
}

function startForm() {
    $("input[type=submit]").each(function() {
        $(this).mouseover(function() {
            $(this).addClass("button_hover");
        });
        $(this).mouseout(function() {
            $(this).removeClass("button_hover");
        });
    });
	
    $("input[type=text]").addClass("textbox");
    $("input[type=password]").addClass("textbox");
    $("textarea").addClass("textbox");
	
    $("input[type=button]").addClass("button");
    $("input[type=submit]").addClass("button");
}

function validateAll() {
    $(".required")
    .attr("required", "true")
    .addClass("easyui-validatebox");
}