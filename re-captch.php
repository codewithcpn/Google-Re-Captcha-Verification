

 ==============  Start Header file  ===================

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
   <script src="https://www.google.com/recaptcha/api.js"></script>  



===============  End Footer file    ===================

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
 <?php            
           
   
    if(isset($_POST['g-recaptcha-response']))
    {
        $secretkey = '6Lek1RclAAAAAL4LFhz5Ns30aJsgVKHyr6YLCl95';
        $ip = $_SERVER['REMOTE_ADDR'];
        $response = $_POST['g-recaptcha-response'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remoteip=$ip";
        $fire = file_get_contents($url);
    }
    else
    {
        // echo '<script> swal("Cancelled","Failed to Submit,"error")</script>';  
    }
            
               if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $services = $_POST['services'];
                $city = $_POST['city'];
                $msg = $_POST['msg'];
                
                $to ="info@igennetworks.in";
                $from =$email;
                $html="<!DOCTYPE html>
                            <html>
                             <head>
                            <style>
                            table, th, td
                            {
                                border:2px solid #000;
                                padding:5px;
                                
                            }
                            </style>
                                    <meta charset='utf-8'>
                                    <title></title>
                                </head>
                                <body>
                                    <table style='border-collapse: collapse; width:70%'>
                                         <th style='text-align:center; ' colspan='2'>Customer Enquiry Details</th>
                                         <tr><th>Name:</th><td>$name</td></tr>
                                         <tr><th>Email:</th><td>$email</td></tr>
                                         <tr><th>Phone:</th><td>$phone</td></tr>
                                         <tr><th>Services:</th><td>$services</td></tr>
                                         <tr><th>City:</th><td>$city</td></tr>
                                         <tr><th>Message:</th><td>$msg</td></tr>
                                    </table>
                                </body>
                            </html>
                ";
                $subject = "iGEN Networks - Customer Contact Us Details";
                $message = $html;
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= "From: ".$email;
            
                //  mail($to,$subject,$message,$headers);
            
            
                 if(mail($to,$subject,$message,$headers))
                 {
                     ?>
                        <script>
                            swal("Thanks for your interest!", "We contact you shortly", "success", {
                              button: "Ok",
                         
                            });
                        </script>
                    <?php

                            }
                            else{
                            ?>
                        <script>
                            swal("Oh No!", "Please try again", "error", {
                             button: "Ok",
                            });
                          </script> 
                          <?php
                         }
                       }
                     ?>




  ==============================    Javascript  =======================

      <script>
    $(document).on('click','#submit',function(){
      var response = grecaptcha.getResponse();
        if(response.length == 0)
          {                       
             swal("Dangerous!", "Please verify you are not a robot!", "error", { button: "Ok",});                  

          }
      });


  </script>

  ============================   End ========================================

   
