@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{ route('admin.applicants.index') }}" class="plain-txt">Applicants</a> <span class="plain-txt">/</span> Edit Applicant</div>

                <div class="card-body">
                    {!! Form::model($applicant, ['route' => ['admin.applicants.update', $applicant->id], 'method' => 'put', 'files' => true, 'id' => 'page-form']) !!}
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', "autocomplete" => "name", "required" => true, "autofocus" => true]) }}

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                {{ Form::email('email', null, ['id' => 'email', 'class' => 'form-control', "autocomplete" => "email", "required" => true]) }}

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="photo" class="col-md-4 col-form-label text-md-end">Photo</label>

                            <div class="col-md-6">
                                {{ Form::file('photo', ['accept' => 'image/x-png, image/gif, image/jpeg', 'class' => 'form-control']) }}

                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="division" class="col-md-4 col-form-label text-md-end">Division</label>

                            <div class="col-md-6">
                                {{ Form::select('division_id', ['' => 'Select Division'] + $data['divisions'], null, ['id' => 'division', 'class' => 'form-control']) }}

                                @error('division_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="district" class="col-md-4 col-form-label text-md-end">District</label>

                            <div class="col-md-6">
                                {{ Form::select('district_id', ['' => 'Select District'] + $data['districts'], null, ['id' => 'district', 'class' => 'form-control']) }}

                                @error('district_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="upazila" class="col-md-4 col-form-label text-md-end">Upazila / tdana</label>

                            <div class="col-md-6">
                                {{ Form::select('upazila_id', ['' => 'Select Upazila'] + $data['upazilas'], null, ['id' => 'upazila', 'class' => 'form-control']) }}

                                @error('upazila_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address_details" class="col-md-4 col-form-label text-md-end">Address Details</label>

                            <div class="col-md-6">
                                {{ Form::textarea('address_details', null, ['id' => 'address_details', 'class' => 'form-control', "autocomplete" => "address_details", "required" => true, 'rows' => 3]) }}

                                @error('address_details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="language" class="col-md-4 col-form-label text-md-end">Language</label>

                            <div class="col-md-6">
                                <div class="form-check inline-block">
                                    <input value="bangla" class="form-check-input" type="checkbox" name="language[]" id="language-bangla" {{ in_array('bangla', $applicant->lang_array) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="language-bangla">
                                        Bangla
                                    </label>
                                </div>

                                <div class="form-check inline-block">
                                    <input value="english" class="form-check-input" type="checkbox" name="language[]" id="language-english" {{ in_array( 'english', $applicant->lang_array) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="language-english">
                                        English
                                    </label>
                                </div>

                                <div class="form-check inline-block">
                                    <input value="french" class="form-check-input" type="checkbox" name="language[]" id="language-french" {{ in_array('french', $applicant->lang_array) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="language-french">
                                        French
                                    </label>
                                </div>

                                @error('language')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="education" class="col-md-4 col-form-label text-md-end">Education Qualification</label>

                            <div class="col-md-6">
                                <table id="exam-table" class="table">
                                    <tr>
                                        <td style="min-width: 130px;">Exam Name</td>
                                        <td style="width: 200px;">Board/University</td>
                                        <td style="width: 100px;">Result</td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <select name="exam[]" class="form-control">
                                                <option value="">Select Exam</option>

                                                @foreach($data['exams_list'] as $exam)
                                                    <option value="{{ $exam->id }}" level="{{ $exam->level }}">{{ $exam->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            {{ Form::select('institute[]', ['' => '--'], null, ['class' => 'form-control', 'disabled' => true]) }}
                                        </td>
                                        <td>
                                            {{ Form::text('result[]', null, ['class' => 'form-control']) }}
                                        </td>
                                        <td>
                                            <button class="btn btn-light btn-sm" disabled>X</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <select name="exam[]" class="form-control">
                                                <option value="">Select Exam</option>

                                                @foreach($data['exams_list'] as $exam)
                                                    <option value="{{ $exam->id }}" level="{{ $exam->level }}">{{ $exam->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            {{ Form::select('institute[]', ['' => '--'], null, ['class' => 'form-control', 'disabled' => true]) }}
                                        </td>
                                        <td>
                                            {{ Form::text('result[]', null, ['class' => 'form-control']) }}
                                        </td>
                                        <td>
                                            <button class="btn btn-light btn-sm" disabled>X</button>
                                        </td>
                                    </tr>
                                </table>

                                {{ Form::select('board', $data['boards_list'], null, ['id' => 'board', 'class' => 'd-none']) }}
                                {{ Form::select('university', $data['universities_list'], null, ['id' => 'university', 'class' => 'd-none']) }}
                                <p class="text-end add-more" data-table="exam-table"><button class="btn btn-light btn-sm">Add More..</button></p>

                                @error('education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cv" class="col-md-4 col-form-label text-md-end">CV Attachment</label>

                            <div class="col-md-6">
                                {{ Form::file('cv', ['accept' => 'application/msword, application/pdf', 'class' => 'form-control']) }}

                                @error('cv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="training" class="col-md-4 col-form-label text-md-end">Training</label>

                            <div class="col-md-6">
                                <div class="form-check inline-block">
                                    <input value="1" class="form-check-input" type="radio" name="training" @if($applicant->is_trained) checked @endif>
                                    <label class="form-check-label" for="training">
                                        Yes
                                    </label>
                                </div>

                                <div class="form-check inline-block">
                                    <input value="0" class="form-check-input" type="radio" name="training" @if(! $applicant->is_trained) checked @endif>
                                    <label class="form-check-label" for="training">
                                        No
                                    </label>
                                </div>

                                <div id="training-container" class="{{ $applicant->is_trained ?: 'none'}}">
                                    <table id="training-table" class="table">
                                        <tr>
                                            <td>Training Name</td>
                                            <td>Training Details</td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                {{ Form::text('training_name[]', null, ['class' => 'form-control']) }}
                                            </td>
                                            <td>
                                                {{ Form::text('training_details[]', null, ['class' => 'form-control']) }}
                                            </td>
                                            <td>
                                                <button class="btn btn-light btn-sm" disabled>X</button>
                                            </td>
                                        </tr>
                                    </table>

                                    <p class="text-end add-more" data-table="training-table"><button class="btn btn-light btn-sm">Add More..</button></p>
                                </div> <!-- .table-container -->

                                @error('training')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="submit btn btn-primary">
                                    Update
                                </button>

                                <a href="{{ route('admin.applicants.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
