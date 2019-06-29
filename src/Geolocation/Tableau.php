<?php 

namespace Ynov\Geolocation;

class Tableau
{
    public function GetClosestAddressKey($calculusArray)
    {
        asort($calculusArray);
        $closestAddressesKey[] = array_key_first($calculusArray);
        unset($calculusArray[$closestAddressesKey[0]]);
        $closestAddressesKey[] = array_key_first($calculusArray);
        unset($calculusArray[$closestAddressesKey[1]]);
        return $closestAddressesKey;
    }
}