function formatDateTime(dateTimeString) {
    if (dateTimeString === '0000-00-00 00:00:00') {
        return "Invalid Date and Time";
    }
    var dateTime = new Date(dateTimeString);
    var options = { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric', 
        hour: 'numeric', 
        minute: 'numeric', 
        second: 'numeric', 
        hour12: true 
    };
    return dateTime.toLocaleString('en-US', options);
}

function reloadTableOverlay() {
    $('#reloadOverlay').show();
    $('#table_systemAdmins').DataTable().ajax.reload(function () { // Reload DataTable
        $('#reloadOverlay').hide();
        toastr.info("Table has been reloaded");
    });
}