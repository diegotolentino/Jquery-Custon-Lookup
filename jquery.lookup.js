/**
 * Initialize lookup field
 * 
 * @param oField display field
 * @param oCallBack trigger function on select result item
 * @param mSource url from trigger search
 * @param mParams aditional paramns(Ex: to dependent lookup like state/city)
 * @returns {Boolean}
 */
function jqueryLookup(oField, oCallBack, mSource, mParams) {
	//nao inicializa o campo se ja estiver inicializado
	if($(oField).attr("searchInput")!=undefined)
		return false;
	
	//nao inicializa o campo se estiver readonly
	if($(oField).attr("readonly")!=undefined || $(oField).attr("disabled")!=undefined)
		return false;
	
	//input search
	var input = $(oField).autocomplete({
		minLength: 0,
		source: function( request, response ){
			var el=this.element;
			var mParams=el.autocomplete("option", 'mParams');
			mParams.term=request.term;
			
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: el.autocomplete("option", 'mSource'),
				data: mParams,
				success: function (data){
					if(data.error){
						$( "#dialogo" ).dialog({ title: 'Error', modal: true}).text(data.errorDetail.message);				
					} else {
						response(data);
					}
				},
				error: function (jqXHR, textStatus, errorThrown){
					$( "#dialogo" ).dialog({ title: 'Error', modal: true}).text(errorThrown.toString());				
				}
			});			
		},
		select: oCallBack,
	})
	.blur(function (){
		//leave event, dont working now
		//if($(this).val()==''){
		//	$( this ).trigger( "autocompleteselect", {item:['','','']});
		//}
	})
	.autocomplete("option", {mSource: mSource, mParams : (mParams?mParams:{})})
	.attr( "searchInput", "1" )
	.addClass( "ui-widget ui-widget-content ui-corner-left jquery-lookup" )
	.data( "autocomplete" )._renderItem = function( ul, item ) {
		return $( "<li></li>" )
			.data( "item.autocomplete", item )
			.append( "<a>" + item[1] + "</a>" )
			.appendTo( ul );
	};
		
	/*bt com seta*/
	$( "<button type='button'>&nbsp;</button>" )
	.attr( "tabIndex", -1 )
	.attr( "title", "Show All Items" )
	.insertAfter( oField )
	.button({
		icons: {
			primary: "ui-icon-triangle-1-s"
		},
		text: false
	})
	.removeClass( "ui-corner-all" )
	.addClass( "ui-corner-right ui-button-icon" )
	.css({'height': '27px', 'float': 'left'})
	.click(function() {
		//campo de procura
		var input=$(this).prev();
		
		// close if already visible
		if (input.autocomplete( "widget" ).is( ":visible" ) ) {
			input.autocomplete( "close" );
			return false;
		}
		
		// work around a bug (likely same cause as #5265)
		$( this ).blur();
		
		// pass empty string as value to search for, displaying all results
		input.autocomplete( "search", "" );
		input.focus();
	});
};
