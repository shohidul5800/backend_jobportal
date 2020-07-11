@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">{{__('User Photo')}}</div>

                    <div class="card-body">
                        <img src="{{asset('images/avatar')}}/{{Auth::user()->profile->avatar}}" width="100%" class="img-thumbnail">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{__('User Data')}}</div>

                    <div class="card-body">
                        <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>{{__('Address :')}}</label>
                                <textarea type="text" name="address" class="form-control" rows="2">{{Auth::user()->profile->address}}</textarea>
                                @if($errors->has('address'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('address')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('BIO Data :')}}</label>
                                <textarea type="text" name="bio" class="form-control" rows="3">{{Auth::user()->profile->bio}}</textarea>
                                @if($errors->has('bio'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('bio')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Experience :')}}</label>
                                <textarea type="text" name="experience" class="form-control" rows="3">{{Auth::user()->profile->experience}}</textarea>
                                @if($errors->has('experience'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('experience')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Avatar :')}}</label>
                                <input type="file" name="avatar" class="form-control">
                                @if($errors->has('avatar'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('avatar')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Cover Letter :')}}</label>
                                <input type="file" name="cover_letter" class="form-control">
                                @if($errors->has('cover_letter'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('cover_letter')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Resume :')}}</label>
                                <input type="file" name="resume" class="form-control">
                                @if($errors->has('resume'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('resume')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">{{__('SUBMIT')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{__('User Details')}}</div>

                    <div class="card-body">
                        <h6><i class="fa fa-user"></i>&nbsp; {{auth()->user()->name}}</h6>
                        <h6><i class="fa fa-envelope"></i>&nbsp; {{auth()->user()->email}}</h6>
                        <h6><i class="fa fa-phone"></i>&nbsp; {{auth()->user()->profile->phone}}</h6>
                        <h6><i class="fa fa-male"></i>&nbsp; {{auth()->user()->profile->gender}}</h6>
                        <h6><i class="fa fa-calendar"></i>&nbsp; {{auth()->user()->profile->dob}}</h6>
                        <hr>
                        <h6>{{__('BIO Data :')}}</h6>
                        <p>{{str_limit(auth()->user()->profile->bio, 100)}}</p>
                        <h6>{{__('Address :')}}</h6>
                        <p>{{str_limit(auth()->user()->profile->address, 100)}}}}</p>
                        <h6>{{__('Experience :')}}</h6>
                        <p>{{str_limit(auth()->user()->profile->experience, 100)}}</p>
                        <hr>
                        <h6>{{__('Cover Letter :')}}</h6>
                        <p>
                            <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Download</a>
                        </p>
                        <h6>{{__('Resume :')}}</h6>
                        <p>
                            <a href="{{Storage::url(Auth::user()->profile->resume)}}">Download</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

