<?php

error_reporting(E_ALL);  

$ToName    = trim(stripslashes(strip_tags($_POST["toname"]))); 
$ToEmail   = trim(stripslashes(strip_tags($_POST["toemail"]))); 

$FromName  = trim(stripslashes(strip_tags($_POST["fromname"]))); 
$FromEmail = trim(stripslashes(strip_tags($_POST["fromemail"])));  

 

//  TEST 1 

$email = "$ToName <$ToEmail>";
$from  = "$FromName <$FromEmail>";

$subject="Testing HEFS Minimal Mail Functionality #1 V2.2.5";
$message="HEFS Minimal Mail Functionality for Test #1 Seems to Be Working!";

if(mail("$email","$subject","$message","From: $from")){
    echo "email #1 sent !!! </br>";
}else{
    echo "email #1 error !!! </br></br>";
    echo "This failure is serious, but MAY not be fatal.</br>";
    echo "IF emails #2 and #3 are sent and received, there MAY be a fix for this error</br>";
    echo "Be sure to read the section in the manual on the test results for this test and</br>";
    echo "also read about the parameter PleasEForgiveMyUseOfAWindowsServer.</br>";
    echo "I added this special variable in order to let the script function</br>";
    echo "even on broken Windows servers. </br>";
    echo "But remember, in order for this to be fixable,</br>";
    echo "emails #2 and #3 must be sent and received.</br>";
    echo "If they are not, do not pass go and do not collect $200.</br>";
}



//  TEST 2

$email = "$ToEmail";
$from  = "$FromEmail";

$subject="Testing HEFS Minimal Mail Functionality #2 V2.2.5";
$message="HEFS Minimal Mail Functionality for Test #2 Seems to Be Working!";

if(mail("$email","$subject","$message","From: $from")){
    echo "email #2 sent !!! </br>";
}else{
    echo "email #2 error !!! </br></br>";
    echo "Do not proceed without resolving this issue.</br>";
    echo "You must resolve this issue or the script will not function on your host.</br>";
    echo "This is not a script issue per se, and may be fixable by your host.</br>";
    echo "For example, your host may have turned off</br>";
    echo "some feature and may just need to turn it on for you.</br>";
    echo "On the other hand, some hosts intentionally cripple this function.</br>";
    echo "If you cannot resolve this issue, do not proceed.</br>";
    echo "Unless you can resolve this issue, the script will not work.</br>";
}



//  TEST 3

$email = "$ToEmail";

$subject="Testing HEFS Minimal Mail Functionality #3 V2.2.5";
$message="HEFS Minimal Mail Functionality for Test #3 Seems to Be Working!";

if(mail("$email","$subject","$message")){
    echo "email #3 sent !!! </br>";
}else{
    echo "email #3 error !!! </br></br>";
    echo "Do not proceed without resolving this issue.</br>";
    echo "You must resolve this issue or the script will not function on your host.</br>";
    echo "This is not a script issue per se, and may be fixable by your host.</br>";
    echo "For example, your host may have turned off</br>";
    echo "some feature and may just need to turn it on for you.</br>";
    echo "On the other hand, some hosts intentionally cripple this function.</br>";
    echo "If you cannot resolve this issue, do not proceed.</br>";
    echo "Unless you can resolve this issue, the script will not work.</br>";
}


?>
