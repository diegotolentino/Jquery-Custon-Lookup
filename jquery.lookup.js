/**
 * Initialize lookup field
 * 
 * @param oField
 *            display field
 * @param oCallBack
 *            trigger function on select result item
 * @param mSource
 *            url from trigger search
 * @param mParams
 *            aditional paramns(Ex: to dependent lookup like state/city)
 * @returns {Boolean}
 */
function jqueryLookup(oField, oCallBack, mSource, mParams, fOnsucess) {
	// nao inicializa o campo se ja estiver inicializado
	if ($(oField).attr("searchInput") != undefined) {
		return false;
	}

	// nao inicializa o campo se estiver readonly
	if ($(oField).attr("readonly") != undefined
			|| $(oField).attr("disabled") != undefined) {
		return false;
	}

	// input search
	var input = $(oField).autocomplete({
		minLength : 0,
		dataType: 'json',
		source : function(request, response) {
			var el = this.element;
			var mParams = el.autocomplete("option", 'mParams');
			if (typeof mParams == 'function') {
				mParams = mParams();
			}
			mParams.term = request.term;

			$.ajax({
				type : 'POST',
				dataType : 'json',
				url : el.autocomplete("option", 'mSource'),
				data : mParams,
				success : function(data) {
					if (data.error) {
						alert(data.errorDetail.message);
					} else {
						response(data.oDados);
					}
				},
				error : function(jqXHR, textStatus, errorThrown) {
					alert(errorThrown.toString());
				}
			});
		},
		select : oCallBack
	})
	.autocomplete("option", { mSource : mSource, mParams : (mParams ? mParams :	{}) })
	.attr("searchInput", "1")
	.addClass("ui-widget ui-widget-content ui-corner-all jquery-lookup")
};
