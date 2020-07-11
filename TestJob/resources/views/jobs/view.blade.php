@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$job->position}}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card-img">
                                    <img src="{{asset('images/logo')}}/{{$job->company->logo}}" width="100%" class="img-thumbnail">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card-title pt-5">
                                    <h3>{{$job->company->cname}}</h3>
                                    <p>{{$job->company->slogan}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <h6>{{__('Job Context :')}}</h6>
                                <p class="text-justify">{{$job->job_context}}</p>
                                <h6>{{__('Vacancy :')}}</h6>
                                <p>{{$job->vacancy}}</p>
                                <h6>{{__('Education  :')}}</h6>
                                <p class="text-justify">{{$job->education}}</p>
                                <h6>{{__('Experience  :')}}</h6>
                                <p class="text-justify">{{$job->experience}}</p>
                                <h6>{{__('Job Type  :')}}</h6>
                                <p>{{$job->job_type}}</p>
                                <h6>{{__('Salary  :')}}</h6>
                                <p>{{$job->salary}}</p>
                                <h6>{{__('Job Description  :')}}</h6>
                                <p>{{$job->description}}</p>

                                <hr>
                                <p>{{__('Send your CV/Resume at')}}: &nbsp; <b>{{$job->company->email}}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{__('Job Summary')}}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <p><i class="fa fa-calendar"></i>&nbsp;{{__('Published on :')}}&nbsp; {{$job->created_at->diffForHumans()}}</p>
                                <p><i class="fa fa-angle-double-right"></i>&nbsp;{{__('Company :')}}&nbsp; {{$job->company->cname}}</p>
                                <p><i class="fa fa-angle-double-right"></i>&nbsp;{{__('Company Page :')}}&nbsp;
                                    <a href="{{route('company.index',[$job->company->id, $job->company->slug])}}">{{__('View')}}</a>
                                </p>
                                <p><i class="fa fa-clock"></i>&nbsp;{{__('Job Type :')}}&nbsp; {{$job->job_type}}</p>
                                <p><i class="fa fa-map"></i>&nbsp;{{__('Location :')}}&nbsp; {{$job->company->address}}</p>
                                <p><i class="fa fa-envelope"></i>&nbsp;{{__('E-mail :')}}&nbsp; {{$job->company->email}}</p>
                                <p><i class="fa fa-phone"></i>&nbsp;{{__('Phone :')}}&nbsp; {{$job->company->phone}}</p>
                                <p><i class="fa fa-calendar"></i>&nbsp;{{__('Last Date :')}}&nbsp; {{$job->last_date}}</p>

                                <hr>
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif

                                @if(Auth::check() && auth()->user()->user_type == 'user')
                                    @if(!$job->CheckApplication())
                                       <form method="post" action="{{route('job.apply',[$job->id])}}">
                                           @csrf
                                           <button type="submit" class="btn btn-success btn-block">{{__('Apply')}}</button>
                                       </form>
                                        @else
                                        <div class="alert alert-danger">
                                            {{__('Already Apply')}}
                                        </div>
                                    @endif
                                @endif



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

