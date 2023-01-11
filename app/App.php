<?php
namespace Start;
use Start\controllers\Calculator;
use Start\controllers\Bankcalc;
use Start\controllers\Check;

class App {
public static function start()
{
    
    $url = explode( '/',$_SERVER['REQUEST_URI']);
    array_shift($url);
    return self::router($url);

    
}
   private static function router(array $url)
    {
       $method = $_SERVER['REQUEST_METHOD'];
        if($url[0] == null){
            return (new Bankcalc)->toindex();
        }
        if($url[0] == 'createaccount' && $method == 'GET'){
          
            return    (new Bankcalc)->tocreate();
        }
          if ($url[0] == 'calculator' && in_array($url[1], ['sum', 'diff', 'multi', 'div']) && count($url) == 4) {
            return (new Calculator)->{$url[1]}($url[2], $url[3]);
        }
        if($url[0] == 'account-list' && count($url) == 1 &&  $method == 'GET'){
            return (new Bankcalc)->index();
        }
        if ($url[0] == 'Accounts' && $url[1] == 'save' && count($url) == 2 && $method == 'POST') {
            return (new Bankcalc)->save();
        }
        if ($url[0] == 'congrats' && count($url) == 1 && $method == 'GET') {
            return (new Bankcalc)->congrats();
        }
        if ($url[0] == 'congrats' && count($url) == 1 && $method == 'POST') {
            return (new Bankcalc)->redirect();
        }
        if ($url[0] == 'check' && count($url) == 1 && $method == 'POST') {
            return (new Check)->checkin();
        }
        if ($url[0] == 'check' && $url[1] == 'login' && count($url) == 2 && $method == 'POST') {
            return (new Check)->login();
        }
        if ($url[0] == 'menu' && count($url) == 1 && $method == 'GET') {
            return (new Bankcalc)->menu();
        }
    }   
    public static function view(string $__name, array $data)
    {
        ob_start();

        extract($data);

        require __DIR__ .'/../view/top.php';

        require __DIR__ .'/../view/'.$__name.'.php';

        require __DIR__ .'/../view/bottom.php';


        $out = ob_get_contents();
        ob_end_clean();

        return $out;
    }
    public static function redirect($url)
    {
        header('Location: ' . URL . $url);
        return null;
    }

}

//  (new Bankcalc)->tocreate();
//             return (new Bankcalc)->account_nr();