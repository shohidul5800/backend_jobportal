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
                    <div class="card-header">{{__('Company Logo')}}</div>

                    <div class="card-body">
                        <img src="{{asset('images/logo')}}/{{Auth::user()->company->logo}}" width="100%" class="img-thumbnail">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{__('Company Data')}}</div>

                    <div class="card-body">
                        <form method="post" action="{{route('company.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>{{__('Comapny Slug :')}}</label>
                                <input type="text" name="slug" class="form-control" value="{{Auth::user()->company->slug}}">
                                @if($errors->has('slug'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('slug')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Address :')}}</label>
                                <textarea type="text" name="address" class="form-control" rows="2">{{Auth::user()->company->address}}</textarea>
                                @if($errors->has('address'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('address')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Company Slogan :')}}</label>
                                <input type="text" name="slogan" class="form-control" value="{{Auth::user()->company->slogan}}">
                                @if($errors->has('slogan'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('slogan')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Company Website :')}}</label>
                                <input type="text" name="website" class="form-control" value="{{Auth::user()->company->website}}">
                                @if($errors->has('website'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('website')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Description :')}}</label>
                                <textarea type="text" name="description" class="form-control" rows="3">{{Auth::user()->company->description}}</textarea>
                                @if($errors->has('description'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('description')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Comapny Logo :')}}</label>
                                <input type="file" name="logo" class="form-control">
                                @if($errors->has('logo'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('logo')}}
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
                    <div class="card-header">{{__('Cover Photo')}}</div>
                    <div class="card-body">
                        <form action="{{route('company.banner')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="cover_photo" class="form-control">
                                @if($errors->has('cover_photo'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('cover_photo')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">{{__('INSERT')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">{{__('Company Details')}}</div>

                    <div class="card-body">
                        <h6><i class="fa fa-angle-double-right"></i>&nbsp; {{auth()->user()->company->cname}}</h6>
                        <h6><i class="fa fa-envelope"></i>&nbsp; {{auth()->user()->company->email}}</h6>
                        <h6><i class="fa fa-phone"></i>&nbsp; {{auth()->user()->company->phone}}</h6>
                        <h6><i class="fa fa-globe"></i>&nbsp; {{auth()->user()->company->website}}</h6>
                        <hr>
                        <h6>{{__('Address :')}}</h6>
                        <p>{{str_limit(auth()->user()->company->address, 100)}}</p>
                        <h6>{{__('Discription :')}}</h6>
                        <p>{{str_limit(auth()->user()->company->description, 100)}}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

