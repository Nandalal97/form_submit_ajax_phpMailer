<?php 
          $errors = [];
          $data = [];
          $flag=false;

          if (empty($_POST['name'])) {
              $errors['name'] = 'Name is required.';
              $flag=true;
          }

          if (empty($_POST['phone'])) {
              $errors['phone'] = 'phone is required.';
              $flag=true;
          }

          if (!empty($errors)) {
              $data['success'] = false;
              $data['errorsForm'] = $errors;
          } else {
              $data['success'] = true;
              $data['message'] = ' <h2>Thank you!</h2> <br>
              Your message has been successfully sent. We will contact you very soon!';
          }

          echo json_encode($data);
          

      use PHPMailer\PHPMailer\PHPMailer;

        require_once 'PHPMailer/src/Exception.php';
        require_once 'PHPMailer/src/PHPMailer.php';
        require_once 'PHPMailer/src/SMTP.php';
        // require 'vendor/autoload.php';

        $mail = new PHPMailer(true);
         $alert ='';


        if($flag == false){
          if(isset($_POST["phone"])){
            $name=$_POST["name"];
            $phone=$_POST["phone"];
            $date=$_POST["date"];
            $gender=$_POST["gender"];
            $age=$_POST["age"];
            $time=$_POST["time"];
            $message=$_POST["message"];
            $mailTtle=$_POST["mailTitle"];
            try{
                $mail ->isSMTP();
                $mail ->Host = 'smtp.gmail.com';
                $mail ->SMTPAuth = 'true';
                $mail ->Username = 'twdhpl@gmail.com';
                $mail ->Password = 'dzkc wwof zryb ysoz';
                $mail ->SMTPSecure = 'tls';
                $mail ->Port = '587';
                $mail->setFrom('twdhpl@gmail.com');
                $mail->addAddress('twdhpl@gmail.com');
                $mail->isHTML(true);
                $mail->Subject = $mailTtle;
                $body='';
                if($name){
                  $body .='name : '.$name;
                }
                if($phone){
                  $body .='<br> Phone: '.$phone;
                }
                
                if($date){
                  $body .='<br> Date: '.$date;
                }
                if($gender){
                  $body .='<br> Gender: '.$gender;
                }
                if($age){
                  $body .='<br> Age: '.$age;
                }
                
                if($time){
                  $body .='<br> Timet: '.$time;
                }
                
                if($message){
                  $body .='<br> Message: '.$message;
                }


                $mail->Body = "<h2> $mailTtle </h2>".$body;
                $mail->send();
              
                //  $alert="Message Sent! Thankyou for contact us";

            }
            catch(Exception $e){
              $alert =$e->getMessage();
          };

        }

        }

        ?>
