@extends('layouts.backmaster')

@section('title', 'epaper')

@section('content_header')
<table style="width:100%">
    <tr>
        {{-- <th class="headtext">epaper</th> --}}
        <th >Change Images </th>
        <th class="pullright-">
            <div class="dropdown pull-right">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Newspaper Images
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    @foreach ($epapers as $item)
                    @if ($item->id==$data->id)
                    <li class="active"><a href="{{route('epaper.managelinks',$item->id)}}">{{$item->title}}</a></li>
                    @else

                    <li><a href="{{route('epaper.managelinks',$item->id)}}">{{$item->title}}</a></li>
                    @endif

                    @endforeach

                </ul>
            </div>
            </div>

        </th>


    </tr>

</table>
@stop

@section('csssec')
<link rel="stylesheet" href="{{ asset('epaper/assets/imgmap.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('epaper/assets/js/colorPicker.css') }}" type="text/css" />
<style>
    hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 1;
    border-top: 1px solid #ca3636;
}
</style>
@stop

@section('jssec')
{{-- <script language="javascript" type="text/javascript" src="{{ asset('epaper/assets/js/jquery-1.3.2.js') }}">
</script> --}}
<script language="javascript" type="text/javascript" src="{{ asset('epaper/assets/js/jquery.colorPicker.js') }}">
</script>
<script type="text/javascript" src="{{ asset('epaper/assets/js/imagemap.js') }}"></script>
<script type="text/javascript" src="{{ asset('epaper/assets/default_interface.js') }}"></script>

<script>
    $(document).ready(function () {
        // alert("SAD");
        gui_loadImage(document.getElementById('source_url2').value);

    });
    // $('#clickme').fine('a').trigger('click');

</script>
@stop

@section('content')

