@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__('Company Jobs')}}</div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th><i class="fa fa-database"></i>&nbsp; Job Title</th>
                                <th><i class="fa fa-angle-double-right"></i>&nbsp; Job Position</th>
                                <th width="130"><i class="fa fa-clock"></i>&nbsp; Job Type</th>
                                <th><i class="fa fa-map-marker"></i>&nbsp; Job location</th>
                                <th><i class="fa fa-calendar"></i>&nbsp; Last Date</th>
                                <th width="150"><i class="fa fa-angle-double-down"></i>&nbsp; Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jobs as $job)
                                <tr>
                                    <td>
                                        {{$job->title}}
                                    </td>
                                    <td class="pt-5">{{$job->position}}</td>
                                    <td class="pt-5" width="100">{{$job->job_type}}</td>
                                    <td class="pt-4">{{$job->company->address}}</td>
                                    <td class="pt-4">{{$job->last_date}}</td>
                                    <td class="pt-5">
                                        <a class="btn btn-info btn-sm" href="{{route('jobs.view',[$job->id, $job->slug])}}">{{__('View')}}</a>
                                        <a class="btn btn-success btn-sm" href="{{route('jobs.edit',[$job->id, $job->slug])}}">{{__('Edit')}}</a>
                                        <a class="btn btn-danger btn-sm" href="{{route('jobs.delete',[$job->id, $job->slug])}}">{{__('Delete')}}</a>
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
