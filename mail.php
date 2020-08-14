<?php
    /* apenas dispara o envio do formulário caso exista $_POST['enviarFormulario']*/
    if (isset($_POST['enviarFormulario'])){
    
    /*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/
    
    $enviaFormularioParaNome = 'Contato Tribus Tech';
    $enviaFormularioParaEmail = 'contato@tribus.tech';
    $caixaPostalServidorNome = 'WebSite | Formulário';
    $caixaPostalServidorEmail = 'contato@tribus.tech';
    $caixaPostalServidorSenha = 'tR!Bu}121915';
    
    /*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/ 
    /* abaixo as variaveis principais, que devem conter em seu formulario*/
    
    $remetenteNome  = $_POST['fname'];
    $remetenteEmail = $_POST['email'];
    $assunto  = $_POST['service'];
    $mensagem = n12br($_POST['subject']);
    
    
    $mensagemConcatenada = 'Formulário gerado via website'.'<br/>';
    $mensagemConcatenada .= '-------------------------------<br/><br/>';
    $mensagemConcatenada .= 'Nome: '.$remetenteNome.'<br/>';
    $mensagemConcatenada .= 'E-mail: '.$remetenteEmail.'<br/>';
    $mensagemConcatenada .= 'Assunto: '.$assunto.'<br/>';
    $mensagemConcatenada .= '-------------------------------<br/><br/>';
    $mensagemConcatenada .= 'Mensagem: "'.$mensagem.'"<br/>';
    
    /*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/
    
    require ('class.phpmailer.php');
    
    $mail = new PHPMailer();
    
    $mail->IsSMTP();
    $mail->SMTPAuth  = true;
    $mail->Charset   = 'utf8_decode()';
    $mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
    $mail->Port  = '587';
    $mail->Username  = $caixaPostalServidorEmail;
    $mail->Password  = $caixaPostalServidorSenha;
    $mail->From  = $caixaPostalServidorEmail;
    
    $mail->FromName  = utf8_decode($caixaPostalServidorNome);
    $mail->IsHTML(true);
    $mail->Subject  = utf8_decode($assunto);
    $mail->Body  = utf8_decode($mensagemConcatenada);
    $mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));
    
    if(!$mail->Send()){
        $mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
    }else{
        $mensagemRetorno = 'Formulário enviado com sucesso!';
    }
    }
?>
    
    