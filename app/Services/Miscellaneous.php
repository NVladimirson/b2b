<?php

namespace App\Services;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

		public static function getOrderCode($company_id){
			$date = now()->toArray();
			$code = $date['day'].$date['month'].$date['year'].$date['hour'].$date['minute'].$date['second'].'-'.auth()->user()->company_id.'/'.$company_id;
			return $code;
		}

		public static function highlightSubstr($string, $tofind, $tag = 'b'){
			$substr_arr = explode($tofind,$string);
			if(!isset($substr_arr[0])){
				return $string;
			}
			else{
				if($substr_arr[0] == ''){
					return '<'.$tag.'>'.$tofind.'</'.$tag.'>'.$substr_arr[1];
				}
				else if($substr_arr[1] == ''){
					return $substr_arr[0].'<'.$tag.'>'.$tofind.'</'.$tag.'>';
				}
				else{
					return $substr_arr[0].'<'.$tag.'>'.$tofind.'</'.$tag.'>'.$substr_arr[1];
				}
			}
		}

}
