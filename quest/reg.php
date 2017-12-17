<?
session_start();
if (isset($_SESSION['login'])){
			header('Location: ../index.php');
		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>auth</title>
	<link rel="stylesheet" type="text/css" href="/css/MainStyle.css">
	 <script type="text/javascript" src="javaScr/jquery-3.2.1.js" ></script>
</head>
<body>
<header>
	<a href="../index.php" class="but">На главную</a>
</header>


<div class="conteiner">
<div class="form">
		<input type="text" id="login" name="login" placeholder="Введите логин" />	
		<input type="password" id="pass" name="pass" placeholder="Введите пароль">
		<input type="password" id="passRepeat" name="passRepeat" placeholder="Повторите пароль пароль"><br/>
		<input type="button" name="send" id="send" value="Отправить">
		<p id="message">Заполните данные и нажмите отправить</p>
	</div>
</div>
<script type="text/javascript">
	function funcBefore(){
		$('#message').text("Ожидаем");
	}

	function funcSuccess(data){
		$('#message').text(data);
		if (data == "Вы успешно зарегистрировались") {
			document.location.replace("/index.php");
		}
	}

	$('#send').on('click',function(){
		$.ajax({
			url:"/auth/regHandler.php",
			type:"POST",
			data:({
				login: $('#login').val(), pass: $('#pass').val(), passRepeat: $('#passRepeat').val()
			}),
			dataType:'html',
			beforeSend: funcBefore,
			success:funcSuccess
		});
	});
</script>
</body>
</html>