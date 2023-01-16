<?php

namespace Start\controllers;

use Start\App;
use Start\controllers\Bankcalc;
use Start\Message as M;

class Check
{
    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $data = unserialize(file_get_contents(__DIR__ . '\..\DB\Accounts'));
        if ($_POST['email'] == null && $_POST['password'] == null) {
            $pageTitle = 'LBank';
            M::add('<h2>type in email and password</h2>', 'alert-danger');
            $message = M::get();
            return App::view('start', compact('message', 'pageTitle'));
        } elseif ($_POST['email'] == null) {
            $pageTitle = 'LBank';
            M::add('<h2>type in email</h2>', 'alert-danger');
            $message = M::get();
            return App::view('start', compact('message', 'pageTitle'));
        } elseif ($_POST['password'] == null) {
            $pageTitle = 'LBank';
            M::add('<h2>type in password</h2>', 'alert-danger');
            $message = M::get();
            return App::view('start', compact('message', 'pageTitle'));
        }
        foreach ($data as $index => $user) {
            // print_r($user['email'];
            if ($user['email'] === $email && $user['password'] === $password) {
                session_start();
                $_SESSION['username'] = $user['username'];
                return (new Bankcalc)->menu();
            }
        }
        $pageTitle = 'LBank';
        M::add('<h2>wrong email or password</h2>', 'alert-danger');
        $message = M::get();
        // print_r($message);
        return App::view('start', compact('message', 'pageTitle'));
        // return (new Bankcalc)->menu();
    }






    public function checkin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = unserialize(file_get_contents(__DIR__ . '\..\DB\Accounts'));
            if (preg_match('/^[a-zA-ZąĄčČęĘėĖįĮšŠųŲūŪžŽ\s]{3,}$/', $_POST['name'])) {

                $_POST['name'] = ucfirst($_POST['name']);
            } else {
                //App::redirect('createaccount');
                $acountt = Bankcalc::account_nr();
                $pageTitle = 'Account creation';
                M::add('<h1> NAME </h1>', 'alert-danger');
                $message = M::get();
                return App::view('createaccount', compact('message', 'pageTitle', 'acountt'));
            }
        }

        if (preg_match('/^[a-zA-ZąĄčČęĘėĖįĮšŠųŲūŪžŽ]{4,}$/', $_POST['surname'])) {
            $_POST['surname'] = ucfirst($_POST['surname']);
        } else {
            //App::redirect('createaccount');
            $acountt = Bankcalc::account_nr();
            $pageTitle = 'Account creation';
            M::add('<h1> SURNAME </h1>', 'alert-danger');
            $message = M::get();
            return App::view('createaccount', compact('message', 'pageTitle', 'acountt'));
        }

        $_POST['username'] = $_POST['name'] . $_POST['surname'];

        foreach ($data as $user) {
            if ($user['username'] == $_POST['username']) {
                //App::redirect('createaccount');
                $acountt = Bankcalc::account_nr();
                $pageTitle = 'Account creation';
                M::add('<h1> Already is user with that name and surname </h1>', 'alert-danger');
                $message = M::get();
                return App::view('createaccount', compact('message', 'pageTitle', 'acountt'));
            } else {
                $_POST['username'];
            }
        }

        $personal_id = (int) $_POST['personal-id-number'];

        if (preg_match('/^[1-6]\d{2}(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])\d{4}$/', $_POST['personal-id-number'])) {

            foreach ($data as $id) {
                if ($id['personal-id-number'] == $_POST['personal-id-number']) {
                    //App::redirect('createaccount');
                    $acountt = Bankcalc::account_nr();
                    $pageTitle = 'Account creation';
                    M::add('<h1> wrong id number </h1>', 'alert-danger');
                    $message = M::get();
                    return App::view('createaccount', compact('message', 'pageTitle', 'acountt'));
                }
            }

            $personal_id = (int) $_POST['personal-id-number'];
        } else {
            //App::redirect('createaccount');
            $acountt = Bankcalc::account_nr();
            $pageTitle = 'Account creation';
            M::add('<h1> shity number </h1>', 'alert-danger');
            $message = M::get();
            return App::view('createaccount', compact('message', 'pageTitle', 'acountt'));
        }

        $balance = $_POST['balance'] = 0;


        if ($_POST['email'] == empty($_POST['email'])) {
            $acountt = Bankcalc::account_nr();
            $pageTitle = 'Account creation';
            M::add('<h1> fill email input </h1>', 'alert-danger');
            $message = M::get();
            return App::view('createaccount', compact('message', 'pageTitle', 'acountt'));
        }

        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $acountt = Bankcalc::account_nr();
            $pageTitle = 'Account creation';
            M::add('<h1> Shity email </h1>', 'alert-danger');
            $message = M::get();
            return App::view('createaccount', compact('message', 'pageTitle', 'acountt'));
        } else {
            foreach ($data as $email) {
                if ($email['email'] == $_POST['email']) {
                    //App::redirect('createaccount');
                    $acountt = Bankcalc::account_nr();
                    $pageTitle = 'Account creation';
                    M::add('<h1> Already is email </h1>', 'alert-danger');
                    $message = M::get();
                    return App::view('createaccount', compact('message', 'pageTitle', 'acountt'));
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

        if (strlen($password) < 8 || !$number || !$uppercase || !$lowercase || strlen($password) > 30) {
            $acountt = Bankcalc::account_nr();
            $pageTitle = 'Account creation';
            M::add('<h1> Password must be at least 8 characters in length but not more than 20 and must contain at least one number, one upper case letter, one lower case letter. </h1>', 'alert-danger');
            $message = M::get();
            return App::view('createaccount', compact('message', 'pageTitle', 'acountt'));
        } else {
            $password;
            return (new Bankcalc)->save();
        }
    }
}
