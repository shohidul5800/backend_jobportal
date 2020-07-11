@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{__('Job Post')}}</div>

                    <div class="card-body">
                        <form action="{{route('jobs.update', [$job->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>{{__('Job Title :')}}</label>
                                <input type="text" name="title" value="{{$job->title}}" class="form-control">
                                @if($errors->has('title'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('title')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Job Slug :')}}</label>
                                <input type="text" name="slug" value="{{$job->slug}}" class="form-control">
                                @if($errors->has('slug'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('slug')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Job Vacancy :')}}</label>
                                <input type="text" name="vacancy" value="{{$job->vacancy}}" class="form-control">
                                @if($errors->has('vacancy'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('vacancy')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Job Position :')}}</label>
                                <input type="text" name="position" value="{{$job->position}}" class="form-control">
                                @if($errors->has('position'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('position')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Job Category :')}}</label>
                                <select type="text" name="category_id" class="form-control">
                                    <option>Select Category</option>
                                    @foreach(\App\Category::all() as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('category_id')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Job Context :')}}</label>
                                <textarea type="text" name="job_context" class="form-control" rows="2">{{$job->job_context}}</textarea>
                                @if($errors->has('job_context'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('job_context')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Job Type :')}}</label>
                                <select type="text" name="job_type" class="form-control">
                                    <option>{{$job->job_type}}</option>
                                    <option value="{{__('Full Time')}}">{{__('Full Time')}}</option>
                                    <option value="{{__('Part Time')}}">{{__('Part Time')}}</option>
                                    <option value="{{__('Casual')}}">{{__('Casual')}}</option>
                                </select>
                                @if($errors->has('job_type'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('job_type')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Salary :')}}</label>
                                <input type="number" name="salary" value="{{$job->salary}}" class="form-control">
                                @if($errors->has('salary'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('salary')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Last Date :')}}</label>
                                <input type="date" name="last_date" value="{{$job->last_date}}" class="form-control">
                                @if($errors->has('last_date'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('last_date')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Education :')}}</label>
                                <textarea type="text" name="education" class="form-control" rows="3">{{$job->education}}</textarea>
                                @if($errors->has('education'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('education')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Experience :')}}</label>
                                <textarea type="text" name="experience" class="form-control" rows="3">{{$job->experience}}</textarea>
                                @if($errors->has('experience'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('experience')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{__('Description :')}}</label>
                                <textarea type="text" name="description" class="form-control" rows="3">{{$job->description}}</textarea>
                                @if($errors->has('description'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('description')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">{{__('UPDATE')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
