@extends('layouts.frontmaster')
@section('metatags')

@endsection
@section('csssec')
<style>
    .createdarea:hover {
        border: 1px solid black;

    }
.mape{
    display:grid;
    grid-template-columns:3fr 1fr;
    grid-gap:50px;
    margin:0 100px 0 200px;
    padding: 5px;
}
.map-right a{
    box-shadow: 0 0 10px #fcfcfc;


}

.map-right a img{
   margin: 20px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

</style>


@endsection
@section('jssec')
<script>
    $("#widgetFieldInput").change(function () {
        this.form.submit();
    });

</script>
{{-- <script type="text/javascript" src="jquery.maphilight.min.js"></script> --}}
<script src="{{ asset('epaper/assets/maphighlight.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/maphilight/1.4.0/jquery.maphilight.min.js"></script> --}}
<script type="text/javascript">
    $(function () {
        $('.map').maphilight();
    });

</script>

@endsection
@section('content')
<div >

    <table style="width:100%">
        <tr>
            {{-- <th class="headtext">epaper</th> --}}
            {{-- <th >Select Date</th> --}}
            <th class="pullright-">
                <form action="{{route('front.epaperdate')}}" method="post">
                    {{csrf_field()}}
                    <label class="pull-right"> Search by date</label>
                    <input type="date" class="pull-right" id="widgetFieldInput" value="" name="datetime">

            </th>

            </form>
        </tr>

    </table>
    <br>
    <hr>
    <br>
    @if($epaperimage->count()>0)


<div class="grid-container">
    <div class="wrapper">
        <div class="mape">


        <div class="map-left">
<map id="{{$data->map_id}}" name="{{$data->map_id}}">
                @foreach($data->epaperLinks as $e)
                {!!$e->link!!}

                @endforeach
            </map>
            <p>
                <img src="{{asset('/news_epaper/'.$data->image)}}" alt="{{$data->image}}" class="map"
                    usemap="#{{$data->map_id}}" />
                    </p>

        </div>
         <div class="map-right" style="height:600px; overflow-y:auto;">
             @foreach ($epaperimage as $i=>$item)

            <a href="{{route('front.epaper',[$item->datetime,$item->id])}}">
            <img src="{{asset('/news_epaper/'.$item->image)}}" height="200px" width="200px">
            </a>


            @endforeach


         </div>
          </div>
    </div>
</div>
 @else
    <h1>Sorry We Donot Have Archive Of that Day Please Select Another Date</h1>
    @endif
@endsection
