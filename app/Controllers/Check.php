<?php 
namespace Start\controllers;
use Start\App;
use Start\controllers\Bankcalc;

class Check {
    public function login()
    {
            $email = $_POST['email']; 
            $password = $_POST['password'];
            $data = unserialize(file_get_contents(__DIR__ . '\..\DB\Accounts'));
        if($_POST['email'] == null && $_POST['password'] == null){
                echo '<h1> type in email and password </h1>';
                die;
            } elseif ($_POST['email'] == null) {
                echo '<h1> type in email </h1>';
                die;
            } elseif ($_POST['password'] == null) {
                echo '<h1> type in password </h1>';
                die;
        }
    $res = search($data, 'email', 'password');
  
    foreach ($res as $var) {
    echo $var["email"]." - ".$var['email'] . "<br>";
    die;
}
        
        return (new Bankcalc)->menu();
    } 

    public function logout() {  
        $_SESSION['login'] = false;  
        session_destroy();  
    }  
    
    public function checkin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = unserialize(file_get_contents(__DIR__ . '\..\DB\Accounts'));
            if (preg_match('/^[a-zA-ZąĄčČęĘėĖįĮšŠųŲūŪžŽ\s]{3,}$/', $_POST['name'])) {  
                
                $_POST['name'] = ucfirst($_POST['name']);

            }
            else{
                //App::redirect('createaccount');
                echo '<h1> NAME </h1>';
                die;
            }
        }

        if (preg_match('/^[a-zA-ZąĄčČęĘėĖįĮšŠųŲūŪžŽ]{4,}$/', $_POST['surname'])) {
                $_POST['surname'] = ucfirst($_POST['surname']);
            } else  {
            //App::redirect('createaccount');
            echo '<h1> SURNAME </h1>';
            die;
        }

            $_POST['username'] = $_POST['name'] . $_POST['surname']; 

        foreach($data as $user){
        if ($user['username'] == $_POST['username']) {
            //App::redirect('createaccount');
            echo '<h1> Already is user with that name and surname  </h1>';
                die;
            } else {
                $_POST['username'];
            
            }
        }
        
            $personal_id = (int) $_POST['personal-id-number'];
        
        if (preg_match('/^[1-6]\d{2}(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])\d{4}$/', $_POST['personal-id-number'])) {
        
            foreach ($data as $id) {
            if ($id['personal-id-number'] == $_POST['personal-id-number']) {
                //App::redirect('createaccount');
                echo '<h1> Already is number </h1>';
                die;
                }
            }
                
                $personal_id = (int) $_POST['personal-id-number'];
    
            } else {
            //App::redirect('createaccount');
            echo '<h1> Shity number </h1>';
            die;
        }
  
            $balance = $_POST['balance'] = 0;
        

        if($_POST['email'] == empty($_POST['email']))  {
            echo '<h1> fill email input </h1>';
            die;
        }
            
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<h1> Shity email </h1>';
                die;
            } else {
            foreach($data as $email){
            if ($email['email'] == $_POST['email']) {
                    //App::redirect('createaccount');
                    echo '<h1> Already is email </h1>';
                    die;
            } else {

                $_POST['email'];
            
        }
        }
        
        }
        
            $password = $_POST['password'];
            $number = preg_match('@[0-9]@', $password);
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            //$specialChars = preg_match('@[^\w]@', $password);

        if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || strlen($password) > 30) {
                echo "Password must be at least 8 characters in length but not more than 20 and must contain at least one number, one upper case letter, one lower case letter.";
                die;
            } else {
                $password;
                return (new Bankcalc)->save();
        }
    
    } 
}