<?php

namespace App\Http\Controllers;
use App\Http\Controllers\log;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    function demo1(Request $request){
        //Store data in session
        $request->session()->put(' User_email', 'shumon@gmail.com');
       return "Store data in Successfully";
    }

    function demo2(Request $request){
        //Retrieve date

        $value=$request->session()->get(' User_email', '0');
        return $value;
    }

    function demo3(Request $request){   
        //Session flash
        $request->session()->flush();
        return "Session flush";
    }

    function demo4(Request $request){

        Log::error($request->url());
        return "Logging Successfully";
    }

    function demo5(Request $request){
        $num1 =10;
        $num2 =20;
       $sum= $num1+$num2;
       return dd($sum);

    }

    function demo6(Request $request)
    {
        try{
            $num1 =10;
            $num2 =20;
            $sum= $num1+$num2;
            return $sum;
        }catch(Exception $e){
            Log::error($e);
            return $e->getMessage();
        }
        
    }
    }


