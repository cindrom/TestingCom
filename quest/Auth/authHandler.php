<?
	session_start();
	setlocale(LC_ALL, 'ru_RU.utf8');
	Header("Content-Type: text/html;charset=UTF-8");
	$mysqli = new mysqli('localhost','root','','TestSQL');
	$errorMessage = array();
	$result = $mysqli->query("SELECT * FROM `user`");

	while (($row = $result->fetch_assoc()) == true) {
		if (empty($_POST['login'])) {
			$errorMessage[] = "Введите логин";
			break 1;
		}

		if ($_POST['login'] == $row['name']) {
			if (md5($_POST['pass']) != $row['password']) {
			$errorMessage[] = "Такой комбинации логина и пароля нету";
		}
		else{
			$_SESSION['login'] = $_POST['login'];
			$errorMessage[] = "успех";
			break 1;
		}
		}
		else{
			$errorMessage[] = "Такой комбинации логина и пароля нету";
		}
}
		echo $errorMessage[count($errorMessage) - 1];
?>