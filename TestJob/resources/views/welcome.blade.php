@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__('Job Post')}}</div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="150"><i class="fa fa-image"></i>&nbsp; Company logo</th>
                                    <th><i class="fa fa-angle-double-right"></i>&nbsp; Job Position</th>
                                    <th width="130"><i class="fa fa-clock"></i>&nbsp; Job Type</th>
                                    <th><i class="fa fa-map-marker"></i>&nbsp; Job location</th>
                                    <th><i class="fa fa-calendar"></i>&nbsp; Last Date</th>
                                    <th width="100"><i class="fa fa-angle-double-down"></i>&nbsp; Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($jobs as $job)
                                <tr>
                                    <td width="150">
                                        <img src="{{asset('images/logo')}}/{{$job->company->logo}}" width="100" class="img-thumbnail">
                                    </td>
                                    <td class="pt-5">{{$job->position}}</td>
                                    <td class="pt-5" width="100">{{$job->job_type}}</td>
                                    <td class="pt-5">{{$job->company->address}}</td>
                                    <td class="pt-5">{{$job->last_date}}</td>
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
