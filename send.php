<?php
	// Данные менять тут:
	// адрес созданной почты для домена от Яндекса
	$fromAddr			= 'info@dilijansdv.ru';
	// пароль к созданной почты
	$fromPass			= 'pzx1390090';
	// Имя сайта
	// $fromName		= 'Site Name';
	$fromName			= 'Дилижанс';
	// Адрес отправки заявок
	$to1				= 'algashkov@gmail.com';
	// $to1				= 'dil-al-@mail.ru';
	// if($_POST['mail']){
	// 	$toUser			= $_POST['mail'];
	// }
	// Тема завок с этого сайта
	$subject			= 'Заявка';
	// Заголовок уведомления об успешной отправке
	$formSuccessHead	= 'Спасибо! Ваша заявка принята.';
	// $formSuccessHead	= 'Thank you! We are processing your enquiry.';
	// Текс уведомления об успешной отправке
	$formSuccessText	= 'Мы свяжемся с вами в ближайшее время.';
	// $formSuccessText	= 'Our consultants will contact you soon.';
	// Заголовок уведомления об ошибке
	$formErrorHead	= 'Ошибка!';
	// $formErrorHead	= 'Error!';
	// Текс уведомления об ошибке
	$formErrorText	= 'Перезагрузите страницу.';
	// $formErrorText	= 'Please reload the page.';
	// --------------------------------------------------- //

	$message = '';
	if($_POST['name']){$message.="Имя: " . $_POST['name']."\r\n";}
	if($_POST['tel']){$message.="Телефон: " . $_POST['tel']."\r\n";}
	if($_POST['mail']){$message.="Почта: " . $_POST['mail']."\r\n";}
	if($_POST['message']){$message.="Вопрос: " . $_POST['message']."\r\n";}
	if($_POST['formName']){$message.="Форма: " . $_POST['formName']."\r\n";}

	// Success Head & Text
	if($_POST['formSuccessHead']){$formSuccessHead = $_POST['formSuccessHead'];}
	if($_POST['formSuccessText']){$formSuccessText = $_POST['formSuccessText'];}
	if($_POST['formErrorHead']){$formErrorHead = $_POST['formErrorHead'];}
	if($_POST['formErrorText']){$formErrorText = $_POST['formErrorText'];}

	// from calc
	if($_POST['street']){$message .= "Улица: " . $_POST['street']."\r\n";}
	if($_POST['house']){$message .= "Дом: " . $_POST['house']."\r\n";}
	if($_POST['length']){$message .= "Длина стрелы: " . $_POST['length']."\r\n";}
	if($_POST['time']){$message .= "Время работы: " . $_POST['time']."\r\n";}

	$message.="---------------------------------"."\r\n";

	require 'PHPMailerAutoload.php';
	$mail = new PHPMailer();
	$mail->CharSet = 'UTF-8';
	$mail->IsSMTP();
	$mail->Host = 'smtp.yandex.ru';
	// $mail->SMTPSecure = 'ssl';
	// $mail->Port = 25;
	$mail->SMTPAuth = true;
	$mail->Username = $fromAddr;
	$mail->Password = $fromPass;
	$mail->SetFrom($fromAddr, $fromName);
	$mail->AddAddress($to1);
	// $mail->AddAddress($to2);
	$mail->Subject = $subject;
	// $mail->isHTML(true);
	$mail->Body    = $message;
	// $mail->AltBody = 'Альтернативное тестовое сообщение без поддержкой тегов';

	// Add attachments
	// if(isset($_FILES['file'])&& ($_FILES['file']['error'] == UPLOAD_ERR_OK)){
	// 	$mail->AddAttachment($_FILES['file']['tmp_name'],$_FILES['file']['name']);
	// }

	if($mail->Send()){
	// if(($mail->Send())&&($mailUser->Send())){
		// echo "<header class='modal-success_header'>Спасибо! Ваша заявка принята.</header><p class='modal-success_text'>Мы свяжемся с вами в ближайшее время.</p>";
		echo "<header class='modal-success_header'>" . $formSuccessHead . "</header><p class='modal-success_text'>" . $formSuccessText . "</p>";
		// echo 'true';
	}else{
		// echo "<header class='modal-success_header'>Ошибка!</header><p class='modal-success_text'>Перезагрузите страницу.</p>";
		echo "<header class='modal-success_header'>" . $formErrorHead . "</header><p class='modal-success_text'>" . $formErrorText . "</p>";
		// echo 'false';
	}

?>
