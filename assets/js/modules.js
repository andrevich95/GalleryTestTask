//Sorting photos on AJAX
var sortForm ={
		initialize : function () {	
			this.setUpListeners();
		},
 
		setUpListeners: function () {
			$('#sorting').on('submit',sortForm.submitForm);
		},
 
		submitForm: function (e) {
			e.preventDefault();
			var form = $(this),submitBtn=form.find('button[type="submit"]');
			submitBtn.attr('disabled','disabled');
			var formData = {param : form.find('select[id="param"]').val(),order :form.find('select[id="order"]').val()};
			$.ajax({
				url : 'main/sort',
				type : 'POST',
				data : formData,
				success : function(data){
					$('.lib').html(data);
				}
			})
			.always(function(){submitBtn.removeAttr('disabled');});
		},

		validateForm: function(form){

		}
}
//Load photos to gallery on AJAX
var loadForm = {
		
		initialize : function () {			
			this.modules();
			this.setUpListeners();
		},
 
		modules: function () {
 
		},
 
		setUpListeners: function () {
			$('#form_photo').on('submit',loadForm.submitForm);
		},
 
		submitForm: function (e) {
			e.preventDefault();
			var form = $(this),submitBtn=form.find('button[type="submit"]');
			submitBtn.attr('disabled','disabled');

			var formData = new FormData(form[0]);
			$.ajax({
				url : 'add/add',
				enctype: 'multipart/form-data',
				type : 'POST',
				processData: false,
            	contentType: false,
            	cache: false,
				data : formData
			})
			.done(function(){$('form').html('<pre>Все выполнено успешно</pre>');})
			.always(function(){submitBtn.removeAttr('disabled');});
		},

		validateForm: function(form){

		},

		sendForm: function(){

		}		
		
}