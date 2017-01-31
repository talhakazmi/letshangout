<?php
/*
* method for ajax call for created event via ajax
*/
class Register extends CAction
{
    
    public function run()
    {
        $data   =   array();
        
        if(isset($_GET['error']))
        {
            $errorMessage   =   CJSON::decode($_GET['error']);
            $data   = array('error' => CJSON::decode($errorMessage['message']));
        }
        
        if(isset($_POST['submit']))
        {
            if(isset($_POST['confirm']) && !empty($_POST['confirm']))
                $cpassword  =   $_POST['confirm'];
            else
                $data   =   array('error'=>array(array('Confirm Password is required.')));
            
            if(isset($_POST['password']) && !empty($_POST['password']))
                $password  =   $_POST['password'];
            else
                $data   =   array('error'=>array(array('Password is required.')));
            
            if(isset($_POST['email']) && !empty($_POST['email']))
                $email  =   $_POST['email'];
            else
                $data   =   array('error'=>array(array('Email is required.')));
            
            if(isset($_POST['name']) && !empty($_POST['name']))
                $name  =   $_POST['name'];
            else
                $data   =   array('error'=>array(array('Name is required.')));
            
            if(empty($data))
            {
                //Add Custom Venue
                $userData['url']    =   Yii::app()->params['apiUrl']."api/user";

                $userData['post']['name']               =   isset($_POST['name'])?$_POST['name']:'';
                $userData['post']['email']              =   $_POST['email'];
                $userData['post']['password']           =   md5($_POST['password']);
                $userData['post']['code']               =   md5($_POST['email']);
                $userData['post']['repeat_password']    =   md5($_POST['confirm']);

                /*
                 * http request from service end
                 */
                $user =   $this->getController()->httpRequest($userData);

                if($user['success'])
                {
                    $identity=new UserIdentity($_POST['email'],md5($_POST['password']));            
                    $identity->authenticate();
                    //$isUser=$identity->authenticate();
                    $duration=0;
                    Yii::app()->user->login($identity,$duration);
                    Yii::app()->user->setFlash('success', "Welcome user, Kindly check your inbox and verify your account.");
                    $this->getController()->redirect(Yii::app()->user->returnUrl);
                    exit;
                }
                else 
                {
                    $errorMessage    =   CJSON::decode($user['message']);
                    if(isset($errorMessage['email']) && $errorMessage['email'][0] == 'This Email is already in use')
                    {
                        //Get user
                        $isUserData['url']    =   Yii::app()->params['apiUrl']."api/user";
                        //filter fro service to get filtered data from service on the bas of email from user
                        $isUserData['get']    =   array('filter'=>'[{"property":"email","value":"'.$_POST['email'].'","operator":"="}]');
                        /*
                        * Get http request from service end
                        */
                        $record =   $this->getController()->httpRequest($isUserData);

                        if(isset($record['data']['user'][0]['name']) && $record['data']['user'][0]['name'] == 'Guest')
                        {
                            $userData['url']    =   Yii::app()->params['apiUrl']."api/user/".$record['data']['user'][0]['id'];

                            $userData['post']['name']       =   isset($_POST['name'])?$_POST['name']:'';
                            $userData['post']['password']   =   md5($_POST['password']);
                            $userData['post']['code']       =   md5($_POST['email']);
                            $userData['method']             =   'put';

                            /*
                             * http request from service end
                             */
                            $userAdded =   $this->getController()->httpRequest($userData);
                            
                            if($userAdded['success'])
                            {
                                $identity=new UserIdentity($_POST['email'],md5($_POST['password']));            
                                $identity->authenticate();
                                //$isUser=$identity->authenticate();
                                $duration=0;
                                Yii::app()->user->login($identity,$duration);
                                
                                //send email
                                $emailData['url'] = Yii::app()->params['apiUrl']."api/user/sendemail";

                                $emailData['post']['link'] = Yii::app()->getBaseUrl(true).'/user/activateuser/code/'.md5($_POST['email']);
                                $emailData['post']['label'] = 'Verify email';
                                $emailData['post']['message'] = 'Welcome to Let`s Hanout, the one place to create Plans.';
                                $emailData['post']['sender'] = 'Team Let`s Hangout';
                                $emailData['post']['name'] = isset($_POST['name'])?$_POST['name']:'Guest';
                                $emailData['post']['email'] = $_POST['email'];
                                $emailData['post']['subject'] = 'Welcome to LetsHangout';

                                $send = $this->getController()->httpRequest($emailData);

                                $this->getController()->redirect(Yii::app()->user->returnUrl);
                                exit;
                            }
                        }
                    }
                    $data   = array('error' => CJSON::decode($user['message']));
                }
            }
        }
        
        $this->getController()->render('standalone-signup', $data);       
    }
}