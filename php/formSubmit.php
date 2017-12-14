<?php
// Variables

// mail() syntax is mail(to,subject,message,headers,parameters)
$toRecipient = "thattechnokid@gmail.com";
$fromName = $_POST['name-user'];
$subjectLine = "New Website Form Response From: $fromName!";
$fromEmail = $_POST['email'];
$fromPhone = $_POST['phone'];
$fromMessage = $_POST['message'];
$message = "Persons Name: $fromName \n\n Their Email: $fromEmail \n\n Their Phone Number: $fromPhone \n\n Their Message To You: $fromMessage \n";
// Mail Function
mail($toRecipient,$subjectLine,$message);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Test</title>
    <style type="text/css">
      .back-btn{
        width: 80px;
        /* position: absolute; */
        /* bottom: -50px; */
        background: #5136ea;
        color: #efefef;
        height: 30px;
        border-radius: 15px;
        border: 1px solid #999;
        font-size: 14px;
        font-weight: bold;
      }
      .back-btn:hover{
        background: #efefef;
        color: #5136ea;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <p>Thank You For Sending Me a Message!<br>Please Click The Button Below To Go Back To the Website:</p>
    <br>
    <form action="file:///Users/ThatTechnoKid/github/Websites for Beginners/Final Project/contact.html">
        <input type="submit" value="< Back" class="back-btn">
    </form>
  </body>
</html>
