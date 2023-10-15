jQuery(function () {
    if(jQuery('div').hasClass('rwmb-input'))
    {
        jQuery('.rwmb-input').sortable({placeholder: "ui-state-highlight",helper:'clone'});
        jQuery('.rwmb-input').disableSelection();
        jQuery('.wpt-repdrag:first').clone().prependTo(jQuery('.rwmb-clone'));
    }
});