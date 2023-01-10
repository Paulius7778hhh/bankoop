<?php 
namespace Start\controllers;
use Start\App;

class Check {
    public function login()
    {
        $data = unserialize(file_get_contents(__DIR__ . '\..\DB\Accounts'));
        foreach ($data as $id) {
        if ($id['email'] == $_POST['email']) {
            if($id['id']['password'] == $_POST['password']){

            }
                
            } else {
                App::redirect('start');
                die;
            }
        }
    }
    public function checkin() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $data = unserialize(file_get_contents(__DIR__ . '\..\DB\Accounts'));
    if (preg_match('/^[a-zA-ZąĄčČęĘėĖįĮšŠųŲūŪžŽ\s]{3,}$/', $_POST['name'])) {
    
        $name = $_POST['name'];
        $name = ucfirst($name);
        }
    else{
            App::redirect('createaccount');
        die;
        }
    }
    if (preg_match('/^[a-zA-ZąĄčČęĘėĖįĮšŠųŲūŪžŽ]{4,}$/', $_POST['surname'])) {
        $surname = $_POST['surname'];
        $surname = ucfirst($surname);
    }else
        {
        App::redirect('createaccount');
        die;
    }
        $personal_id = (int) $_POST['personal-id-number'];
        
    if (preg_match('/^[1-6]\d{2}(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])\d{4}$/', $_POST['personal-id-number'])) {
        
        foreach ($data as $id) {
        if ($id['personal-id-number'] == $_POST['personal-id-number']) {
            App::redirect('createaccount');
                die;
            }
        }
    $personal_id = (int) $_POST['personal-id-number'];
    

     } else {
    App::redirect('createaccount');
    die;
        }
        
     
  

    
     $balance = $_POST['balance'] = 0;
     return (new Bankcalc)->save();
    }
}