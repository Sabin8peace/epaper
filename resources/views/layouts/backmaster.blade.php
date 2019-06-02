@extends('adminlte::page')

@section('title', 'Dashboard')
@section('favicon')
<link rel="shortcut icon" type="image/png" href="http://www.clker.com/cliparts/v/2/i/4/l/c/earth-hi.png" />

@endsection
@section('content_header')
@stop

@section('content')
<p>Welcome to this beautiful admin panel - HDTuto.com.</p>
@stop

@section('css')
<style>
    .headtext {
        font-size: 22px;
    }

    .wrapper {
        height: 100%;
        position: relative;
        overflow-x: hidden;
        overflow-y: hidden !important;
    }

    .skin-blue-light .sidebar a {
        color: #222222;
    }

    menu li:hover a,
    .skin-blue-light .sidebar-menu li.active a {
        color: #00a65a;
        background: #f4f4f5;
    }

    .skin-blue-light .sidebar-menu li:hover a {
        color: #00a65a;
        background: #f4f4f5;
    }

</style>

@yield('csssec')

@stop

@section('js')
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

</script>

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

@yield('jssec')
@stop
