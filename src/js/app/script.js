$('.numberVisitor').on('click',function() {
	if($('.jvectormap-marker').css('display')=='block' || $('.jvectormap-marker').css('display')==null ) {
	$('.jvectormap-marker').css('display','none');
	}
	else {
		$('.jvectormap-marker').css('display','block');
	}
});


