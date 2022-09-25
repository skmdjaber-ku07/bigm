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
                                {{ Form::select('division_id', ['' => 'Select Division'] + $data['dropdown']['divisions'], null, ['id' => 'division', 'class' => 'form-control', 'data-dropdown-child' => 'district_id']) }}

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
                                <select name="district_id" id="district" class="form-control" data-dropdown-child="upazila_id">
                                    <option value="">Select District</option>

                                    @foreach($data['collection']['districts'] as $district)
                                        <option value="{{ $district['id'] }}"
                                                @if($applicant->district_id == $district['id']) selected @endif
                                                data-parent="{{ $district['division_id'] }}"
                                                class="{{ $applicant->division_id == $district['division_id'] ?: 'none' }}">
                                                {{ $district['name'] }}
                                        </option>
                                    @endforeach
                                </select>


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
                                <select name="upazila_id" id="upazila" class="form-control">
                                    <option value="">Select Upazila</option>

                                    @foreach($data['collection']['upazilas'] as $upazila)
                                        <option value="{{ $upazila['id'] }}"
                                                @if($applicant->upazila_id == $upazila['id']) selected @endif
                                                data-parent="{{ $upazila['district_id'] }}"
                                                class="{{ $applicant->district_id == $upazila['district_id'] ?: 'none' }}">
                                                {{ $upazila['name'] }}
                                        </option>
                                    @endforeach
                                </select>

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
                                @include('admin.applicants.partials.exams_form')

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

                                        @if(isset($applicant) && $applicant->trainings()->count())
                                            @foreach($applicant->trainings as $index => $applicant_training)
                                                <tr>
                                                    <td>
                                                        {{ Form::text('training_name[]', $applicant_training->name, ['class' => 'form-control']) }}
                                                    </td>
                                                    <td>
                                                        {{ Form::text('training_details[]', $applicant_training->details, ['class' => 'form-control']) }}
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-light btn-sm @if($index > 0) remove-tr @endif" @if($index == 0) disabled @endif>X</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
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
                                        @endif
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
