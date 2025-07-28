<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = 'johnkaz';
    $password = 'SMSposi!1';
    $from = urlencode('mysite');
    $to = '306971745355';
    $text = urlencode('Hello Giannis');

    $url = "http://www.smsbox.gr/httpapi/sendsms.php?coding=UTF8&username=$username&password=$password&from=$from&to=$to&text=$text";

    $response = file_get_contents($url);
    $message = "Απάντηση από server: " . htmlspecialchars($response);
}
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <title>Αποστολή SMS</title>
</head>
<body>
    <h2>Αποστολή SMS με SMSBOX</h2>
    <?php if (!empty($message)): ?>
        <p><strong><?= $message ?></strong></p>
    <?php endif; ?>
    <form method="POST">
        <button type="submit">Στείλε SMS στον Giannis</button>
    </form>
</body>
</html>
