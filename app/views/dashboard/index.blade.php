@extends('layouts/main')

@section('navigation')
@parent
<li><a href="{{ URL::to('user/logout') }}">Logout</a></li>
@endsection

@section('content')
<div class="row">
    <div class="span3">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <li class="nav-header">Followers</li>
            </ul>
            <div style="margin-left: 10px">
                @if(count(Auth::user()->followers) > 0)
                    @foreach (Auth::user()->followers as $follower)
                        <div style="float: left; width: 30px; margin: 0px 3px 3px 5px;">
                            <img src="http://nettuts.s3.amazonaws.com/2069_laravel_2/http://gravatar.com/avatar/{{ md5(strtolower(trim($follower->email))) }}?s=25&d=retro" alt="Follower" title="{{ $follower->email }}" />
                        </div>
                    @endforeach
                @else
                <div>You have no followers.</div>
                @endif
                <div style="clear: both"></div>
            </div>

            <ul class="nav nav-list">
                <li class="nav-header">Following</li>
            </ul>
            <div style="margin-left: 10px">
                @if(count(Auth::user()->following) > 0)
                    @foreach (Auth::user()->following as $following)
                        <div style="float: left; width: 30px; margin: 0px 3px 3px 5px;">
                            <img src="http://nettuts.s3.amazonaws.com/2069_laravel_2/http://gravatar.com/avatar/{{ md5(strtolower(trim($following->email))) }}?s=25&d=retro" alt="Following" title="{{ $following->email }}" />
                        </div>
                    @endforeach
                @else
                <div>You are not following anybody.</div>
                @endif
                <div style="clear: both"></div>
            </div>
        </div>
    </div>
    <div class="span9">
        <h1>Your Photos</h1>
        @if(count($photos) > 0)
        @foreach ($photos as $photo)
        <div class="well" style="text-align: center">
            <img src="http://localhost:8000/uploads/{{ $photo->location }}" alt="{{ $photo->description }}" title="{{ $photo->description }}" />
            <p>{{ $photo->description }}</p>
        </div>
        @endforeach
        @else
        <div class="alert alert-success" role="alert">
            <a href="#" class="alert-link">...</a>
            <h4 class="alert-heading">Awww!</h4>
            <p>Seems like you don't have any photos yet. <a href="#">Upload a new one?</a></p>
        </div>
        @endif
    </div>
</div>
@endsection