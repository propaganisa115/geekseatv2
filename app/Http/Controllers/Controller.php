<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    public function witch(Request $request){
        $data = $request->json()->all();
        $alphas = range('A', 'Z');
        $killed=[];
        $check="";
        
        for ($x = 1; $x <= COUNT($data); $x++) {    
            $year=$data[$x-1]["year"];
            $age=$data[$x-1]["age"];
            
            if((int)$year <0 or (int)$age <0 ){
                $check="invalid input";
            }else{
                $result=((int)$year)-((int)$age);
                $nkilled=0;

                for ($counter = 0; $counter < $result; $counter++){  
                    $nkilled += $this->Fibonacci($counter+1); 
                }
                array_push($killed,"Person ".$alphas[$x-1]." born on Year = ". $year." - ".$age." = ".$result." , number of people killed on year ".$result." is ".$nkilled);
               
            }
        } 
       
    if($check != ""){
        return $check;
    }else{
        foreach ($killed as $key) {
            print($key.'<br>');
        } 
    }
        
    }
    public function Fibonacci($number){
        if ($number == 0)
            return 0;    
        else if ($number == 1)
            return 1;    
          
        else
            return ($this->Fibonacci($number-1) + $this->Fibonacci($number-2));
    }
}
