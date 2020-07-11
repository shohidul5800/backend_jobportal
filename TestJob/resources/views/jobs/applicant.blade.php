@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @foreach($applicants as $applicant)
                <div class="card">
                    <div class="card-header">{{$applicant->title}}</div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Applicant Name</th>
                                <th>E-mail</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Resume</th>
                                <th>Cover Letter</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($applicant->users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->profile->phone}}</td>
                                <td>{{$user->profile->address}}</td>
                                <td>
                                    <a href="{{Storage::url($user->profile->resume)}}">{{__('Resume')}}</a>
                                </td>
                                <td>
                                    <a href="{{Storage::url($user->profile->cover_letter)}}">{{__('Cover Letter')}}</a>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

