<?php

namespace App\Http\Controllers;

use App\Epaper;
use App\EpaperLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class EpaperLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $link=$request->htlmcode;
        $coordinate=$request->img_coords;
        // dd($coordinate[0]);
        $file=$request->img_file;
        $epaper_id=$request->epaper_id;
        // dd($epaper_id);
        $epaper=Epaper::find($epaper_id);
        $epaper['map_id']=$request->map_id;
        $epaper->update();

        if (!empty($request->img_file)) {
    $array_size = (sizeof($request->img_file));
   foreach ($request->file('img_file') as $i => $image) {
    if (!empty($image) &&$coordinate[$i]!=null) {
     $path = public_path() . '/epaperlink_image';
     $pimage = uniqid() . '_' . $image->getClientOriginalName();
     $pimage=str_replace(' ','_',$pimage);
    //  $href=asset('/epaperlink_image/'.$pimage);
     $href=$pimage;
      $linkhref=route("front.paperimage",$href);
    $link='<area shape="rect" alt="" title="" coords="'.$coordinate[$i].'" href="'.$linkhref.'" target="_blank" />';
    //  $linkhref='"{!!route("front.paperimage",'.$href.')!!}"';
    //  dd($linkhref);
    //  dd($href);
    //  $link='<area shape="rect" alt="" title="" coords="'.$coordinate[$i].'" href='.$href.' target="_blank" />';
    // {{route('front.paperimage',$href)}}
    //  $link='<area shape="rect" alt="" title="" coords="'.$coordinate[$i].'" href="{{route("front.paperimage",'.$href.')}}" target="_blank" />';

     if ($image->move($path, $pimage)) {
      $status = EpaperLink::create([
       'image' => $pimage,
       'title' => $image->getClientOriginalName(),
       'epaper_id' => $request->epaper_id,
       'map_id' => $request->map_id,
       'coordinate' => $coordinate[$i],
       'link' => $link,


      ]);
     }
    }

   }

  }

              if($status) {
            Session::flash('success','Information Updated successfully.');
        }
        else {
            Session::flash('error','Information Cannot be Update');
        }
        return redirect()->route('epaper.managelinks', [$epaper_id]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EpaperLink  $epaperLink
     * @return \Illuminate\Http\Response
     */
    public function show(EpaperLink $epaperLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EpaperLink  $epaperLink
     * @return \Illuminate\Http\Response
     */
    public function edit(EpaperLink $epaperLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EpaperLink  $epaperLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EpaperLink $epaperLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EpaperLink  $epaperLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(EpaperLink $epaperLink)
    {
        dd($epaperLink->title);
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
    public function updatelink(Request $request)
    {
        // dd($request);
        $link=$request->htlmcode;
        $coordinate=$request->img_coords;
        // dd($coordinate[0]);
        $file=$request->img_file;
        $epaper_id=$request->epaper_id;
        // dd($epaper_id);
        $epaper=Epaper::find($epaper_id);
        $map_id=$epaper->map_id;
        // dd($map_id);
        // $epaper['map_id']=$request->map_id;
        // $epaper->update();
        $eplink=EpaperLink::where('epaper_id',$epaper_id)->get();
        foreach($eplink as $ep)
        {
            $tmpname='img_filetmp'.$ep->id;
        // dd($tmpname);
           $tmpimage = '';
        if (!empty($request->file($tmpname))) {
            $file = $request->file($tmpname);
            $path = public_path() . '/epaperlink_image';
            $name = uniqid() . '_' . $file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            // $href=asset('/epaperlink_image/'.$name);
            $href=$name;
            $linkhref=route("front.paperimage",$href);
            $link='<area shape="rect" alt="" title="" coords="'.$ep->coordinate.'" href="'.$linkhref.'" target="_blank" />';
    //  dd($linkhref);
            // $link='<area shape="rect" alt="" title="" coords="'.$coordinate[$i].'" href="{{route("front.paperimage",'.$href.')}}" target="_blank" />';

            if ($file->move($path, $name)) {
                $ep['image']=$name;
                $ep['link']=$link;
                $ep['map_id']=$map_id;
                $ep->update();

            }
        }

        }

        if (!empty($request->img_file)) {
    $array_size = (sizeof($request->img_file));
   foreach ($request->file('img_file') as $i => $image) {
    if (!empty($image) &&$coordinate[$i]!=null) {
     $path = public_path() . '/epaperlink_image';
     $pimage = uniqid() . '_' . $image->getClientOriginalName();
     $pimage=str_replace(' ','_',$pimage);
    //  $href=asset('/epaperlink_image/'.$pimage);
     $href=$pimage;
            $linkhref=route("front.paperimage",$href);
    //  dd($href);
     $link='<area shape="rect" alt="" title="" coords="'.$coordinate[$i].'" href="'.$linkhref.'" target="_blank" />';
    //  $link='<area shape="rect" alt="" title="" coords="'.$coordinate[$i].'" href="'.$href.'" target="_blank" />';

     if ($image->move($path, $pimage)) {
      $status = EpaperLink::create([
       'image' => $pimage,
       'title' => $image->getClientOriginalName(),
       'epaper_id' => $request->epaper_id,
       'map_id' => $map_id,
       'coordinate' => $coordinate[$i],
       'link' => $link,


      ]);
     }
    }

   }

  }

        return redirect()->route('epaper.managelinks', [$epaper_id]);



    }
    public function deletesingle($id=null)
    {
        $epaperlink=EpaperLink::find($id);
        $epaper_id=$epaperlink->epaper_id;
        // dd($epaper_id);

        // dd($id);
          $status = $epaperlink->delete();
        if ($status) {
            $imagepath = public_path() . '/epaperlink_image' . $epaperlink->image;
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
        return redirect()->route('epaper.managelinks', [$epaper_id]);
        // return redirect('backend/epaper');
    }
}
