//Sorting photos on AJAX
var sortForm ={
		initialize : function () {	
			this.setUpListeners();
		},
 
		setUpListeners: function () {
			$('#sorting').on('click',sortForm.submitForm);
		},
 
		submitForm: function (e) {
			e.preventDefault();
			$(this).attr('disabled','disabled');
			var formData = {param : $('#param').val(),order :$('#order').val()};
			$.ajax({
				url : 'main/sort',
				type : 'POST',
				data : formData,
				success : function(data){
					$('#main_body').html(data);
					sortForm.initialize();
					removeItem.initialize();
					editItem.initialize();
				}
			})
			.always(function(){$(this).removeAttr('disabled');});
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
				data : formData,
				success : function(data){
					$('#main_body').html(data);
				}
			})
			.always(function(){submitBtn.removeAttr('disabled');});
		}			
}

var removeItem={
	initialize : function () {			
			this.modules();
			this.setUpListeners();
		},

		modules: function () {
 
		},
 
		setUpListeners: function () {
			$('.remove-item').on('click',removeItem.rm);
		},

		rm: function(){
			$(this).attr('disabled','disabled');
			var yes = confirm('Вы уверенны?');

			if(yes == true){
				$.ajax({
					url : 'main/delete',
					type : 'POST',
					data : {id:$(this).parents('.thumbnail').attr('id')}
				})
				.done(function(){$('#main_body').html('<div class="alert alert-success"><p>Успешно удален файл</p></div>');});

			}
			else{
				$(this).removeAttr('disabled');
			}
		}
 
}

var editItem = {
	initialize : function () {			
			this.modules();
			this.setUpListeners();
		},

		modules: function () {
 
		},
 
		setUpListeners: function () {
			$('.edit-item').on('click',editItem.edit);
		},

		edit : function(){
			$(this).attr('disabled','disabled');
			var str ='<div class="img-pre"><img class="img-rounded" src="'+$(this).parents('.thumbnail').find('img').attr('src')+'"></div><form class="form-horizontal" id="edit_form" method="post"><div class="form-group"><label for="comment_holder">Комментарий</label><textarea id="'+$(this).parents('.thumbnail').attr('id')+'" name="comment" placeholder="Комментарий к фото" class="form-control" cols="20" rows="5" maxlength="200">'+$(this).parents('.thumbnail').find('p').text()+'</textarea></div><button type="submit" class="btn btn-success">Сохранить комментарий</button></form>';
			$('#main_body').html(str);
			sendData.initialize();
		}
}

var sendData = {
		initialize : function () {
			this.modules();
			this.setUpListeners();
		},

		modules: function () {
 
		},
 
		setUpListeners: function () {
			$('#edit_form').on('submit',sendData.editing);
		},

		editing : function(e){
			e.preventDefault();
			var form = $(this) , submitBtn=form.find('button[type="submit"]');
			submitBtn.attr('disabled','disabled');
			$.ajax({
					url : 'main/update',
					type : 'POST',
					data : {id:form.find('textarea').attr('id'),text:form.find('textarea').val()}
			})
			.done(function(){$('#main_body').html('<div class="alert alert-success"><p>Успешно изменен комментарий</p></div>');});
			submitBtn.removeAttr('disabled');
		}
}



