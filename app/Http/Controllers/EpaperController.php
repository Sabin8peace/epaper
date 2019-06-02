<?php

namespace App\Http\Controllers;

use DateTime;
use App\Epaper;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class EpaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function epaperdate(Request $request)
    {
        $epaperdate = $request->datetime;
        return redirect()->route('epaper.create')->withCookie(cookie()->forever('epaperdate', $epaperdate));

    }
    public function indexmain(Request $request)
    {
        // dd($request);
        if ($request->datetime == null) {
            $date = new DateTime("now", new DateTimeZone('Asia/Kathmandu'));
            $date = $date->format('Y-m-d 00:00:00');

        } else {
            $date = strtotime($request->datetime);
            $date = date('Y-m-d 00:00:00', $date);
            // $date = $date->format('Y-m-d 00:00:00');

        }
        // dd($date);
        $epaper = Epaper::where('datetime', $date)->orderBy('id', 'desc')->paginate(20);
        //  $images = Epaper::orderBy('id', 'desc')->get();

        return view('backend.epaper.index', compact('epaper'));
    }
    public function managelinks($id = null)
    {
        // dd($id);
        $data = Epaper::where('id', $id)->first();
        $date=$data->datetime;
        $epapers=Epaper::where('datetime',$date)->get();
        $message="sabin";



                    if (($data->epaperLinks->count())>0)
                    {
                        $message="";




                    }






        // dd($epapers);


        return view('backend.epaper.managelinks', compact('data','epapers','message'));
    }
    public function index()
    {
        $date = new DateTime("now", new DateTimeZone('Asia/Kathmandu'));
        $date = $date->format('Y-m-d 00:00:00');
        $epaper = Epaper::where('datetime', $date)->orderBy('id', 'desc')->paginate(20);
        //  $images = Epaper::orderBy('id', 'desc')->get();

        return view('backend.epaper.index', compact('epaper'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $epaper = new Epaper;
        // dd($epaper);
        return view('backend.epaper.create', compact('epaper'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $title = $request->title;
        $extra1 = $request->extra1;

        // $images = array();

        //    if (!empty($request->file('image'))) {
        //     $file = $request->file('image');
        //     $path = public_path() .'/news_epaper/';
            // if (!file_exists($path)) {
            //     mkdir($path);
            // }
        //     $name = uniqid() . '_' . $file->getClientOriginalName();
        //     $name=str_replace(' ','_',$name);
        //     $image_resize = Image::make($file->getRealPath());
        //     // $dimension=$request->image_dimension;
        //     // $dimtmp=explode('x',$dimension);

        //     $image_resize->resize(500, 600);
        //     if ($image_resize->save($path . $name)) {
        //         $image = $name;
        //         // dd($image);
        //         $input['image'] = $image;
        //     }
        // }

        if (!empty($request->image)) {
            $array_size = (sizeof($request->image));
            foreach ($request->file('image') as $i => $image) {
                if (!empty($image)) {
                    $path = public_path() . '/news_epaper/';
                         if (!file_exists($path)) {
                mkdir($path);
            }
                    $pimage = uniqid() . '_' . $image->getClientOriginalName();
                    $pimage = str_replace(' ', '_', $pimage);
                    $image_resize = Image::make($image->getRealPath());
            // $dimension=$request->image_dimension;
            // $dimtmp=explode('x',$dimension);

            $image_resize->resize(500, 600);
            if ($image_resize->save($path . $pimage)) {
                // $image = $pimage;
                // dd($image);
                // $input['image'] = $pimage;
            // }
                    // if ($image->move($path, $pimage)) {
                        $status = Epaper::create([
                            'image' => $pimage,
                            //    'news_id' => $request->news_id,
                            'datetime' => $request->datetime,
                            'title' => 'page' . $i,
                            //    'extra1' => $extra1,

                        ]);
                    }
                }

            }

        }
        // if (!empty($request->image)) {
        //     $array_size = (sizeof($request->image));
        //     foreach ($request->file('image') as $i => $image) {
        //         if (!empty($image)) {
        //             $path = public_path() . '/news_epaper';
        //             $pimage = uniqid() . '_' . $image->getClientOriginalName();
        //             $pimage = str_replace(' ', '_', $pimage);
        //             if ($image->move($path, $pimage)) {
        //                 $status = Epaper::create([
        //                     'image' => $pimage,
        //                     //    'news_id' => $request->news_id,
        //                     'datetime' => $request->datetime,
        //                     'title' => 'page' . $i,
        //                     //    'extra1' => $extra1,

        //                 ]);
        //             }
        //         }

        //     }

        // }


        return redirect('backend/epaper');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Epaper  $epaper
     * @return \Illuminate\Http\Response
     */
    public function show(Epaper $epaper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Epaper  $epaper
     * @return \Illuminate\Http\Response
     */
    public function edit(Epaper $epaper)
    {
        return view('backend.epaper.edit', compact('epaper'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Epaper  $epaper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Epaper $epaper)
    {
        $input = $request->all();
        // dd($input);
        if($request->datetime==null)
        {
            $input['datetime']=$request->datetimetmp;
        }
        // dd($input);


        // $image = '';
        // if (!empty($request->file('image'))) {
        //     $file = $request->file('image');
        //     $path = public_path() . '/news_epaper';
        //     $name = uniqid() . '_' . $file->getClientOriginalName();
        //     $name = str_replace(' ', '_', $name);
        //     if ($file->move($path, $name)) {
        //         $image = $name;
        //         $input['image'] = $image;
        //     }
        // }


        //new way


        if (!empty($request->file('image'))) {
            $file = $request->file('image');
            $path = public_path() .'/news_epaper/';
            if (!file_exists($path)) {
                mkdir($path);
            }
            $name = uniqid() . '_' . $file->getClientOriginalName();
            $name=str_replace(' ','_',$name);
            $image_resize = Image::make($file->getRealPath());
            // $dimension=$request->image_dimension;
            // $dimtmp=explode('x',$dimension);

            $image_resize->resize(500, 600);
            if ($image_resize->save($path . $name)) {
                $image = $name;
                // dd($image);
                $input['image'] = $image;
            }
        }


        $status = $epaper->update($input);
        if ($status) {
            Session::flash('success', 'Information Updated successfully.');
        } else {
            Session::flash('error', 'Information Cannot be Update');
        }
        return redirect('backend/epaper');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Epaper  $epaper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Epaper $epaper)
    {
       $status = $epaper->delete();
        if ($status) {
            $imagepath = public_path() . '/news_epaper' . $epaper->image;
            if (File::exists($imagepath)) {
                File::delete($imagepath);
            }
            // if (File::exists($authorimagepath)) {
            //     File::delete($authorimagepath);
            // }
            Session::flash('success', 'Information deleted successfully.');
        } else {
            Session::flash('error', 'Information cannot be deleted.');
        }
        return redirect('backend/epaper');
    }
}
