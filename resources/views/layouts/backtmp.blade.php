@extends('adminlte::page')
@section('title', 'YP NEPAL')
@section('content_header')
<h1>YP NEPAL</h1>
@stack('headfile')
@stop
@section('navheader')
@stack('navhead')
<li role="presentation" class="dropdown">
        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bell-o"></i>
            <?php
                $progress=\App\Listing::where('status','0')->count();
    
                ?>
            <span class="badge bg-red">{{$progress}}</span>
        </a>
        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
            <?php
                $issues=\App\Listing::where('status','0')->limit(3)->orderBy('id','desc')->get();
                ?>
            @foreach($issues as $issue)
            <li>
                <a href="{{route('alertnotify.show',$issue->id)}}" class="btn btn-info btn-block">
                    <span>
                        <span>{{$issue->name}}</span>
                        <span class="time">{{$issue->created_at->diffForHumans()}}</span>
                    </span>
                    <span class="message">
                        {{$issue->title}}
                    </span>
                </a>
            </li>
    
            @endforeach
    
            <li>
                <div class="text-center">
                    <a href="{{route('alertnotify.index')}}">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </li>
        </ul>
    </li>
    <li role="presentation" class="dropdown">
        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bell-o"></i>
            <?php
                $request=App\ClientRequest::where('status','0')->count();
    
                ?>
            <span class="badge bg-red">{{$request}}</span>
        </a>
        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
            <?php
                $clients=App\ClientRequest::where('status','0')->limit(3)->orderBy('id','desc')->get();
                ?>
            @foreach($clients as $issu)
            <li>
                <a href="{{route('clientRequest.show',$issu->id)}}" class="btn btn-info btn-block">
                    <span>
                        <span>{{$issu->name}}</span>
                        <span class="time">{{$issu->created_at->diffForHumans()}}</span>
                    </span>
                    <span class="message">
                        {{$issu->phone}}
                    </span>
                </a>
            </li>
    
            @endforeach
    
            <li>
                <div class="text-center">
                    <a href="{{route('clientRequest.index')}}">
                        <strong>See All Request</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </li>
        </ul>
    </li>
       
    
@endsection
@section('content')

@yield('content')
@stop
@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

{{-- error color --}}
<style type="text/css">
    .error {
        color: red;
    }

</style>
@yield('css')
@stack('css')
@stop
@section('js')
<script>
    console.log('Hi!');

</script>

{{-- jquery validation --}}
{{-- <script type="text/javascript" src="{{asset('assets/jqueryvalidation/dist/jquery.validate.min.js')}}"></script> --}}
<script type="text/javascript">

    $(".myselect").select2(
        {
            placeholder: "Select category"

        });

    $(document).ready(function () {
        $('#datatable').DataTable(
            
        );
    });

</script>

{{-- ckeditor --}}
{{-- <script type="text/javascript" src="{{asset('assets/ckeditor/ckeditor.js')}}"></script> --}}
{{-- <script type="text/javascript" src="{{asset('assets/tinymce/js/tinymce/tinymce.min.js')}}"></script> --}}



<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
 

<script>
    var editor_config = {
      path_absolute : "{{ url('/') }}/",
      selector: "textarea.my-editor",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      {{-- toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media", --}}
      toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
    toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | responsivefilemanager | insertdatetime preview | forecolor backcolor",
    toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
  
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }
  
        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };
  
    tinymce.init(editor_config);
  </script>



@yield('js')
@stack('js')
@stop
