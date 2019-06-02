@extends('layouts.backmaster')

@section('title', 'data')

@section('content_header')
@stop

@section('csssec')

<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<style>




</style>
<style>
    .row {
        margin-top: 1em;
    }

</style>
@stop

@section('jssec')
<script>
    $(function () {
        var canvas = document.getElementById("canvas"),
            ctx = canvas.getContext("2d");

        var background = new Image();
        var imgdata = document.getElementById("imagedata");
        // alert(imgdata.value);

        var img = imgdata.value;
        background.src = imgdata.value;

        var width = img.clientWidth;
            var height = img.clientHeight;
            // console.log(width);

        canvas.width = 400;
        canvas.height = 600;

        background.onload = function () {
            ctx.drawImage(background, 0, 0);

        }

    });

</script>
<script>
    initDraw(document.getElementById('canvas'));

    function initDraw(canvas) {
        function setMousePosition(e) {
            var ev = e || window.event; //Moz || IE
            if (ev.pageX) { //Moz
                mouse.x = ev.pageX;
                //+ window.pageXOffset;
                mouse.y = ev.pageY;
                // console.log(mouse.x,mouse.y);
                // + window.pageYOffset;
            } else if (ev.clientX) { //IE
                mouse.x = ev.clientX;
                //+ document.body.scrollLeft;
                mouse.y = ev.clientY;
                //+ document.body.scrollTop;
            }
        };

        var mouse = {
            x: 0,
            y: 0,
            startX: 0,
            startY: 0
        };
        var element = null;
        var add = '';

        canvas.onmousemove = function (e) {
            setMousePosition(e);
            if (element !== null) {
                element.style.width = Math.abs(mouse.x - mouse.startX) + 'px';
                element.style.height = Math.abs(mouse.y - mouse.startY) + 'px';
                element.style.left = (mouse.x - mouse.startX < 0) ? mouse.x + 'px' : mouse.startX + 'px';
                element.style.top = (mouse.y - mouse.startY < 0) ? mouse.y + 'px' : mouse.startY + 'px';
                console.log(element.style.left);

                // add='<area shape="rect"' + 'coords='+coorde +" "+ 'alt="Sun" href="sun.htm" >';
                //console.log(add);




            }
        }

        canvas.onclick = function (e) {
            if (element !== null) {
                element = null;
                canvas.style.cursor = "default";
                console.log("finsihed.");
                var x = mouse.startX;
                var y = mouse.startY;
                var x1 = mouse.x;
                var y1 = mouse.y;
                var coorde = x + ',' + y + ',' + x1 + ',' + y1;
                var add = '<area shape="rect"' + 'coords=' + coorde + " " + 'alt="Sun" href="sun.htm" >';
               var  width = Math.abs(mouse.x - mouse.startX);
               var  height = Math.abs(mouse.y - mouse.startY);
                var left = (mouse.x - mouse.startX < 0) ? mouse.x  : mouse.startX;
                var top = (mouse.y - mouse.startY < 0) ? mouse.y : mouse.startY;
                // alert(top);
                // top = (mouse.y - mouse.startY < 0) ? mouse.y : mouse.startY;
                var rectangleimage = left + ',' + top + ',' + width + ',' + height;
                console.log(rectangleimage);



                drawrect(left,top,width,height);
                //$('#bigthings').appendChild(add)
                //   bigthings.appendChild(add)
            } else {
                console.log("begun.");
                mouse.startX = mouse.x;
                mouse.startY = mouse.y;
                element = document.createElement('div');
                element.className = 'rectangle'
                element.style.left = mouse.x + 'px';
                element.style.top = mouse.y + 'px';

                // canvas.appendChild(element)
                canvas.style.cursor = "crosshair";
            }
        }
    }

    function drawrect(left,top,width,height) {
        var c = document.getElementById("canvas");
        var ctx = c.getContext("2d");
        ctx.fillStyle = "#f00";
        ctx.fillRect(left,top,width,height);
    }

</script>
<script>
    $('.multi-field-wrapper').each(function () {
        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function (e) {
            var a = $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find(
                'select').val('').focus();
            //a.attr('id','abcd');

        });
        $('.multi-field .remove-field', $wrapper).click(function () {
            if ($('.multi-field', $wrapper).length > 1)
                $(this).parent('.multi-field').remove();
        });
    });

</script>
@stop

@section('content')
{{-- <div id="canvas"> --}}
{{-- <div id="canvas-wrapper"> --}}
    <canvas id="canvas" style="border:1px solid #000"></canvas>
{{-- </div> --}}
{{-- <canvas id="canvas"> --}}
{{-- <img  src="{{asset('/news_epaper/'.$data->image)}}" alt="The Giant Prawn at Ballina" usemap="#bigthings" /> --}}
{{-- </canvas> --}}
<input type="hidden" value="{{asset('/news_epaper/'.$data->image)}}" id="imagedata">
{{-- </div> --}}

{{-- maps --}}
{{-- <map name="bigthings" id="bigthings">


    <area title="area selected already" shape="rect" onmouseover="this.focus();" onmouseout="this.blur();" id="star"
        coords="300,80,516,250" href="#" alt="The VW Kombi, another Aussie icon" />
</map> --}}


{{-- <div class="row">
    <div
        class="col-md-10 col-lg-10 col-xl-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1 col-xs-offset-0 col-sm-offset-0 col-xl-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading padding-bottom">
                <div class="row" style="padding:10px">
                    <table style="width:100%">
                        <tr>
                            <th class="headtext">
                                data
                            </th>
                            <th class=" pull-right">
                                <a href="{{route('epaper.index')}}" class="btn btn-primary pull-right">data List</a>
</th>
</tr>
</table>

</div>
</div>

<div class="panel-body" style="overflow: auto">
    <form action="{{route('epaper.store')}}" method="POST" enctype="multipart/form-data" id="valid_form">


        {{csrf_field()}}




        <div class="multi-fields">
            <div class="multi-field-wrapper">
                <div class="col-md-2 col-md-offset-10">
                    <button type="button" class="add-field btn btn-success"><i class="fa fa-plus"> Add More
                            Field</i>
                    </button>
                </div>
                <br>
                <hr>
                <br>
                <div class="multi-fields">
                    <div class="multi-field">


                        <button style="width:40px; float:right;" type="button"
                            class="remove-field btn btn-danger form-control col-md-2 col-lg-2"><i
                                class="fa fa-times"></i>
                        </button>

                        <br>
                    </div>
                </div>

            </div>
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
    </form>
</div>
</div>
</div>
</div> --}}

@stop
