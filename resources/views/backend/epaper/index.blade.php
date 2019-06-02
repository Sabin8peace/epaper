@extends('layouts.backmaster')

@section('title', 'epaper')

@section('content_header')
@stop

@section('csssec')
@stop

@section('jssec')
<script>
     $("#widgetFieldInput").change(function () {
        this.form.submit();
    });
</script>
@stop

@section('content')
{{-- <div class="container"> --}}
<div class="row" >
    <div class="col-md-10 col-lg-10 col-xl-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1 col-xs-offset-0 col-sm-offset-0 col-xl-offset-1">
    {{-- <div class="col-md-10 col-lg-10 col-xl-10  col-lg-offset-1 col-md-offset-1  col-xl-offset-1"> --}}
        {{-- <div> --}}
        <div class="panel panel-default">
            <div class="panel-heading padding-bottom">
                <div class="row" style="padding:5px">
                    <table style="width:100%">
                        <tr >
                            {{-- <th class="headtext">epaper</th> --}}
                            <th ><a href="{{route('epaper.create')}}" class="btn btn-primary ">Add Images </a></th>
                            <th class="pullright-">
                        <form action="{{route('epaper.indexmain')}}" method="post">
                            {{csrf_field()}}
                            <label class="pull-right"> Search by date</label>
                            <input type="date" class="pull-right" id="widgetFieldInput" value="" name="datetime"
                                >

                            </th>

                        </form>
                        </tr>

                    </table>
                    {{-- <div class="col-xs-10">
                        <h1>epaper</h1>
                    </div>
                    <div class="col-xs-1 padding-top">
                        <a href="{{route('epaper.create')}}" class="btn btn-primary pull-right">Add Images </a>
                    </div> --}}
                </div>
                {{-- <label>Comment List</label> --}}
            </div>
            <div class="panel-body" style="overflow: auto">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
                @endif

                <table class="table table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Image Credit</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($epaper as $i=>$eachimage)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$eachimage->title}}</td>
                            <td>
                                <img src="{{asset('/news_epaper/'.$eachimage->image)}}" height="100" width="150">

                            </td>

                                         <td>
                                <a href="{{route('epaper.edit', $eachimage->id)}}" data-toggle="tooltip" title="Edit Information" class="btn btn-primary"><i class="fa fa-pencil"> </i></a>
                                {{-- <a href="{{route('epaper.show', $eachimage->id)}}" data-toggle="tooltip" title="View Detail" class="btn btn-success"><i class="fa fa-eye"></i></a> --}}

                                <form action="{{route('epaper.destroy', $eachimage->id)}}" method="POST" onsubmit="return confirm('Are You Sure??')" style="display: inline;">
                                    <input type="hidden" name="_method" value="delete" >
                                    {{csrf_field()}}
                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Delete Information" ><i class="fa fa-trash"></i></button>
                                </form>
                                <a href="{{route('epaper.managelinks', $eachimage->id)}}" data-toggle="tooltip" title="Manage Links" class="btn btn-info"><i class="fa fa-link"> </i></a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- </div> --}}
</div>
@stop