{{-- <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                </a>
            </span>
            <input id="thumbnail" class="form-control" type="text" name="banner_image"
                value="">
        </div> --}}
{{-- <div class="container"> --}}
<div class="row">
    {{-- <div> --}}



    {{-- <div class="row"> --}}
        <div class="col-md-7">

            <fieldset>
                {{-- <legend>
                    <a onclick="toggleFieldset(this.parentNode.parentNode)">Image</a>
                    <a>Image</a>
                </legend> --}}
                <input type="hidden" value="{{asset('/news_epaper/'.$data->image)}}" id="imagedata">

                <div id="pic_container">


                </div>
            </fieldset>
        </div>
        @if ($message=="")

            <form method="post" action="{{route('epaperlink.updatelink')}}" method="post"
                        enctype="multipart/form-data" id="valid_form">
            @else
        <form action="{{route('epaperlink.store')}}" method="POST" enctype="multipart/form-data" id="img_area_form">


            @endif
             {{csrf_field()}}


            <div class="col-md-5" style="height:500px; overflow-y:auto; borde: 1px solid #000000;">

                <fieldset>
                    {{-- <legend>
                        <a onclick="toggleFieldset(this.parentNode.parentNode)">Image map areas</a>
                        <a>Image map areas</a>
                    </legend> --}}


                    @if ($message=="")

                     <table class="table table-bordered">
                        <thead>
                            <th>SN</th>
                            <th>New File</th>
                            <th>Image</th>
                            <th>Action</th>
                        </thead>
                     </table>
                    @endif

                    @foreach ($epapers as $item)
                    @if ($data->id==$item->id)
                    @foreach ($item->epaperLinks as $i=>$e)
                    <table class="table table-bordered">


                        <tbody>
                            <tr>
                                <td>
                                    {{$i}}
                                </td>

                                <td>  <input type="file" name="img_filetmp{{$e->id}}" style="width: 90px;" class="img_file" value="{{$e->image}}" > </td>
                                 <td>
                                <img src="{{asset('/epaperlink_image/'.$e->image)}}" height="50" width="50">

                            </td>
                            <td>
                                    <a href="{{route('epaperlink.deletesingle', $e->id)}}" class="btn btn-danger" data-toggle="tooltip" title="Delete Information" ><i class="fa fa-trash"></i></a>

                            </td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach

                    @endif


                    @endforeach
                    <hr>
                    <label>Add Images For Generated Field</label><br>
                    <div style="border-bottom: solid 1px #efefef">
                        <div id="button_container">
                            <!-- buttons come here -->
                            <img src="{{ asset('epaper/assets/add.gif') }}" width="20px" height="20px"
                                onclick="myimgmap.addNewArea()" alt="Add new area" title="Add new area" />
                            <img src="{{ asset('epaper/assets/delete.gif') }}" width="20px" height="20px"
                                onclick="myimgmap.removeArea(myimgmap.currentid)" alt="Delete selected area"
                                title="Delete selected area" />
                            {{-- <img src="{{ asset('epaper/assets/html.gif') }}" width="30px" height="30px"
                            onclick="gui_htmlShow()"
                            alt="Get image map HTML" title="Get image map HTML" /> --}}

                            <select hidden id="dd_output" onchange="return gui_outputChanged(this)">
                                <option value='imagemap'>Standard imagemap</option>

                            </select>
                            <div>
                                {{-- <a class="toggler toggler_off" onclick="gui_toggleMore();return false;">More actions</a> --}}
                                <div id="more_actions" style="display: none; position: absolute;">
                                    <div><a href="" onclick="toggleBoundingBox(this); return false;">&nbsp; bounding
                                            box</a>
                                    </div>
                                    <div><a href="" onclick="return false">&nbsp; background color </a><input
                                            onchange="gui_colorChanged(this)" id="color1" style="display: none;"
                                            value="#ffffff"></div>
                                </div>
                            </div>
                        </div>
                        {{-- <div style="float: right; margin: 0 5px">
                        <select onchange="changelabeling(this)">
                            <option value=''>No labeling</option>
                            <option value='%n' selected='1'>Label with numbers</option>
                            <option value='%a'>Label with alt text</option>
                            <option value='%h'>Label with href</option>
                            <option value='%c'>Label with coords</option>
                        </select>
                    </div> --}}
                    </div>


                    <table class="table table-bordered">
                        <thead>
                            <th>SN</th>
                            <th>Shape</th>
                            <th>Image</th>
                        </thead>
                    </table>

                    <div id="form_container" style="clear: both;">

                        <!-- form elements come here -->
                    </div>
                </fieldset>
                <fieldset id="fieldset_html" class="fieldset_off">
                    {{-- <legend>
                        <a onclick="toggleFieldset(this.parentNode.parentNode)">Code</a>
                    </legend> --}}
                    <div>
                        <div id="output_help">
                        </div>
                        <textarea id="html_container" name="htlmcode"></textarea>
                    </div>
                </fieldset>
                <input type="hidden" id="map_id" name="map_id" readonly>
                <input type="hidden" id="epaper_id" name="epaper_id" value="{{$data->id}}" readonly>
                <hr style="border:solid 2px black">
                <div class="row" style="padding:10px">
                    <table style="width:100%">
                        <tr>
                            <th> </th>
                            <th class=" pull-right">
                                <button class="btn btn-success form-control">Submit</button> </th>
                        </tr>
                    </table>

                </div>
            </div>

        </form>

    {{-- </div> --}}



    {{-- <fieldset>
                <legend>
                    <a onclick="toggleFieldset(this.parentNode.parentNode)">Status</a>
                </legend>
                <div id="status_container"></div>
            </fieldset> --}}



    {{-- </div> --}}
     <fieldset>
        {{-- <div class="source_desc">An image on the Internet:</div> --}}
        <div class="source_url">
            <input type="hidden" id="source_url2" value="{{asset('/news_epaper/'.$data->image)}}">
        </div>
        {{-- <a href="javascript:gui_loadImage(document.getElementById('source_url2').value)" id="clickme" class="source_accept">accept</a><br/> --}}

        {{-- <div class="source_desc">Use a sample image:</div>
				<div class="source_url">
					<select id="source_url3">
						<option value="assets/img/sample1.png" >sample 1</option>
						<option value="assets/img/sample2.png" >sample 2</option>
						<option value="assets/img/sample3.jpg" >sample 3</option>
						<option value="assets/img/sample4.jpg" >sample 4</option>
					</select>
				</div>
				<a href="javascript:gui_loadImage(document.getElementById('source_url3').value);" class="source_accept">accept</a><br/>
			</div> --}}
    </fieldset>

</div>
@stop
