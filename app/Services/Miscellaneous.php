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

		public static function getWidget(){
			$language = Miscellaneous::getLang();
			$widget_html = Miscellaneous::build(\Cache::get('category_widget_info'),$language);
			dd(\Cache::pull('widget_html'));
		}

		private static function build($widget_info,$language,$res = ''){

			foreach($widget_info as $id => $value_info){
				$res .= '<div>'.'<p>'.$value_info['info'][$language]['name'].'</p>';
				\Cache::set('widget_html',\Cache::get('widget_html').$res);
				if(isset($value_info['childs'])){
					Miscellaneous::build($value_info['childs'],$language);
				}
				$res .= '</div>';
			}

		}

}
