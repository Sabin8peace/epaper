@extends('layouts.backmaster')

@section('title', 'epaper')

@section('content_header')
@stop

@section('csssec')
<style>
    .row {
        margin-top: 1em;
    }

</style>
@stop

@section('jssec')
@stop

@section('content')

{{-- <div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{route('epaper.index')}}" class="btn btn-primary pull-right">epaper List</a>

<h1>Edit epaper</h1>
</div> --}}

<div class="row">
    <div class="col-md-10 col-lg-10 col-xl-10  col-lg-offset-1 col-md-offset-1  col-xl-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading padding-bottom">
                <div class="row" style="padding:10px">
                    <table style="width:100%">
                        <tr>
                            <th class="headtext">
                                Edit epaper</th>
                            <th class=" pull-right">
                                <a href="{{route('epaper.index')}}" class="btn btn-primary pull-right">epaper List</a>
                            </th>
                        </tr>
                    </table>

                </div>
            </div>

            <div class="panel-body" style="overflow: auto">
                <form method="post" action="{{route('epaper.update', $epaper->id)}}" method="post"
                    enctype="multipart/form-data" id="valid_form">
                    <input type="hidden" name="_method" value="put">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <label>Upload Image</label>
                            <input type="file" name="image" class="form-control" placeholder="Image"
                                value="{{$epaper->image}}" multiple>
                            @if(($epaper->id!=NULL))
                            <img src="{{asset('/news_epaper/'.$epaper->image)}}" height="100" width="150">
                            @endif
                        </div>
                          <div class="col-md-6 col-xs-12" id="publish-time">
                                            <div class="form-group">
                                                <label>Publishing Date</label>
                                                <input type="date" name="datetime" class="form-control"
                                                    placeholder="Time" value="">
                                                <input type="hidden" name="datetimetmp" class="form-control"
                                                    placeholder="Time" value="{{$epaper->datetime}}">

                                            </div>
                                        </div>
                        {{-- <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>Credit</label>
                                <input type="text" name="title" class="form-control" placeholder="Image Title"
                                    value="{{$epaper->title}}">
                            </div>
                            <input type="hidden" readonly name="news_id" class="form-control" placeholder="News ID"
                                value="{{ Cookie::get('news_id') }}">
                        </div> --}}
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" name="extra1" class="form-control"
                                    placeholder="Story Highlight">{{old('extra1',$epaper->extra1)}}</textarea>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row" style="padding:10px">
                        <table style="width:100%">
                            <tr>
                                <th> </th>
                                <th class=" pull-right">
                                    <button class="btn btn-success form-control">Submit</button> </th>
                            </tr>
                        </table>

                        {{-- <div class="col-xs-4 col-md-2 col-xs-offset-8 col-md-offset-10">
                            <button class="btn btn-success form-control">Submit</button>
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
