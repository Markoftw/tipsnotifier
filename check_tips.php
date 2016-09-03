<?php

require_once 'init.php';

//667h-55we3491-41a49939g = token example
//$token = Connections::Token();
//echo $token;

//pau_gasol = 53428
//eemurla = 5639
//zami = 3745
//carloo = 77480
//allee = 1341
//bbbombe = 287767

$users = array(53428, 5639, 77480, 1341, 3745);

foreach ($users as $user) {

    $feed = Connections::Connection("http://www.bettingexpert.com/api/tips/tips/list/0/0/0/0/" . $user . "/0", "667h-55we3491-41a49939g"); // change me (token)
    $json = json_decode($feed);

    if (count($json->result)) { //check if any tips exist from user
        foreach ($json->result as $tip) {
            if (DB::checkExists($tip->intTipId) == false && !empty($tip->intTipId)) {
                /*
                 * 0 = ID, 1 = UserId, 2 = username, 3 = MatchTitle, 4 = BetType, 5 = SelectionType, 6 = Stake, 7 = Odds, 8 = CountryName, 9 = LeagueName, 10 = Link, 11 = strName,
                 *  12 = MatchTime, 13 = CratedTime
                 */
                $values = array($tip->intTipId, $tip->arrTipAuthor->intUserId, $tip->arrTipAuthor->strUsername, $tip->strMatchTitle, $tip->strBetType, $tip->strSelectionType,
                    $tip->intStake, $tip->fltOdds, $tip->strCountryName, $tip->strLeagueName, $tip->strLink, $tip->arrAffiliate->strName, $tip->intMatchTime, $tip->intCreatedTime);
                //print_r($values);
                if ($tip->fltOdds >= 2.4) { // odds limit
                    DB::insert($values);
                    Mailer::sendMsg($values);
                }
            } else {
                //
            }
        }
    } else {
        echo "Error: No tips from user " . $user . "!<br>\n";
    }
}
