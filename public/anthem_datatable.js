
jQuery(document).ready(function ($) {
    $("#anthem_datatable_asc").DataTable({
        paging: false,
        order: [[0, "asc"]]
    });
    $("#anthem_datatable_desc").DataTable({
        paging: false,
        order: [[0, "desc"]]
    });
});