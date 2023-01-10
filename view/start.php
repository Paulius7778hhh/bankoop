<?php echo '<pre>'; 
$data = unserialize(file_get_contents(__DIR__ . '\..\app\DB\Accounts'));
print_r($_SERVER);
print_r($data);
?>
<h1>Welcome to Lbank</h1>

<form action="<?= URL ."Check/login" ?>" method="POST">
        
        <div><input type="text" name="name" placeholder="email"></div>
        <div><input type="password" name="password" placeholder="password"></div>
        <div><button type="submit">Log in</button></div>
         </form>

         <p>If you want create new account go -><a href='http://lbank.lt/createaccount'>here</a></p>

         