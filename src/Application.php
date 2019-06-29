<?php

namespace Ynov;

class Application
{
    public function bootstrap()
    {
        if (!empty($_GET))
        {
        $adress = urlencode($_GET['addresse']);
        $adressName = new Geolocation\Adresse($adress);
        $donationAdress = new Geolocation\Adresse('http://api.openeventdatabase.org/event/?what=health.blood.collect&when=today&limit=500');
        $donationAdressArray = $donationAdress->getDonationAdress('http://api.openeventdatabase.org/event/?what=health.blood.collect&when=today&limit=500');
        $adressArray = $adressName->getYourAdress($adress);
        $adressX = $adressName->getX($adressArray);
        $adressY = $adressName->getY($adressArray);
        $donationAdressY = $donationAdress->getAllDonationY($donationAdressArray);
        $donationAdressX = $donationAdress->getAllDonationX($donationAdressArray);
        $counter = sizeof($donationAdressX);
        for($i = 0; $i < $counter; $i++){
            $calculDistance = new Geolocation\Calcul($adressX,$adressY,$donationAdressX[$i],$donationAdressY[$i]);
            $calculusArray[] = $calculDistance->CalculDistance($adressY,$adressX,$donationAdressY[$i],$donationAdressX[$i]);
        }
        $closeAdress = new Geolocation\AdresseDonDeSang($calculusArray);
        $closeAdress->DisplayAvailable($calculusArray);
        }
    }
}
