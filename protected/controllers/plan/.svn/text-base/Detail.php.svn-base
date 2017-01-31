<?php
/*
* method for ajax call for more detail link to display detail information in an overlay
*/
class Detail extends CAction
{
    
    public function run($id)
    {
        $this->getController()->layout = 'plan/content';
        
        $baseUrl = Yii::app()->baseUrl; 

        /*
         * Inculde page specific JS and CSS
         */
        $includes = Yii::app()->getClientScript();

        $includes->registerScriptFile($baseUrl.'/assets/js/app/plan-onready.js');

        if($id)
        {
                $datac['url']            =   Yii::app()->params['apiUrl'].'api/plan/'.$id;


                $response   =   $this->getController()->httpRequest($datac);

                $data['plan']['id']             =   $response['data']['plan']['id'];
                $data['plan']['title']          =   $response['data']['plan']['title'];
                $data['plan']['status']         =   $response['data']['plan']['status'];
                $data['plan']['createdDate']    =   $response['data']['plan']['createdDate'];
                $data['plan']['isSuggestion']   =   $response['data']['plan']['isSuggestion'];
                $data['plan']['isInvite']       =   $response['data']['plan']['isInvite'];
                $data['plan']['userId']         =   $response['data']['plan']['user']['id'];
                $data['plan']['userName']       =   $response['data']['plan']['user']['name'];
                $data['plan']['userEmail']      =   $response['data']['plan']['user']['email'];
                //$data['plan']['suggestions']    =   $response['data']['plan']['plansuggestions'];
                $data['plan']['planinvites']    =   $response['data']['plan']['planinvites'];
                $data['plan']['invitedFriends'] =   $response['data']['plan']['invited'];
                //$data['plan']['votes']          =   $response['data']['plan']['votes'];

                if(Yii::app()->user->getId() != $data['plan']['userId'])
                {
                    $isError    =   null;
                    foreach($data['plan']['invitedFriends'] as $value)
                    {
                        if(Yii::app()->user->getId() == $value['userId'])
                        {
                            $isError    =   true;
                        }
                    };

                    if($isError == null)
                        throw new CHttpException(404,'invalid request');
                        
                }
                
                if(!empty($response['data']['plan']['sessions']))
                {
                        if(isset($response['data']['plan']['sessions'][0]))
                        {
                                foreach($response['data']['plan']['sessions'] as $session)
                                {
                                        $data['plan']['sessions'][$session['id']]   =   $session;
                                        $data['plan']['duration'][]                 =   $session['startTime'];
                                }
                        }
                        else
                        {
                                $data['plan']['sessions'][$response['data']['plan']['sessions']['id']]   =   $response['data']['plan']['sessions'];
                                $data['plan']['duration'][]                 =   $response['data']['plan']['sessions']['startTime'];
                        }
                }

                if(!empty($response['data']['plan']['stateroom']))
                {
                        if(isset($response['data']['plan']['stateroom'][0]))
                        {
                                foreach($response['data']['plan']['stateroom'] as $stateroom)
                                {
                                        $data['plan']['staterooms'][$stateroom['id']]   =   $stateroom;
                                }
                        }
                        else
                        {
                                $data['plan']['staterooms'][$response['data']['plan']['stateroom']['id']]   =   $response['data']['plan']['stateroom'];
                        }
                }

                if(!empty($response['data']['plan']['venue']))
                {
                        if(isset($response['data']['plan']['venue'][0]))
                        {   
                                foreach($response['data']['plan']['venue'] as $venue)
                                {
                                        $data['plan']['venues'][$venue['id']]   =   $venue;
                                }
                        }
                        else 
                        {
                                $data['plan']['venues'][$response['data']['plan']['venue']['id']]   =   $response['data']['plan']['venue'];
                        }
                }

                if(!empty($response['data']['plan']['items']))
                {
                        if(isset($response['data']['plan']['items'][0]))
                        {
                                foreach($response['data']['plan']['items'] as $item)
                                {
                                        $data['plan']['items'][$item['id']]   =   $item;
                                }
                        }
                        else 
                        {
                                $data['plan']['items'][$response['data']['plan']['items']['id']]   =   $response['data']['plan']['items'];
                        }
                }

                if(!empty($response['data']['plan']['votes']))
                {
                        if(isset($response['data']['plan']['votes'][0]))
                        {
                                foreach($response['data']['plan']['votes'] as $vote)
                                {
                                        $data['plan']['votes'][$vote['planSuggestionsId']][$vote['userId']]    =   $vote;
                                }
                        }
                        else
                        {
                                $data['plan']['votes'][$response['data']['plan']['votes']['planSuggestionsId']][$response['data']['plan']['votes']['userId']]    =   $response['data']['plan']['votes'];
                        }
                }

                foreach($response['data']['plan']['plansuggestions'] as $value)
                {
                    if($data['plan']['status'] != 'open')
                    {
                        if($value['isActive'])
                        {
                            if(isset($data['plan']['votes'][$value['id']]))
                                    $data['plan']['suggestions'][count($data['plan']['votes'][$value['id']])][]  =   $value;
                            else
                                    $data['plan']['suggestions'][0][]  =   $value;
                        }
                    }
                    else
                    {
                        if(isset($data['plan']['votes'][$value['id']]))
                                $data['plan']['suggestions'][count($data['plan']['votes'][$value['id']])][]  =   $value;
                        else
                                $data['plan']['suggestions'][0][]  =   $value;
                    }
                }
                
                
                sort($data['plan']['duration'],SORT_NATURAL);
                $data['plan']['duration']   =   $this->getController()->findTime(end($data['plan']['duration']));
                
                $data['plan']['votesCount'] = array_keys($data['plan']['suggestions']);
                rsort($data['plan']['votesCount']);

                $this->getController()->render('index',$data);
        }

    }
}