@extends('layouts.backmaster')

@section('title', 'Admin Pannel')

@section('content_header')
    <h1>Dashboard</h1>
@stop
@push('navbar')
<li>Haha</li>
    
@endpush

@section('content')
    <p>Welcome Mr./Mrs. {{Auth::user()->name}} to the admin pannel</p>
@stop