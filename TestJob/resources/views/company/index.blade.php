@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <img src="{{asset('images/cover_photo')}}/{{$company->cover_photo}}" width="100%" height="200">
                    </div>

                    <div class="card-body">
                        <div class="card-img pb-4 pt-4">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="card-img">
                                        <img src="{{asset('images/logo')}}/{{$company->logo}}" width="100" class="img-thumbnail">
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="card-title pt-2">
                                        <h3>{{$company->cname}}</h3>
                                        <p>{{$company->slogan}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-text pt-5">
                            {{$company->description}}
                        </div>
                    </div>
                    <div class="card-footer">
                        <h6><i class="fa fa-angle-double-down"></i>&nbsp; {{$company->cname}}</h6>
                        <h6><i class="fa fa-envelope"></i>&nbsp; {{$company->email}}</h6>
                        <h6><i class="fa fa-phone"></i>&nbsp; {{$company->phone}}</h6>
                        <h6><i class="fa fa-globe"></i>&nbsp; {{$company->website}}</h6>
                        <h6><i class="fa fa-map"></i>&nbsp; {{$company->address}}</h6>
                    </div>

                    <div class="card-body">
                        <h4>{{__('Related Job :')}}</h4>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="150"><i class="fa fa-image"></i>&nbsp; Company logo</th>
                                <th><i class="fa fa-angle-double-right"></i>&nbsp; Job Position</th>
                                <th width="130"><i class="fa fa-clock"></i>&nbsp; Job Type</th>
                                <th><i class="fa fa-map-marker"></i>&nbsp; Job location</th>
                                <th width="100"><i class="fa fa-angle-double-down"></i>&nbsp; Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($company->jobs as $job)
                                <tr>
                                    <td width="150">
                                        <img src="{{asset('images/logo')}}/{{$company->logo}}" width="100" class="img-thumbnail">
                                    </td>
                                    <td class="pt-5">{{$job->position}}</td>
                                    <td class="pt-5" width="100">{{$job->job_type}}</td>
                                    <td class="pt-4">{{$job->company->address}}</td>
                                    <td class="pt-5">
                                        <a href="{{route('jobs.view',[$job->id, $job->slug])}}">{{__('Apply')}}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

