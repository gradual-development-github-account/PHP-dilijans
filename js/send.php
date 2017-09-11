<?php

	$eol = PHP_EOL;



	$subject = 'Заявка';



	$message = '';

	if ($_POST['name']){$message .= 'Имя: ' . $_POST['name'] . $eol;}
	if ($_POST['tel']){$message .= 'Телефон: ' . $_POST['tel'] . $eol;}
	if ($_POST['mail']){$message .= 'Почта: ' . $_POST['mail'] . $eol;}
	if ($_POST['message']){$message .= 'Вопрос: ' . $_POST['message'] . $eol;}
	if ($_POST['formName']){$message .= 'Форма: ' . $_POST['formName'] . $eol;}






		require '../php/PHPMailerAutoload.php';

		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		// Set PHPMailer to use the sendmail transport
		$mail->isSendmail();
		//Set who the message is to be sent from
		$mail->setFrom('dilijansdv.ru', '');

		//Set who the message is to be sent to
		$mail->addAddress('info@dilijansdv.ru', '');
		//Set the subject line
		$mail->Subject = $subject;

		//Replace the plain text body with one created manually
		$mail->Body = $message;

		//send the message, check for errors
		if (!$mail->send()) {
			  echo "<header class='modal-success_header'>Ошибка!</header><p class='modal-success_text'>Перезагрузите страницу.</p>";
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    echo "<header class='modal-success_header'>Спасибо! Ваша заявка принята.</header><p class='modal-success_text'>Мы свяжемся с вами в ближайшее время.</p>";
		}
