@extends('layouts.frontmaster')
@section('metatags')

@endsection
@section('csssec')
<link rel="stylesheet" href="{{asset('front/css/news-detail.css')}}">
<link rel="stylesheet" href="{{asset('front/css/addcss.css')}}">
@endsection
@section('jssec')

@endsection
@section('content')
<div class="container">
    <div style="margin-bottom:50px;">

<img src="{{asset('/epaperlink_image/'.$href)}}">
    </div>
<br>
<hr>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3&appId=252819208792591&autoLogAppEvents=1"></script>
<div class="fb-comments" data-href="{{url()->current()}}" data-width="850" data-numposts="5"></div>
<hr>
 <div class="share">
                    <ul>
                        <li>SHARING:</li>

                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"
                            class="fab fa-facebook-f social-icon" aria-hidden="true"></a>
                        <a href="http://twitter.com/share?url={{url()->current()}}" target="_blank" class="fab fa-twitter social-icon" aria-hidden="true"></a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}&title=website%20link&summary=&source="
                            target="_blank" class="fab fa-linkedin-in social-icon" aria-hidden="true"></a>

                    </ul>
                </div>
</div>
@endsection
