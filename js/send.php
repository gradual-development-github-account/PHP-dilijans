<?php
	$eol = PHP_EOL;

	$to = 'info@dilijansdv.ru';
	// $to = 'max4tr@gmail.com';
	$subject = 'Заявка';

	$header  = 'From: Дилижанс' . $eol;
	$header .= 'Content-type: text/plain; charset="utf-8"' . $eol;
	$header .= 'MIME-Version: 1.0' . $eol;

	$message = '';

	if ($_POST['name']){$message .= 'Имя: ' . $_POST['name'] . $eol;}
	if ($_POST['tel']){$message .= 'Телефон: ' . $_POST['tel'] . $eol;}
	if ($_POST['mail']){$message .= 'Почта: ' . $_POST['mail'] . $eol;}
	if ($_POST['message']){$message .= 'Вопрос: ' . $_POST['message'] . $eol;}
	if ($_POST['formName']){$message .= 'Форма: ' . $_POST['formName'] . $eol;}

	$send = mail($to, $subject, $message, $header);

	if ($send) {
	// if ($send1 and $send2) {
		echo "<header class='modal-success_header'>Спасибо! Ваша заявка принята.</header><p class='modal-success_text'>Мы свяжемся с вами в ближайшее время.</p>";
	} else {
		echo "<header class='modal-success_header'>Ошибка!</header><p class='modal-success_text'>Перезагрузите страницу.</p>";
	}
?>