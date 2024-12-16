<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    function public(Request $request){ 

        return response()->json([
            "This is a public site"
        ]);
    }
        
  

    function private(Request $request){
        return response()->json([
            "This is a private site"
        ]);
        
    }
    function secret(Request $request){
        return response()->json([
            'message' => 'This is a secret site'
        ]);
    }

    function FileDownload(Request $request){
        return response()->json([
            'message' => 'This is a FileDownload site'
        ]);
    }

    function massage(Request $request){
        return response()->json([
            'message' => 'This is a massage site'
        ]);
    }

    function content(Request $request){
        $headers = $request->headers->all();
            
        return response()->json([
            'message' => 'This is a BD site',
            'headers' => $headers
        ]);
    }
    function upload(Request $request){
        return response()->json([
            'message' => 'This is a upload site'
        ]);
    }
}
