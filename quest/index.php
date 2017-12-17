<?session_start();

$mysqli = new mysqli('localhost','root','','TestSQL');
function tree($row,$mysqli){
	echo "<ul class='com'>
	<li>
	<b class='name'>".$row['name']."</b><br/>
	".$row['text']."
	</li><br/>
	<div><span class='reply' id='".$row['id']."'>Ответ</span></br>
	<span class='delet' id='".$row['id']."' title='".$row['name']."'>удалить</span></div>";
		$secondRes = $mysqli->query("SELECT * FROM `comments` WHERE second_id=".$row['id']);
			while (($key = $secondRes->fetch_assoc()) == true) {
				tree($key,$mysqli);
		}
	echo "</ul>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>comment</title>
	<script type="text/javascript" src="javaScr/jquery-3.2.1.js" >
		
	</script>
	<link rel="stylesheet" type="text/css" href="/css/MainStyle.css">
</head>



<body>
<div id="AuthReg">
	<?if(isset($_SESSION['login'])){
		echo '<a href="/auth/logout.php" class="but">Выход</a>';
		echo '<p>здравствуйте <span id="login">'.$_SESSION["login"].'</span></p>';
		}
		else{
			echo '	<a href="/auth.php" class="but">Авторизация</a>
	<a href="/reg.php" class="but">Регистрация</a>';
		}
		?>
</div>
		<img src="RRUe0Mo.png">
		<div id="comment">
			<textarea cols="25" rows="4" class="message" placeholder="вбейте сообщение и нажмите отправить или Ответ"></textarea><br/>
			<input type="button" name="send" id="send" value="Отправить">
			<div id="errorMessage"></div>
			<?
				$mysqli = new mysqli('localhost','root','','TestSQL');
				$result = $mysqli->query("SELECT * FROM `comments` WHERE second_id=0 ORDER BY `comments`.`id` DESC");

				while (($row = $result->fetch_assoc()) == true){
				tree($row,$mysqli);
				}	
			?>
		</div>
<script type="text/javascript">
	
</script>
<script type="text/javascript" src="AjaxScr.js">
</script>
</body>
</html>