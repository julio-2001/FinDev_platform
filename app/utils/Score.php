<?php

namespace App\utils;

class Score
{
    public static function calculateN($NV, $NC)
    {
        $N = 100 - 25 * ($NV - $NC);

        return $N;
    }

    public static function arrayDistances($distances)
    {
        $_distArr = array();
        foreach ($distances as $d) {
            $_distArr[$d->start_location_id][$d->end_location_id] = $d->distance;
        }
        return  $_distArr;
    }

    public static function score($NV, $NC, $a, $b, $_distArr)
    {
        //initialize the array for storing
        $S = array(); //the nearest path with its parent and weight
        $Q = array(); //the left nodes without the nearest path
        foreach (array_keys($_distArr) as $val) $Q[$val] = 99999;
        $Q[$a] = 0;

        //start calculating
        while (!empty($Q)) {
            $min = array_search(min($Q), $Q); //the most min weight
            if ($min == $b) break;
            foreach ($_distArr[$min] as $key => $val) if (!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
                $Q[$key] = $Q[$min] + $val;
                $S[$key] = array($min, $Q[$key]);
            }
            unset($Q[$min]);
        }

        //list the path
        $path = array();
        $pos = $b;
        while ($pos != $a) {
            $path[] = $pos;
            $pos = $S[$pos][0];
        }
        $path[] = $a;
        $path = array_reverse($path);

        $result = 0;
        if ($a == $b) {
            $result = 100;
            return ($result + Score::calculateN($NV, $NC)) / 2;
        } elseif ($S[$b][1] >= 0 && $S[$b][1] <= 5) {
            $result = 100;
        } elseif ($S[$b][1] >= 5 && $S[$b][1] <= 10) {
            $result = 75;
        } elseif ($S[$b][1] >= 10 && $S[$b][1] <= 15) {
            $result = 50;
        } elseif ($S[$b][1] >= 15 && $S[$b][1] <= 20) {
            $result = 25;
        } elseif ($S[$b][1] > 20) {
            $result = 0;
        }

        return ($result + Score::calculateN($NV, $NC)) / 2;
    }
};
