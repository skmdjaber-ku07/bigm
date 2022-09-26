@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Registration Form</div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'register', 'method' => 'post', 'files' => true, 'id' => 'page-form']) !!}
                            @include('partials.applicant_form')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
