<?php
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = 'johnkaz';
    $password = 'SMSposi!1';
    $from = urlencode('mysite');

    $to = isset($_POST['phone']) ? urlencode(trim($_POST['phone'])) : '';
    $name = isset($_POST['user']) ? trim($_POST['user']) : '';
    $text = urlencode("Hello " . $name);

    if (!empty($to) && !empty($name)) {
        $url = "http://www.smsbox.gr/httpapi/sendsms.php?coding=UTF8&username=$username&password=$password&from=$from&to=$to&text=$text";

        $response = file_get_contents($url);
        $message = "Απάντηση από server: " . htmlspecialchars($response);
    } else {
        $message = "Παρακαλώ εισάγετε όνομα και αριθμό τηλεφώνου.";
    }
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
        <label for="user">Όνομα χρήστη:</label>
        <input type="text" id="user" name="user" placeholder="Γράψτε όνομα" required>
        <br><br>

        <label for="phone">Αριθμός τηλεφώνου:</label>
        <input type="text" id="phone" name="phone" placeholder="Γράψτε αριθμό τηλεφώνου" required>
        <br><br>

        <button type="submit">Στείλε SMS</button>
    </form>
</body>
</html>
