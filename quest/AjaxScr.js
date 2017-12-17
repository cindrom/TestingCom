	var session=$("#login").text();
	console.log(session);
	function funcBefore() {
			$("#errorMessage").text("Ожидание....");
		}

		function funcSuccess(data){
			$("#errorMessage").text(data);
			if (data != "Авторизуйтесь" && data != "Введите сообщение") {
				$("#errorMessage").after(function() {
				return "<ul class='com'><li><b class='name'>"+$('#login').text()+"</b><br/>"+$('textarea.message').val()+"</li></br><a href='' id="+$(this).attr('id')+">Ответ</a>";
			});
			}
		}

		function funcSuccess2(data){
			$("#errorMessage").text(data);
			if (data != "Авторизуйтесь" || data != "Введите сообщение") {
				$("#"+data+"").after(function() {
				return "<ul class='com'><li><b class='name'>"+$('#login').text()+"</b><br/>"+$('textarea.message').val()+"</li></br><a href='' id="+$(this).attr('id')+">Ответ</a>";
			});
			}
		}

		function funcSuccess3(data){
			$("#errorMessage").text(data);
		}



			$('#send').on('click',function(){
				$.ajax({
					url:"/comment/comment.php",
					type:"POST",
					data:({
					message:$('textarea.message').val(), name:$('#login').text()
					}),
					dataType:'html',
					beforeSend: funcBefore,
					success:funcSuccess
				});
			});
			$(".reply").on("click", function(){
				$.ajax({
					url:"/comment/comment.php",
				type:"POST",
				data:({
					message:$('textarea.message').val(), name:$('#login').text(),
					second_id: $(this).attr('id')
				}),
					dataType:'html',
					beforeSend: funcBefore,
					success:funcSuccess2
				});				
			});

			$(".delet").on("click", function(){
				$.ajax({
					url:"/comment/comDel.php",
				type:"POST",
				data:({
					id: $(this).attr('id'), comentLog: $(this).attr('title'), login:session
				}),
					dataType:'html',
					beforeSend: funcBefore,
					success:funcSuccess3
				});				
			});