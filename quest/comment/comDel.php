<?
	function treeDel($row,$mysqli){
		$res = $mysqli->query("DELETE FROM `comments` WHERE `comments`.`id`=".$row['id']);
		$secondRes = $mysqli->query("SELECT * FROM `comments` WHERE `second_id`=".$row['id']);
			while (($key = $secondRes->fetch_assoc()) == true) {
				treeDel($key,$mysqli);
		}
	echo "</ul>";
}






	setlocale(LC_ALL, 'ru_RU.utf8');
	Header("Content-Type: text/html;charset=UTF-8");
	$mysqli = new mysqli('localhost','root','','TestSQL');




	if ($_POST['comentLog'] == $_POST['login']) {
			$secondRes = $mysqli->query("SELECT * FROM `comments` WHERE `comments`.`id`=".$_POST['id']);
			while (($key = $secondRes->fetch_assoc()) == true) {
				treeDel($key,$mysqli);
		}
			echo $_POST['comentLog'];
	}
	else{
		echo "Это не ваш коммент";
	}
	/*
	$mysqli->query("DELETE FROM `comments` WHERE `comments`.`id` = ".$_POST['id']);
	$mysqli->query("DELETE FROM `comments` WHERE `comments`.`id` = ".$_POST['id']);
	*/
?>