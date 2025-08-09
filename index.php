<?php
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = 'name';
    $password = 'password';
    $from = urlencode('mysite');

    $to = isset($_POST['phone']) ? urlencode(trim($_POST['phone'])) : '';
    $name = isset($_POST['user']) ? trim($_POST['user']) : '';
    $text = urlencode("Hello " . $name);

    if (!empty($to) && !empty($name)) {
        $url = "http://www.smsbox.gr/httpapi/sendsms.php?coding=UTF8&username=$username&password=$password&from=$from&to=$to&text=$text";

        $response = file_get_contents($url);
        $message = "Response from server: " . htmlspecialchars($response);
    } else {
        $message = "Please enter phone number.";
    }
}
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <title>SMS SENDER</title>
</head>
<body>
    <h2>SMS SENDING VIA SMSBOX</h2>

    <?php if (!empty($message)): ?>
        <p><strong><?= $message ?></strong></p>
    <?php endif; ?>

    <form method="POST">
        <label for="user">Username:</label>
        <input type="text" id="user" name="user" placeholder="Γράψτε όνομα" required>
        <br><br>

            <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" placeholder="Γράψτε αριθμό τηλεφώνου" required>
        <br><br>

        <button type="submit">Send SMS</button>
    </form>
</body>
</html>
