/**
 * 
 */
$(function() {
	var start = $('#startdate').val();
	
	var dateObj = {
		"dateFormat": "YYYY-MM-DD",
		"dateOnly": true,
		"closeOnSelected": true,
		"autodateOnStart": false
	};
	
	$('#startdate').appendDtpicker(dateObj);
	$('#enddate').appendDtpicker(dateObj);
});