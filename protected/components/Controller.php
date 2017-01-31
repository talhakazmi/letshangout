<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
        
        /*
         * Initialization of class 
         */
        public function init()
        {


            //set user location
            $this->checkLocation();
            
            if(Yii::app()->session['city'] != 'karachi')
            {
                $movies =   array('label'=>'Movies', 'url'=>'javascript:void(0);', 'linkOptions' => array('title'=>'This section is not valid in your city'));
            }
            else
            {
                $movies =   array('label'=>'Movies', 'url'=>Yii::app()->createUrl('movies'));
            }
            
            $baseUrl = Yii::app()->baseUrl; 
            if(!Yii::app()->request->isAjaxRequest) 
            {
                /*
                 * Inculde page specific JS and CSS
                 */
                $includes = Yii::app()->getClientScript();
                //CSS inclusion
                $includes->registerCssFile($baseUrl.'/assets/css/bootstrap.css');
                $includes->registerCssFile($baseUrl.'/assets/css/lho-custom-fonts.css');
                $includes->registerCssFile($baseUrl.'/assets/css/common.css');
                $includes->registerCssFile($baseUrl.'/assets/css/jquery.mCustomScrollbar.css');
                $includes->registerCssFile($baseUrl.'/assets/css/font-awesome.css');
                $includes->registerCssFile($baseUrl.'/assets/css/bootstrap-datetimepicker.min.css');
                

                
                //JS inculsion
                $includes->registerScript('helpers', "baseUrl = ".CJSON::encode(Yii::app()->getBaseUrl(true)).";\napiBaseUrl = ".CJSON::encode(Yii::app()->params->apiUrl).";", CClientScript::POS_HEAD);
                
                

                $includes->registerScriptFile($baseUrl.'/assets/js/lib/jquery.js');
                $includes->registerScriptFile($baseUrl.'/assets/js/lib/bootstrap.js');
                $includes->registerScriptFile($baseUrl.'/assets/js/lib/moment-with-locales.js');
                $includes->registerScriptFile($baseUrl.'/assets/js/lib/bootstrap-datetimepicker.js');
                $includes->registerScriptFile($baseUrl.'/assets/js/lib/jquery.mCustomScrollbar.js');
                $includes->registerScriptFile($baseUrl.'/assets/js/lib/jquery.form-validator.min.js');               
                $includes->registerScriptFile($baseUrl.'/assets/js/app/common-onready.js');

                if(Yii::app()->user->getId())
                    $includes->registerCssFile($baseUrl.'/assets/css/loggedin-user.css');                    
                    $includes->registerScriptFile($baseUrl.'/assets/js/autoComplete.js');
                    $includes->registerScriptFile($baseUrl.'/assets/js/app/loggedin-user.js');
            }
           
            if(Yii::app()->user->getId())
            {
                
                $this->menu = array(
                                'normal'=>array(
                                        array('label'=>'Plans', 'url'=>Yii::app()->createUrl('user/dashboard')),
                                        array('label'=>'Events', 'url'=>Yii::app()->createUrl('events')),
                                        $movies,
                                        array('template'=>'<a href="javascript:void(0);" class="notificationBtn"><span class="icon-notification"></span></a>', 'itemOptions'=>array('class'=>'no-margin')),
                                        array('template'=>'<a href="javascript:void(0);"><img src="'.Yii::app()->getBaseUrl(true).'/assets/img/default-avatar.png" height="20" width="24" class="default-avatar" />Hi, '.Yii::app()->user->getState('name').' <span class="glyphicon glyphicon-triangle-bottom"></span></a>', 'itemOptions'=>array('class'=>'lh-dropdown'),'items'=>array(array('label'=>'Profile','url'=>'javascript:void(0);'),array('label'=>'Settings','url'=>'javascript:void(0);'),array('label'=>'Logout','url'=>$baseUrl.'/user/logout'))),
                                        array('label'=>'Create Plan', 'url'=>Yii::app()->createUrl('plan/create'), 'linkOptions'=>array('class'=>'signup-btn btn-normal')),
                                ),
                                'responsive'=>array(
                                        array('label'=>'Plans', 'url'=>Yii::app()->createUrl('user/dashboard')),
                                        array('label'=>'Events', 'url'=>Yii::app()->createUrl('events')),
                                        $movies,
                                        array('label'=>'User Info'),
                                        array('label'=>'Create Plan', 'url'=>Yii::app()->createUrl('plan/create'), 'linkOptions'=>array('class'=>'signup-btn')),
                                        array('label'=>'Search', 'url'=>'javascript:void(0);', 'template'=>'<form class="container"><hr><div class="form-group"><input type="text" class="form-control" id="q" placeholder="Search"></div></form>'),
                                )
                            );
            }
            else
            {
                $this->menu = array(
                                'normal'=>array(
                                        array('label'=>'Plans', 'url'=>Yii::app()->createUrl('user/dashboard')),
                                        array('label'=>'Events', 'url'=>Yii::app()->createUrl('events')),
                                        $movies,
                                        array('label'=>'Sign in', 'url'=>'javascript:void(0);', 'linkOptions'=>array('id'=>'signIn','data-target'=>'#myModal', 'data-toggle'=>'modal')),
                                        array('label'=>'Sign up', 'url'=>'javascript:void(0);', 'linkOptions'=>array('class'=>'signup-btn btn-normal', 'id'=>'signUp','data-target'=>'#myModal', 'data-toggle'=>'modal')),
                                ),
                                'responsive'=>array(
                                        array('label'=>'Plans', 'url'=>Yii::app()->createUrl('user/dashboard')),
                                        array('label'=>'Events', 'url'=>Yii::app()->createUrl('events')),
                                        $movies,
                                        array('label'=>'Sign in', 'url'=>'javascript:void(0);', 'linkOptions'=>array('id'=>'signIn','data-target'=>'#myModal', 'data-toggle'=>'modal')),
                                        array('label'=>'Sign up', 'url'=>'javascript:void(0);', 'linkOptions'=>array('class'=>'signup-btn', 'id'=>'signUp','data-target'=>'#myModal', 'data-toggle'=>'modal')),
                                        array('label'=>'Search', 'url'=>'javascript:void(0);', 'template'=>'<form class="container"><hr><div class="form-group"><input type="text" class="form-control" id="q" placeholder="Search"></div></form>'),
                                )
                            );
            }
            parent::init();
        }
        
        public function httpRequest($data)
        {
            Yii::import('ext.EHttpClient.*');
            
            $client = new EHttpClient($data['url'], array(
                'maxredirects' => 0,
                'timeout'      => 30));
            
            $client->setHeaders('Accept', 'application/json');
            $client->setHeaders('Content-Type', 'application/x-www-form-urlencoded');
            
            //requets header with username and password
            $client->setHeaders('X-REST-USERNAME', 'admin@letshangout');
            $client->setHeaders('X-REST-PASSWORD', 'admin@Access');
            
            if(isset($data['header']))
            {
                foreach($data['header'] as $headerKey=>$headerValue)
                {
                    $client->setHeaders($headerKey, $headerValue);
                }
            }
            
            if(isset($data['get']))
            {
                $client->setParameterGet($data['get']);
                
            }
            
            if(isset($data['post']))
            {
                $rawData    = CJSON::encode($data['post']);
                $client->setRawData($rawData)->setEncType('application/json');
            }
            
            $response = $client->request((isset($data['method'])?$data['method']:(isset($data['post'])?'post':'')));
            $result = CJSON::decode($response->getBody());
            
            return $result;
        }
        
        public function dateToUrl($createdAt)
        {
            return date('Y',strtotime($createdAt)).'/'.date('m',strtotime($createdAt)).'/'.date('d',strtotime($createdAt)).'/';
        }
        
        public function customCurlCall($data){
            // URL on which we have to post data
            $url = $data['url'];

            if(isset($data['post']))
            {
                $post_data  =   $data['post'];
            }
            if(isset($data['file']))
            {
                $post_data['file']  = '@'.$data['file']['image']['tmp_name'];
                $post_data['fileName']  = $data['file']['image']['name'];
                $post_data['fileType']  = $data['file']['image']['type'];
            }
            // Initialize cURL
            $ch = curl_init();

            curl_setopt($ch,CURLOPT_HTTPHEADER,array('X-REST-USERNAME: admin@letshangout','X-REST-PASSWORD: admin@Access'));
            // Set URL on which you want to post the Form and/or data
            curl_setopt($ch, CURLOPT_URL, $url);
            // Data+Files to be posted
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            // Pass TRUE or 1 if you want to wait for and catch the response against the request made
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // For Debug mode; shows up any error encountered during the operation
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            // Execute the request
            $response = curl_exec($ch);
            
            return CJSON::decode($response);
        }
        
        public function findTime($timestamp) 
        {   
            $now = new DateTime();
            $future_date = new DateTime($timestamp);

            $interval = $future_date->diff($now);
            
            if($interval->invert == 1)
                if($interval->h == 0)
                    return $interval->format("%d days");
                else
                    return $interval->format("%d days, %h hours");
            else
                return false;
        } 

        public function humanTiming ($time)
        {
            $time = time() - strtotime($time); // to get the time since that moment
            $tokens = array (
                31536000 => 'year',
                2592000 => 'month',
                604800 => 'week',
                86400 => 'day',
                3600 => 'hour',
                60 => 'minute',
                1 => 'second'
            );
            foreach ($tokens as $unit => $text) {
                if ($time < $unit) continue;
                $numberOfUnits = floor($time / $unit);
                return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
            }
        }

        public function checkLocation(){

            if(!isset(Yii::app()->session['location'])){
                //Get user's ip address      
                $ip =   Yii::app()->request->getUserHostAddress();
                //get request for ip to location service
                $data['get']    =   array('api_key'=>'d03ade5558d334f5122d3737180c08a62eb2de8d', 'addr'=>$ip); //Egypt ip 196.218.110.195
                //url for requesting location via IP address
                $data['url']    =   'http://api.db-ip.com/addrinfo';
                //Http request for location
                $record =   $this->httpRequest($data);

                Yii::app()->session['country']  = 'pakistan'; 
                Yii::app()->session['city']     = 'karachi'; 
            }
            
        }

}