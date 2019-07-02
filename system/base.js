function alert_clear_type()
{
    $("#item_alert").removeClass("alert-success");
    $("#item_alert").removeClass("alert-danger");
    $("#item_alert").removeClass("alert-primary");
    $("#item_alert").removeClass("alert-warning");
}

function set_alert_success(text)
{
    alert_clear_type();

    $("#item_alert").addClass("alert-success");
    $("#alert_message").text(text);

    alert_show();
}


function set_alert_danger(text)
{
    alert_clear_type();

    $("#item_alert").addClass("alert-danger");
    $("#alert_message").text(text);

    alert_show();
}


function set_alert_primary(text)
{
    alert_clear_type();

    $("#item_alert").addClass("alert-primary");
    $("#alert_message").text(text);

    alert_show();
}


function set_alert_warning(text)
{
    alert_clear_type();

    $("#item_alert").addClass("alert-warning");
    $("#alert_message").text(text);

    alert_show();
}


function alert_close() { $("#item_alert").hide(); }


function alert_show() { $("#item_alert").show(); }

