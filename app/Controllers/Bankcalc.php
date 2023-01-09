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
        $acountt = Bankcalc::account_nr();
            return App::view('createaccount', compact('pageTitle', 'acountt'));
    }
    public function index() {
        $data = (new FR('Accounts'))->showAll();
        $pageTitle = 'Account-list';
            return App::view('account-list', compact('data', 'pageTitle'));
    }
    public static function congrats() {
        $pageTitle = 'congrats';
            return App::view('congrats',compact('pageTitle'));
    }

    public function save()
    {
        (new FR('Accounts'))->create($_POST);
        return App::redirect('congrats');
    }
    public static function account_nr()
    {
     $start = 0;
     $end = 11;
     $end2 = 2;
     $acountt = 'LT'.str_pad(rand(0,99),$end2,$start,STR_PAD_LEFT).'7300'.str_pad(rand(0,99999999999),$end,$start,STR_PAD_LEFT);
     return $acountt;
    }
}  