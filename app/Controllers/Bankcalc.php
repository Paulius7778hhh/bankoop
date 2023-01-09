<?php
namespace Start\controllers;
use Start\App;
use Start\DB\FileReader as FR;
class Bankcalc {
    public static function toindex(){
        $pageTitle = 'LBank';
            return App::view('start', compact('pageTitle'));
    }
    public static function tocreate(){
        $pageTitle = 'Account Creation';
            return App::view('createaccount', compact('pageTitle'));
    }
    public function index() {
        $data = (new FR('Accounts'))->showAll();
        $pageTitle = 'Account-list';
            return App::view('account-list', compact('data', 'pageTitle'));
    }
    public function save()
    {
        (new FR('Accounts'))->create($_POST);
        return App::redirect('account-list');
    }
}