<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    function index(){
        return "hualo";
    }

    function home(){
        $profile = [
            "user1" => 
                ["nama" => "Rizky",
                "alamat" => "ngagel",],
            "user2" => 
                ["nama" => "asda",
                "alamat" => "cc",],
        ];
        return view('pages.home',[
            'data' => $profile
        ]);
    }

    function about(){
        return view('pages.about');
    }

    function setCookie(Request $request){
        $menit = 2;
        $response = response("berhasil");
        $response->withCookie(cookie('user','halo',$menit));
        // dd($value = $request->cookie('user'));
        return $response;
    }

    function getCookie(Request $request){
        $value = $request->cookie('user');
        return response()->json(['cookie_value' => $value]);
    }

    function setSession(Request $request){
        $request->session()->put('user','halo');
        // return response('session ter set');
        if ($request->session()->has('user')) {
            $value = $request->session()->get('user');
            return response()->json(['session_value' => $value]);
        }
        else {
            return response()->json(['message' => 'not found']);
        }
    }

    function getSession(Request $request){
        if ($request->session()->has('user')) {
            $value = $request->session()->get('user');
            return response()->json(['session_value' => $value]);
        }
        else {
            return response()->json(['message' => 'not found']);
        }
    }

    function customer(){
        return view('halamanCustomer');
    }

}
