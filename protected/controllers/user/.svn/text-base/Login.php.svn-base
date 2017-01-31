<?php
/*
* method for ajax call for created event via ajax
*/
class Login extends CAction
{
    
    public function run()
    {
        $data   =   array();
        
        if(isset($_GET['error']))
        {
            switch($_GET['error'])
            {
                case "invalid_credentials":
                    $data   =   array('error'=>'Email or Password is invalid.');
                    break;
                default:
                    $data   =   array();
                    break;
            }
        }
        
        if(isset($_POST['submit']))
        {
            if(isset($_POST['email']) && !empty($_POST['email']))
                $email  =   $_POST['email'];
            else
                $data   =   array('error'=>'Email is required.');
            
            if(isset($_POST['password']) && !empty($_POST['password']))
                $password  =   $_POST['password'];
            else
                $data   =   array('error'=>'Password is required.');
            
            if(empty($data))
            {
                $identity=new UserIdentity($email,md5($password));
                $isUser=$identity->authenticate();

                if($isUser)
                {
                    $data   =   array('error'=>'Email or Password is invalid.');
                }
                else
                {
                    $duration=isset($_POST['remember']) ? 3600*24*30 : 0; // 30 days
                    Yii::app()->user->login($identity,$duration);
                    $this->getController()->redirect(Yii::app()->user->returnUrl);
                }
            }
        }
        
        $baseUrl = Yii::app()->baseUrl; 
        /*
         * Inculde page specific JS and CSS
         */
        $includes = Yii::app()->getClientScript();

        //JS inculsion
        $includes->registerScriptFile($baseUrl.'/assets/js/facebook.js');

        Yii::app()->clientScript->registerScript('facebook-jssdk', "if(document.getElementById(\"facebook-jssdk\")){ //if set, reset
                                                                    //removes the <script>
                                                                    document.head.removeChild(document.getElementById(\"facebook-jssdk\")); 
                                                                    window.FB=null; //unloads the APIs
                                                                    loaded=null; 
                                                                }", CClientScript::POS_LOAD);  

        $this->getController()->render('standalone-signin', $data);    

    }
}