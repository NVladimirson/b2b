<?php

namespace App\Services;
use LaravelLocalization;

class Miscellaneous
{
	 private  $lang;
   private static $instance;
   public static function getInstance()
   {
     if (null === static::$instance) {
       static::$instance = new static();
     }

     return static::$instance;
   }

   private function __construct(){
     $this->lang = LaravelLocalization::getCurrentLocale() == 'ua'?'uk':LaravelLocalization::getCurrentLocale();
   }
   private function __clone(){}
   private function __wakeup(){}
     
    public static function getLang(){
	    return static::getInstance()->lang;
    }

}
