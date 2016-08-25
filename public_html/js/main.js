/**
 * Для создания и изменения картинки
 */
function canvasCreateEdit()
{
	// картинка, если есть
	var jq_image_src = $('#js_id_edit_img_src').val();

	// заставляем рисовать мышкой
	$('#js_id_canvas').jqScribble({
		width: 500,
		height: 300,
		backgroundImage: ( jq_image_src ) ? jq_image_src : false
	});
}

/**
 * Перед отправкой подготовить картинку
 * @param {JQuery} jq_form
 * @returns {undefined}
 */
function beforeValidateEditImage(jq_form)
{
	// через jq канвас не взять
	var canvas = document.getElementById('js_id_canvas'),
		canvas_data = canvas.toDataURL('image/png');

	jq_form.find('#ImageAR_image_file').val(canvas_data);
}

$(function() {
	// запуск в нужном месте
	if ( $('#js_id_canvas').length ) {
		canvasCreateEdit();
	}
});