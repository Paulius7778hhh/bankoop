<?php

namespace Start\controllers;

use Start\App;
use Start\DB\FileReader as FR;
use Start\controllers\Check;

class Bankcalc
{
    public function logout()
    {
        $pageTitle = 'LBank';
        $_SESSION['username'] = '';
        session_unset();
        session_destroy();

        return (new App)->redirect('');
    }
    public static function toindex()
    {
        $pageTitle = 'LBank';
        $session = session_start();
        return App::view('start', compact('pageTitle', 'session'));
    }
    public static function tocreate()
    {
        $pageTitle = 'Account Creation';
        $acountt = Bankcalc::account_nr();
        return App::view('createaccount', compact('pageTitle', 'acountt'));
    }
    public function index()
    {
        $data = (new FR('Accounts'))->showAll();
        $pageTitle = 'Account-list';
        return App::view('account-list', compact('data', 'pageTitle'));
    }
    public static function congrats()
    {
        $pageTitle = 'congrats';
        return App::view('congrats', compact('pageTitle'));
    }
    public static function menu()
    {
        $pageTitle = 'welcome ' . $_SESSION['username'];
        return App::view('menu', compact('pageTitle'));
    }


    public function save()
    {
        (new FR('Accounts'))->create($_POST);
        return App::redirect('congrats');
    }
    public static function account_nr()
    {
        $data = unserialize(file_get_contents(__DIR__ . '\..\DB\Accounts'));
        $start = 0;
        $end = 11;
        $end2 = 2;
        $acountt = 'LT' . str_pad(rand(0, 99), $end2, $start, STR_PAD_LEFT) . '7300' . str_pad(rand(0, 99999999999), $end, $start, STR_PAD_LEFT);
        if ($data  == null) {
            return $acountt;
        }
        foreach ($data as $acount) {
            if ($acount['acount'] == $acountt) {
                while ($acount['acount'] !== $acountt) {
                    return $acountt !== $acount['acount'];
                }
            } else {
                return $acountt;
            }
        }
    }
}
