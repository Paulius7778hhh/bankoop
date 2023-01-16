<h1>Welcome to Lbank</h1>

<div style="color:red;"><?= $message['text'] ?? '' ?></div>

<form action="<?= URL . "check/login" ?>" method="POST">

       <div><input type="text" name="email" placeholder="email"></div>
       <div><input type="password" name="password" placeholder="password"></div>
       <div><button type="submit">Log in</button></div>
</form>

<p>If you want create new account go -><a href='http://lbank.lt/createaccount'>here</a></p>
<?php

$data = unserialize(file_get_contents(__DIR__ . '\..\app\DB\Accounts'));
echo '<pre>';
print_r($data);
?>