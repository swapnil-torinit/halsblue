$(document).ready(function() {
	
	if( $('.has-datetimepicker').length ) 
	{
		$('.has-datetimepicker').datetimepicker();
	}
	
	if( $('.has-datepicker').length )
	{
		$('.has-datepicker').datetimepicker({format: 'DD/MM/YYYY'});
	} 

	if( $('.has-datetimepicker_new').length ) 
	{
		$('.has-datetimepicker_new').datetimepicker({format: 'YYYY-MM-DD'});
	}

	
});
