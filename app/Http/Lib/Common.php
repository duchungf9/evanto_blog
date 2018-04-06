<?php

namespace App\Http\Lib;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use File,stdClass,Config;

class Common  {
    private static $meta           = [];

	/*

		Function to convert an array to object
		params: 
		$array : the array needed to convert to object
		

		OUTPUT: (string): object

	*/
	public static function convertArrayToObj($array){
        $oObject = new stdClass();
        foreach ($array as $key => $value) {
            $oObject->$key = $value;
        }
        return $oObject;
	}
	
	/*

		Function to upload image to 'image' field of post
		params: 
		$image : the file prepare to upload after
		$prefix: the prefix of image name
		$postId: default value is null, if isset $postId we will delete old image

		OUTPUT: (string): return image path.

	*/
	public static function uploadImage($image,$prefix,$postId=null){
		if($postId!=null){
			$cdbPost = Self::find($postId);
            $pathOldImageNeedDelete  = $cdbPost->image;
            File::delete($pathOldImageNeedDelete);
		}
        $imageName = $prefix . '.' . $image->getClientOriginalExtension();
        $image->move(
            base_path() . '/public/images/posts/', $imageName
        );
        $result = '/images/posts/'.$imageName;
        return $result;
	}

    public static function headGetMemcache($br = false)
    {
        return self::metaGet($br);
    }

    public static function metaDefault(){
        self::$meta = [
            'title'                    => '<title>' . Config::get('app.seo.title', 'made by duchungf9') . '</title>',
            'description'              => '<meta name="description" content="' . Config::get('app.seo.description', 'Made by duchungf9') . '" />',
            'news-keywords'            => '<meta name="news-keywords" content="' . Config::get('app.seo.keywords', 'Made by duchungf9') . '" />',
            'keywords'                 => '<meta name="keywords" content="' . Config::get('app.seo.keywords', 'Made by duchungf9') . '" />',
            'viewport'                 => '<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />',
            'author'                   => '<meta name="author" content="'.$_ENV['DOMAIN_CURRENT'].'" />',
            'generator'                => '<meta name="generator" content="duchungf9@gmail.com" />',
            'robots'                   => '<meta name="robots" content="' . Config::get('app.seo.robots', 'index,follow') . '" />',
            'googlebot'                => '<meta name="Googlebot" content="' . Config::get('app.seo.googlebot', 'index,follow,archive') . '" />',
            'rating'                   => '<meta name="RATING" content="GENERAL" />',
            'page_topic'               => '<meta name="page-topic" content="' . Config::get('app.seo.page_topic', 'Made by duchungf9') . '" />',
            'revisit-after'            => '<meta name="revisit-after" content="1 days" />',
            'distribution'             => '<meta name="distribution" content="Global" />',
            'copyright'                => '<meta name="copyright" content="'.$_ENV['DOMAIN_CURRENT'].'" />',
            'audience'                 => '<meta http-equiv="audience" content="General" />',
            'resource-type'            => '<meta name="resource-type" content="Document" />',
            'og:site_name'             => '<meta property="og:site_name" content="'.$_ENV['DOMAIN_CURRENT'].'" />',
            'og:type'                  => '<meta property="og:type" content="website" />',
            'og:locale'                => '<meta property="og:locale" content="en_US" />',
            'fb:title'                 => '<meta property="og:title" content="' . Config::get('app.seo.fb_title', 'Made by duchungf9') . '" />',
            'fb:description'           => '<meta property="og:description" content="' . Config::get('app.seo.fb_description', 'Made by duchungf9') . '" />',
            'fb:url'                   => '<meta property="og:url" content="' . Config::get('app.seo.fb_url', 'http://'.$_ENV['DOMAIN_CURRENT']) . '" />',
            'fb:image'                 => '<meta property="og:image" content="' . Config::get('app.seo.fb_image', '') . '" />',
            'gg:name'                  => '<meta itemprop="name" content="' . Config::get('app.seo.gg_name', 'Made by duchungf9') . '" />',
            'gg:description'           => '<meta itemprop="description" content="' . Config::get('app.seo.gg_description', 'description mặc định') . '" />',
            'gg:image'                 => '<meta itemprop="image" content="' . Config::get('app.seo.gg_image', '') . '" />',
            'google-site-verification' => '<meta name="google-site-verification" content="' . Config::get('app.seo.google', '') . '" />',
            'msvalidate.01'            => '<meta name="msvalidate.01" content="' . Config::get('app.seo.bing', '') . '" />',
            'alexaVerifyID'            => '<meta name="alexaVerifyID" content="' . Config::get('app.seo.alexa', '') . '" />',
            'alternate'                => '<link rel="alternate" href="" hreflang="en" />',
            'canonical'                => '',
            'prev'                     => '',
            'next'                     => ''
        ];
        // <link rel                            ="alternate" href="http://example.com" hreflang="en-us" />
    }

    private static function metaGen($name = '', $value = '', $type = 0)
    {
        if(strcmp($name, 'title') == 0){
            return "<title>" . $value . "</title>";
        }
        if(strcmp($name, 'canonical') == 0){
            return '<link rel="canonical" href="' . $value . '" />';
        }
        if(strcmp($name, 'prev') == 0){
            return '<link rel="prev" href="' . $value . '" />';
        }
        if(strcmp($name, 'next') == 0){
            return '<link rel="next" href="' . $value . '" />';
        }
        if(strcmp($name, 'alternate') == 0){
            return '<link rel="alternate" href="' . $value . '" hreflang="vi-vn" />';
        }elseif($type == 0){
            return '<meta name="' . $name . '" content="' . $value . '" />';
        }elseif($type == 1){
            return '<meta property="' . $name . '" content="' . $value . '" />';
        }elseif($type == 2){
            return '<meta itemprop="' . $name . '" content="' . $value . '" />';
        }//end if
    }//end function

    /**
     * [metaSet description]
     *
     * @param  array $arr [description]
     *
     * @return [type]      [description]
     */
    public static function metaSet($arr = [])
    {
        if(count($arr) > 0){
            foreach($arr as $key => $value){
                $key_new = $key;
                $type    = 0;
                if(strpos($key, 'fb:') !== false){
                    $key_arr = explode(':', $key);
                    $key_new = 'og:' . $key_arr[1];
                    $type    = 1;
                }elseif(strpos($key, 'gg:') !== false){
                    $key_arr = explode(':', $key);
                    $key_new = $key_arr[1];
                    $type    = 1;
                }
                $value            = htmlentities($value, ENT_QUOTES);
                self::$meta[$key] = self::metaGen($key_new, $value, $type);
            }
        }//end if
    }//end function

    /**
     * Get html meta
     *
     * @param  [type] $br [description]
     *
     * @return [type]     [description]
     */
    public static function metaGet($br = false)
    {
        $html = '';
        if($br){
            foreach(self::$meta as $key => $value){
                $html .= $value . "\n";
            }
        }else{
            foreach(self::$meta as $key => $value){
                $html .= $value;
            }
        }//end if
        return $html;
    }



}