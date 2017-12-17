<?
	setlocale(LC_ALL, 'ru_RU.utf8');
	Header("Content-Type: text/html;charset=UTF-8");
	$mysqli = new mysqli('localhost','root','','TestSQL');
	$errorMessage = array();
	if ($_POST['name'] == false) {
		echo "Авторизуйтесь";
	}else{
	if ($_POST['message'] == false) {
		echo "Введите сообщение";
	}else{
		$mysqli -> query('INSERT INTO `comments` (`id`,`name`,`text`,`second_id`) VALUES (
		NULL,"'.$_POST['name'].'","'.$_POST['message'].'","'.$_POST['second_id'].'")');
		echo $_POST['second_id'];
	}
}
?>