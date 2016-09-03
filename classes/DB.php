<?php

class DB
{

    public static function checkExists($id)
    {
        global $mysqli;
        $request = $mysqli->prepare("SELECT * FROM history WHERE TipId = :tipid");
        $request->execute(array(
            'tipid' => $id
        ));
        //$results = $request->fetchAll(PDO::FETCH_OBJ);
        //return $results;
        $results = $request->rowCount();
        if ($results == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function insert($values)
    {
        global $mysqli;
        $request = $mysqli->prepare("INSERT INTO history(TipId,UserId,strUsername,MatchTitle,BetType,SelectionType,Stake,Odds,CountryName,LeagueName,Link,strName,MatchTime,CreatedTime,Added) VALUES (:TipId,:UserId,:strUsername,:MatchTitle,:BetType,:SelectionType,:Stake,:Odds,:CountryName,:LeagueName,:Link,:strName,:MatchTime,:CreatedTime,NOW())");
        $request->execute(array(
            "TipId" => $values[0],
            "UserId" => $values[1],
            "strUsername" => $values[2],
            "MatchTitle" => $values[3],
            "BetType" => $values[4],
            "SelectionType" => $values[5],
            "Stake" => $values[6],
            "Odds" => $values[7],
            "CountryName" => $values[8],
            "LeagueName" => $values[9],
            "Link" => $values[10],
            "strName" => $values[11],
            "MatchTime" => $values[12],
            "CreatedTime" => $values[13]
        ));
        if ($request->rowCount() > 1) {
            return true;
        } else {
            return false;
        }

    }
}
