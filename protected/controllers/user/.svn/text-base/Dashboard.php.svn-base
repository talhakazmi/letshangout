<?php
/*
* method for ajax call for created event via ajax
*/
class Dashboard extends CAction
{
    
    public function run()
    {
        $this->getController()->layout = 'plan/content';
        
        $baseUrl = Yii::app()->baseUrl; 
        /*
         * Inculde page specific JS and CSS
         */
        $includes = Yii::app()->getClientScript();
        //CSS inclusion
        $includes->registerCssFile($baseUrl.'/assets/css/custom-glyphs.css');
        $includes->registerCssFile($baseUrl.'/assets/css/jquery.mCustomScrollbar.css');

        $includes->registerScriptFile($baseUrl.'/assets/js/app/plan-onready.js');
        $includes->registerScriptFile($baseUrl.'/assets/js/lib/jquery.mCustomScrollbar.js');
        $includes->registerScriptFile($baseUrl.'/assets/js/lib/isotope.pkgd.min.js');
        Yii::app()->clientScript->registerScript('isotope', 'var $container = $(".isotope").isotope({
                                                                                        itemSelector: \'.element-item\',
                                                                                        layoutMode: \'fitRows\',
                                                                                      });
                                                                    $(\'.filter\').on(\'change\',\'input[type=radio]\',function() {
                                                                        $container.isotope({ filter: \'.\'+this.id });
                                                                    });', CClientScript::POS_READY);
        
        $requestMyPlan['url']            =   Yii::app()->params['apiUrl'].'api/plan';
        $requestMyPlan['get']['sort']    =   '[{"property":"status", "direction":"ASC"},{"property":"plansuggestions.createdDate", "direction":"DESC"}]';             
        $requestMyPlan['get']['filter']  =   '[{"property":"userId", "value":"'.Yii::app()->user->getId().'", "operator":"="},{"property":"status", "value":["cancelled", "closed"], "operator":"not in"}]';             
        
        $responseMyPlan   =   $this->getController()->httpRequest($requestMyPlan);

        $requestInvitedPlan['url']            =   Yii::app()->params['apiUrl'].'api/plan';
        $requestInvitedPlan['get']['sort']    =   '[{"property":"status", "direction":"ASC"},{"property":"plansuggestions.createdDate", "direction":"DESC"}]';             
        $requestInvitedPlan['get']['filter']  =   '[{"property":"friends.friendId", "value":"'.Yii::app()->user->getId().'", "operator":"="},{"property":"status", "value":["cancelled", "closed"], "operator":"not in"}]';             
        
        $responseInvitedPlan   =   $this->getController()->httpRequest($requestInvitedPlan);
        
        if($responseMyPlan['success'])
            $response = array_reduce ($responseMyPlan['data']['plan'],function($result,$myPlan){$result[] = $myPlan;return $result;});
        else
            $response   =   array();
            
        if($responseInvitedPlan['success'])
            $response = array_merge($response, array_reduce ($responseInvitedPlan['data']['plan'],function($result,$invitedPlan){$result[] = $invitedPlan;return $result;}));
                
        $live   =   0;
        $open   =   0;
        $confirmed   =   0;
        if(!empty($response))
        {
            foreach($response as $plan)
            {
                $plan['userId']                 =   $plan['user']['id'];
                $plan['userName']               =   $plan['user']['name'];
                $plan['userEmail']              =   $plan['user']['email'];
                $data['plan']['planinvites']    =   $plan['planinvites'];
                $plan['suggestionsCount']       =   count($plan['plansuggestions']);
                switch($plan['status']){
                    case 'open':
                        $open++;
                        break;
                    case 'live':
                        $live++;
                        break;
                    case 'confirmed':
                        $confirmed++;
                        break;
                }
                //$data['plan']['invitedFriends'] =   $plan['invited'];
                //$data['plan'][]['votes']          =   $plan['votes'];

                if(!empty($plan['sessions']))
                {
                    if(isset($plan['sessions'][0]))
                    {
                        foreach($plan['sessions'] as $session)
                        {
                            $data['plan']['sessions'][$session['id']]   =   $session;
                            $plan['duration'][] =   $session['startTime'];
                        }
                    }
                    else
                    {
                        $data['plan']['sessions'][$plan['sessions']['id']]   =   $plan['sessions'];
                        $plan['duration'][] =   $plan['sessions']['startTime'];
                    }
                }

                $plan['sessions']   =   $data['plan']['sessions'];

                if(!empty($plan['stateroom']))
                {
                    if(isset($plan['stateroom'][0]))
                    {
                        foreach($plan['stateroom'] as $stateroom)
                        {
                            $data['plan']['staterooms'][$stateroom['id']]   =   $stateroom;
                        }
                    }
                    else
                    {
                        $data['plan']['staterooms'][$plan['stateroom']['id']]   =   $plan['stateroom'];
                    }
                }

                $plan['stateroom']   =   $data['plan']['staterooms'];

                if(!empty($plan['venue']))
                {
                    if(isset($plan['venue'][0]))
                    {   
                        foreach($plan['venue'] as $venue)
                        {
                            $data['plan']['venues'][$venue['id']]   =   $venue;
                        }
                    }
                    else 
                    {
                        $data['plan']['venues'][$plan['venue']['id']]   =   $plan['venue'];
                    }
                }

                $plan['venue']   =   $data['plan']['venues'];

                if(!empty($plan['items']))
                {
                    if(isset($plan['items'][0]))
                    {
                        foreach($plan['items'] as $item)
                        {
                            $data['plan']['items'][$item['id']]   =   $item;
                        }
                    }
                    else 
                    {
                        $data['plan']['items'][$plan['items']['id']]   =   $plan['items'];
                    }
                }

                $plan['items']   =   $data['plan']['items'];

                if(!empty($plan['votes']))
                {
                    if(isset($plan['votes'][0]))
                    {
                        foreach($plan['votes'] as $vote)
                        {
                            $plan['votingStatus'][$vote['planSuggestionsId']]   =   ($vote['userId']==Yii::app()->user->getId())?'1':'0';
                            $data['plan']['votes'][$vote['planSuggestionsId']][]    =   $vote;
                        }
                    }
                    else
                    {
                        $plan['votingStatus'][$plan['votes']['planSuggestionsId']]   =   ($plan['votes']['userId']==Yii::app()->user->getId())?'1':'0';
                        $data['plan']['votes'][$plan['votes']['planSuggestionsId']][]    =   $plan['votes'];
                    }
                }

                $plan['votes']   =   (!empty($data['plan']['votes'])?$data['plan']['votes']:array());
                
                $count  =   1;
                if($plan['status'] == 'open')
                    $isActiveCheck  =   1;
                else
                    $isActiveCheck  =   0;
                
                foreach($plan['plansuggestions'] as $value)
                {   
                    if($isActiveCheck)
                    {
                        if($value['isActive'] == 1 || empty($plan['adminsuggestion']))
                        {
                            $plan['adminsuggestion']    =   $value;
                        }  
                        if($count < 3)
                        {
                            if(isset($data['plan']['votes'][$value['id']]))
                                $data['plan']['suggestions'][count($data['plan']['votes'][$value['id']])][]  =   $value;
                            else
                                $data['plan']['suggestions'][0][]  =   $value;
                        }
                        $count++;
                    }
                    else
                    {
                        //if($value['isActive'] == 1)
                        //{
                            if($value['isActive'] == 1)
                            {
                                $plan['adminsuggestion']    =   $value;
                            }
                            if($count < 3)
                            {
                                if(isset($data['plan']['votes'][$value['id']]))
                                    $data['plan']['suggestions'][count($data['plan']['votes'][$value['id']])][]  =   $value;
                                else
                                    $data['plan']['suggestions'][0][]  =   $value;
                            }
                            $count++;
                        //}
                    }
                }

                $plan['plansuggestions']   =   (!empty($data['plan']['suggestions'])?$data['plan']['suggestions']:array());

                $plan['votesCount'] = array_keys($plan['plansuggestions']);
                rsort($plan['votesCount']);
                $planDetails['plan'][] =   $plan;
                $data   =   array();
            }
            
            $this->getController()->render('dashboard', array('planDetails'=>$planDetails,'openCount'=>$open,'liveCount'=>$live,'confirmedCount'=>$confirmed));
        }
        else
        {
            $this->getController()->render('dashboard', array('openCount'=>$open,'liveCount'=>$live,'confirmedCount'=>$confirmed));
        }
    }
}