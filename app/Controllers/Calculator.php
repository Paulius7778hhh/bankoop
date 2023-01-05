<?php

namespace Begin\Controllers;
use Begin\App;
class Calculator {
    public function sum($a,$b){
       $result = $a + $b;
       $page_title = 'Calculator | SUM';
       //return App::view('calculator',['result' => $result]);
       return App::view('calculator',compact('result','page_title'));
    }
    public function diff($a,$b){
       $result = $a - $b;
       $page_title = 'Calculator | DIFF';
       return App::view('calculator',compact('result','page_title'));
    }
    public function div($a,$b){
       $result = $a / $b;
       $page_title = 'Calculator | DIV';
       return App::view('calculator',compact('result','page_title'));
    }
    public function multi($a,$b){
       $result = $a * $b;
       $page_title = 'Calculator | MULTI';
       return App::view('calculator',compact('result','page_title'));
    }
}