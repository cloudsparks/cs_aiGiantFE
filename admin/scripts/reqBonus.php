<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * This file is contains the functions related to Admin user.
     * Date  21/07/2017.
    **/
	session_start();

    include ($_SERVER["DOCUMENT_ROOT"] . "/include/config.php");
	include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    
    $post = new post();

	$command = $_POST['command'];

    $username   = $_SESSION['username'];
    $userId     = $_SESSION['userID'];
    $sessionID  = $_SESSION['sessionID'];

    if($_POST['type'] == 'logout'){
        session_destroy();
    }
    else{
        switch($command) {
            
            case "getAdminList":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getSponsorBonusReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll'],
                                "usernameSearchType" => $_POST["usernameSearchType"],
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getLaningBonusReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getPairingBonusReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getMatchingBonusReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

	    case "getPlacementReport":
            case "getRebateBonusReport":
            case "getRebateBonusContractReport":
            case "getSponsorBonusContractReport":
            case "getGoldmineBonusReport":
            case "getReleaseBonusReport":
            case "getWaterBucketBonusReport":
            case "getWaterBucketPercentage": 
            case "getTraderBonusContractSubReport":
            case "getRebateBonusContractSubReport":  
            case "getJulyPromoListing":  
            case "cancelledPointJulyPromo":  
            case "getLoyaltyBonusReport":  
            case "getDirectReferalBonusReport":  
            case "getTeamsBonusReport":  
            case "campaignDividendReport":
            case "getManagementBonusReport": 
            case "getClientSurveyListing":  
            case "getClientSurveyData":  
            $params = array();
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;

                    $params[$key] = $value;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getAssetSummaryReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['searchData'],
                                "seeAll"    => $_POST['seeAll']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

               case "getSponsorGoldmineBonusReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll'],
                                "usernameSearchType" => $_POST["usernameSearchType"],
                                "fromUsernameSearchType" => $_POST["fromUsernameSearchType"]
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

              case "getLeadershipBonusReport":
                
                foreach($_POST AS $key => $val){
                    if($key == "command") continue;
                    $params[$key] = $val;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;
                
            case "getAugustRankPromo2022Report":
                
                foreach($_POST AS $key => $val){
                    if($key == "command") continue;
                    $params[$key] = $val;
                }
                $result = $post->curl($command, $params);

                echo $result;
                break;
            
             case "getBonusListing":

                $params = array("pageNumber"    => $_POST['pageNumber'],
                                "onloaded"      => $_POST['onloaded'],
                                "searchData"     => $_POST['searchData'],
                                "usernameSearchType" => $_POST["usernameSearchType"]
                    );
                
                $result = $post->curl($command, $params);

                echo $result;
                
                break;

            case "getTeamBonusReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll'],
                                "usernameSearchType" => $_POST["usernameSearchType"],
                                "fromUsernameSearchType" => $_POST["fromUsernameSearchType"]
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;
            case "getCommunityBonusReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll'],
                                "usernameSearchType" => $_POST["usernameSearchType"],
                                "fromUsernameSearchType" => $_POST["fromUsernameSearchType"]
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;
            case "getGlobalPoolShareReport":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll'],
                                "usernameSearchType" => $_POST["usernameSearchType"],
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;
            case "getDividendBonusReport":
            
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll'],
                                "usernameSearchType" => $_POST["usernameSearchType"],
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;
        }
    }
?>
