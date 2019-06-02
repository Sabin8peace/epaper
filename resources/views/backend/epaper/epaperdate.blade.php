@extends('layouts.backmaster')

@section('title', 'Pages')

@section('content_header')
@stop

@section('csssec')

@stop

@section('jssec')

@stop

@section('content')

<div class="row">
    <div
        class="col-md-10 col-lg-10 col-xl-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1 col-xs-offset-0 col-sm-offset-0 col-xl-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading padding-bottom">
                <div class="row" style="padding:10px">
                    <table style="width:100%">
                        <tr>
                            <th class="headtext">
                                Insert Publishing date
                            </th>
                            {{-- <th class=" pull-right">
                                <a href="{{route('pages.index')}}" class="btn btn-primary pull-right">Pages List</a>
                            </th> --}}
                        </tr>
                    </table>

                </div>
            </div>

            <div class="panel-body" style="overflow: auto">
                @if ($errors->any())

                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                <form method="post" action="{{route('epaper.date')}}" enctype="multipart/form-data" id="valid_form">
                    <input type="hidden" class="form-control" name="created_by" value="{{Auth::user()->id}}">

                        {{csrf_field()}}
                        <div class="col-md-6 col-xs-12" id="publish-time">
                        <div class="form-group">
                            <label>Publishing Date</label>
                            <input type="date" name="datetime" class="form-control" required placeholder="Time"
                                value="{{old('datetime')}}">

                        </div>

                        {{-- <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{old('title',$pages->title)}}" required>
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Title In Nepali</label>
                                    <input type="text" name="title_in_nepali" class="form-control"
                                        value="{{old('title_in_nepali',$pages->title_in_nepali)}}">
                                </div>
                            </div> --}}
                        {{-- </div> --}}
                        {{-- <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Subtitle</label>
                                    <input type="text" name="subtitle" class="form-control"
                                        value="{{old('subtitle',$pages->subtitle)}}">
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{$pages->meta_title}}">
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea type="text" name="meta_description" class="form-control"
                                        placeholder="Meta Description">{{old('meta_description',$pages->meta_description)}}</textarea>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea type="text" class="form-control my-editor" id="" required
                                        name="description">{{old('description',$pages->description)}}</textarea>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="radio" name="status" id="status" value="1" checked>Active
                                    <input type="radio" name="status" id="status" value="0">Inactive
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
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@stop
