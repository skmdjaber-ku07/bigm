@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><a href="{{ route('admin.applicants.index') }}" class="plain-txt">Applicants</a> <span class="plain-txt">/</span> Edit Applicant</div>

                    <div class="card-body">
                        {!! Form::model($applicant, ['route' => ['admin.applicants.update', $applicant->id], 'method' => 'put', 'files' => true, 'id' => 'page-form']) !!}
                            @include('partials.applicant_form')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
