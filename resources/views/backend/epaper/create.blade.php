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

<div class="row">
    <div
        class="col-md-10 col-lg-10 col-xl-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1 col-xs-offset-0 col-sm-offset-0 col-xl-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading padding-bottom">
                <div class="row" style="padding:10px">
                    <table style="width:100%">
                        <tr>
                            <th class="headtext">
                                Epaper
                            </th>
                            <th class=" pull-right">
                                <a href="{{route('epaper.index')}}" class="btn btn-primary pull-right">epaper List</a>
                            </th>
                        </tr>
                    </table>

                </div>
            </div>

            <div class="panel-body" style="overflow: auto">
                <form action="{{route('epaper.store')}}" method="POST" enctype="multipart/form-data" id="valid_form">


                    {{csrf_field()}}
                    {{-- @if($epaper)

                    @foreach($epaper as $item)

                    <img src="{{asset('/news_epaper/'.$item->image)}}" height="100" width="150">

                    @endforeach
                    <h1>Add More Images</h1>
                    @endif --}}

                    <div class="multi-fields">
                        <div class="multi-field-wrapper">
                            {{-- <div class="col-md-2 col-md-offset-10">
                                <button type="button" class="add-field btn btn-success"><i class="fa fa-plus"> Add More
                                        Field</i>
                                </button>
                            </div> --}}
                            <br>
                            <hr>
                            <br>
                            <div class="multi-fields">
                                <div class="multi-field">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-grpup">
                                                <label>Upload Image</label>
                                                <input type="file" name="image[]" multiple class="form-control"
                                                    placeholder="Image" value="">
                                            </div>
                                        </div>
                                         <div class="col-md-6 col-xs-12" id="publish-time">
                                            <div class="form-group">
                                                <label>Publishing Date</label>
                                                <input type="date" name="datetime" class="form-control" required
                                                    placeholder="Time" value="{{old('datetime')}}">

                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6 col-xs-12">
                                            <div class="form-grpup">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" placeholder="page1"
                                                    value="{{old('title')}}">

                                            </div>
                                        </div> --}}
                                    </div>
                                    {{-- <input type="hidden" readonly name="news_id" class="form-control"
                                        placeholder="News ID" value="{{ Cookie::get('news_id') }}"> --}}
                                    <div class="row">
                                        {{-- <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea type="text" name="extra1" class="form-control"
                                                    placeholder="Image Description">{{old('extra1')}}</textarea>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-md-6 col-xs-12" id="publish-time">
                                            <div class="form-group">
                                                <label>Publishing Date</label>
                                                <input type="date" name="datetime" class="form-control" required
                                                    placeholder="Time" value="{{old('datetime')}}">

                                            </div>
                                        </div> --}}
                                        {{-- <button style="width:40px; float:right;" type="button"
                                        class="remove-field btn btn-danger form-control col-md-2 col-lg-2"><i
                                            class="fa fa-times"></i>
                                    </button> --}}

                                        <br>
                                    </div>
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
</div>

@stop
