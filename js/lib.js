var serializeArray = function (form) {
	console.log(form.elements.length);
	var serialized = [];

	for (var i = 0; i < form.elements.length; i++) {
		var field = form.elements[i];

		if (!field.id || field.disabled || field.type === 'file' || field.type === 'reset' || field.type === 'submit' || field.type === 'button') continue;

		if (field.type === 'select-multiple') {
			for (var n = 0; n < field.options.length; n++) {
				if (!field.options[n].selected) continue;
				serialized.push(encodeURIComponent(field.id) + "=" + encodeURIComponent(field.options[n].value));
			}
		} else if ((field.type !== 'checkbox' && field.type !== 'radio') || field.checked) {
			serialized.push(encodeURIComponent(field.id) + "=" + encodeURIComponent(field.value));
		}
	}
	return serialized.join('&');
};
