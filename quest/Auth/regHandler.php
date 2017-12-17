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
			$errorMessage[] = "Логин уже существует";
			break 1;
		}
		if ($_POST['pass'] != $_POST['passRepeat']) {
			$errorMessage[] = "Пароли не совпадают";
			break 1;
		}
		if ($errorMessage == false) {
			$errorMessage[] = "Вы успешно зарегистрировались";
			$mysqli->query("INSERT INTO `user` (`id`, `name`, `password`) VALUES (NULL, '".$_POST['login']."', '".md5($_POST['pass'])."');");
		}
}
		echo $errorMessage[count($errorMessage) - 1];
?>