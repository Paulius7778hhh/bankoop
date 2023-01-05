<?php
namespace Begin;
use Begin\Controllers\Calculator;
class App {
public static function nice()
{
    
    $url = explode( '/',$_SERVER['REQUEST_URI']);
    array_shift($url);
    self::router($url);

    
}
   private static function router(array $url)
    {
         if($url[0] == 'calculator' && in_array($url[1], ['diff','sum','multi','div']) && count($url) == 4) {
            print_r($url[1]);
            
            return (new Calculator)->{$url[1]}($url[2], $url[3]);
         }
        else {
                App::view('calculator', []);
        echo '<h1>ERROR 404</h1>';
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

    //  public static function redirect($url)
    // {
    //     header('Location: ' . URL . $url);
    //     return null;
    // }

}
