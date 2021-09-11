<?php
    if(isset($_POST['enviar'])){//si el botón con el name enviar es pulsado
        if(!empty($_POST['name'])&& !empty($_POST['email'])&& !empty($_POST['subject'])&& !empty($_POST['message'])){
        //si no están vacios los inputs name, email y msg 
        //guardo el contenido de cada campo en variables
            $nombre=$_POST['name'];
            
            $email=$_POST['email'];
            $subject=$_POST['subject'];
            $asunto="[ARIAS WEB] Has recibido un contacto de [".$nombre." ]";//puedo poner un input asunto o crearlo yo directamente  
            $msg="Nombre: ".$nombre."\r\n";
            
            $msg.="Email: ".$email."\r\n";
            $msg.="Asunto: ".$subject."\r\n";
            $msg.="Mensaje: ".$_POST['message'];
            $header="From: ".$email."\r\n";//la persona que escribió me dejo su email, entonces el remitente es ese email
            $header.="Reply-To: noreply@example.com"."\r\n";//Le mando un no responder o noreply
            $header.="X-Mailer: PHP/".phpversion();
            $tuCasilla="ariasbc2011@gmail.com";
            $mail=mail($tuCasilla,$asunto,$msg,$header);//en "tu mail" tenes que colocar tu casilla de email de consultas,es decir, la casilla en la cual vas a recibir las consultas que deja la gente en tu página
            if($mail){// si el email se mando respondo éxito con javascript
                echo "<script>
                        alert('Gracias por tu contacto! En breves nos estaremos comunicando');
                        window.location='index.html'
                        </script>";
            }else{//si no se pudo enviar el email lo notifico
                echo "<script>
                        alert('Lamentamos decirle que no hemos podido enviar su consulta');
                        window.location='index.html'
                        </script>";
            }
        }
        else{//si los parámetros están vacios, aunque podemos controlar esto con required
            echo "<script>
            alert('Error faltan parametros');
                    window.location='index.html'
                  </script>"; 
        }
    }  
?>