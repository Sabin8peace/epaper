<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use App\Pages;
use App\EpaperLink;
use App\Epaper;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


//epaper

    public function epaperdate(Request $request)
    {

        $date=$request->datetime;
        return $this->epaper($date);

    }

    public function epaper($date=null,$page=null)
    {

         if ($date == null && $page == null) {
            $date = new DateTime("now", new DateTimeZone('Asia/Kathmandu'));
            $date = $date->format('Y-m-d 00:00:00');
            $data = Epaper::where('datetime', $date)->orderBy('id', 'asc')->first();
            $epaperimage = Epaper::where('datetime', $date)->orderBy('id', 'asc')->get();

        }
        elseif ($date != null && $page == null)
        {

            // dd($epaperimage);
            $date = strtotime($date);
            $date = date('Y-m-d 00:00:00', $date);
            $data = Epaper::where('datetime', $date)->orderBy('id', 'asc')->first();
            $epaperimage = Epaper::where('datetime', $date)->orderBy('id', 'asc')->get();



        }
        else {
            // dd($date,$page);
            $date = strtotime($date);
            $date = date('Y-m-d 00:00:00', $date);
            $data = Epaper::where('datetime', $date)->where('id', $page)->first();
            $epaperimage = Epaper::where('datetime', $date)->orderBy('id', 'asc')->get();

            // $date = $date->format('Y-m-d 00:00:00');

        }


        return view('frontend/epaper',compact('epaperimage','data'));
    }

//epaper
}
