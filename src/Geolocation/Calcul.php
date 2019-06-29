<?php

namespace Ynov\Geolocation;

class Calcul
{
    private $x;
    private $y;
    private $donationx;
    private $donationy;

    public function __construct(float $x, float $y, float $donationx, float $donationy)
    {
        $this->x = $x;
        $this->y = $y;
        $this->donationx = $donationx;
        $this->donationy = $donationy;
    }
    public function CalculTest()
    {
        $calcul = rad2deg(acos(sin(deg2rad($this->y))*sin(deg2rad($this->donationy))+cos(deg2rad($this->y))*cos(deg2rad($this->donationy))*cos(deg2rad($this->donationx) - deg2rad($this->x))));
        $calcul = round($calcul,2);
        return $calcul;
    }
    public function CalculDistance($lat1, $lng1, $lat2, $lng2, $unit = 'k')
    {
        $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
        $rlo1 = deg2rad($lng1);
        $rla1 = deg2rad($lat1);
        $rlo2 = deg2rad($lng2);
        $rla2 = deg2rad($lat2);
        $dlo = ($rlo2 - $rlo1) / 2;
        $dla = ($rla2 - $rla1) / 2;
        $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo));
        $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
        //
        $meter = ($earth_radius * $d);
        if ($unit == 'k') {
            return $meter / 1000;
        }
        return $meter;
    }
}
