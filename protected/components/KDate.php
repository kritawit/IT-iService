<?php

class KDate {
    public function getNowThai() {
        return date("d-m-").(date("Y") + 543);
    }
    
    public function getNowAddYearThai($next_year) {
        $d = date("d");
        $m = date("m");
        $y = date("Y") + $next_year + 543;
        
        return "$d-$m-$y";
    }
    
    public function convertThaiToMysqlDate($date) {
        $arr = explode("/", $date);
        $y = $arr[2];
        $m = $arr[1];
        $d = $arr[0];
        
        return "$y-$m-$d";
    }
    
   /* public function convertMysqlToThaiDate($date) {
        $arr = explode("-", $date);
        $y = $arr[0];
        $m = $arr[1];
        $d = $arr[2];
        
        return "$d/$m/$y";
    }*/
    public function convertMysqlToThaiDate($date) {
        $arr = explode("-", $date);
        $y = $arr[0];
        $m = $arr[1];
        $d = $arr[2];
        
        return "$d-$m-$y";
    }
    
    public function getMonth() {
        $arr = array(
            "มกราคม",
            "กุมภาพันธ์",
            "มีนาคม",
            "เมษายน",
            "พฤษภาคม",
            "มิถุนายน",
            "กรกฏาคม",
            "สิงหาคม",
            "กันยายน",
            "ตุลาคม",
            "พฤศจิกายน",
            "ธันวาคม"
        );
        return $arr;
    }
    
    public function getYear() {
        $currentYear = date("Y");
        $prevYear = $currentYear - 5;
        
        $arr = array();
        for ($i = $prevYear; $i <= $currentYear; $i++) {
            $arr[$i] = $i;
        }
        return $arr;
    }
}