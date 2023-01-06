<?php 
namespace Start\controllers;
use Start\App;

class Calculator {

    public function sum($a, $b)
    {
        $result = $a + $b;
        $pageTitle = 'Calculator | SUM';

        // return App::view('calculator', ['result' => $result]);
        return App::view('calculator', compact('result', 'pageTitle'));
    }

    public function diff($a, $b)
    {
        $result = $a - $b;
        $pageTitle = 'Calculator | DIFF';
        return App::view('calculator', compact('result', 'pageTitle'));
    }

    public function multi($a, $b)
    {
        $result = $a * $b;
        $pageTitle = 'Calculator | MULTI';
        return App::view('calculator', compact('result', 'pageTitle'));
    }

    public function div($a, $b)
    {
        $result = $a / $b;
        $pageTitle = 'Calculator | DIV';
        return App::view('calculator_div', compact('result', 'pageTitle'));
    }

}