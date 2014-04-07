$( "#searchButton" ).click(function(e) {
  $("#searchForm").fadeToggle( "slow");
   e.stopImmediatePropagation();
});
$(document).click(function (e) {
    if ($("#searchForm").is(":visible") && !$(e.target).parents("#searchForm").length > 0) {
        $("#searchForm").fadeOut("slow");
    }
});

function deleteModal(id) {
	$('#deleteFormHidden').val(id);
}
