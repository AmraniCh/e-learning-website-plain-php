$(document).ready(function(){

	$("#publish-post").click(function(){

		// post info
		var content = $("#post-content").val();
		var type = $("#type-post option:selected").html();
		var date_imp = null;
		if(type == 'Important')
			date_imp = $("#date-imp-post").val();

		// files upload
		var form_data = new FormData();
		var file_reader = new FileReader();
		file_reader.readAsDataURL(document.getElementById("file-post").files[0]);
		var file = document.getElementById("file-post").files[0];
		form_data.append("file",file);
		form_data.append("content",content);
		form_data.append("type",type);
		form_data.append("date_imp",date_imp);


		$.ajax({
			url: "includes/create_post.php",
			method: "POST",
			data: form_data,
			processData: false,
			contentType: false,
			beforeSend: function(){
			},
			success: function(){
				alert("success");
			}

		});

	});

});