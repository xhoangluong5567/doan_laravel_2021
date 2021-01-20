$().ready(function() {
	$("#demoForm").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"qty": {
				required: true,
                max: 15,
                min:1
			},
		}
	});
});