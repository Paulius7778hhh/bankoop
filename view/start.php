<?php 
        echo '<br>';
        print_r($_SESSION['valid'] = true);
        echo '<br>';
        print_r($_SESSION['timeout'] = time());
        echo '<br>';
        print_r($_SESSION['username'] = 'Pastiliu');
?>
<h1>Welcome to Lbank</h1>

<form action="<?= URL ."check/login" ?>" method="POST">
        
        <div><input type="text" name="email" placeholder="email"></div>
        <div><input type="password" name="password" placeholder="password"></div>
        <div><button type="submit">Log in</button></div>
         </form>

         <p>If you want create new account go -><a href='http://lbank.lt/createaccount'>here</a></p>

         