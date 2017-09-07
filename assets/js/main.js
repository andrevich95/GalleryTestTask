$(document).ready(function (){
	$('#send_photo').click(function(){
		var str = $("#form_photo").serialize();
		//data: {data:str};
	});
	$('#sort').click(function(){
		alert(1);
		//sorting($('#param').val(),$('#order').val());
	});


});
function load(param,order){
	//var str = $("#form_photo").serialize();
	var form = document.forms.form_photo;
    var formData = new FormData(form); 
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "main");
    xhr.onreadystatechange = function() {
    	if (xhr.readyState == 4) {
    		if(xhr.status == 200) {
    			data = xhr.responseText;
    			if(data == "true") {
                }
            }
        };
    xhr.send(formData);

}
function sorting(param,order){
	$.post('main',{by:param,order:order},function(data){});
}