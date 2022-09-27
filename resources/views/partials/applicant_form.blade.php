<div class="row mb-3">
    <label for="name" class="col-md-3 col-form-label text-md-end">{{ __('Name') }} <span class='text-danger'>*</span></label>

    <div class="col-md-6">
        {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', "autocomplete" => "name", "required" => true, "autofocus" => true]) }}
        <span class="invalid-feedback fw-bold" role="alert"></span>
    </div>
</div>

<div class="row mb-3">
    <label for="email" class="col-md-3 col-form-label text-md-end">{{ __('Email Address') }} <span class='text-danger'>*</span></label>

    <div class="col-md-6">
        {{ Form::email('email', null, ['id' => 'email', 'class' => 'form-control', "autocomplete" => "email", "required" => true]) }}
        <span class="invalid-feedback fw-bold" role="alert"></span>
    </div>
</div>

<div class="row mb-3">
    <label for="photo" class="col-md-3 col-form-label text-md-end">Photo</label>

    <div class="col-md-6">
        {{ Form::file('photo', ['accept' => 'image/x-png, image/gif, image/jpeg', 'class' => 'form-control', 'onchange' => 'previewImage(this)']) }}
        <span class="invalid-feedback fw-bold" role="alert"></span>
    </div>

    <div class="col-md-2 position-relative">
        <img src="{{ isset($applicant) && ! empty($applicant->photo) && file_exists(public_path($applicant->photo)) ? asset($applicant->photo) : 'https://gravatar.com/avatar/9095ca04f14b3ec92563039e7864223e?s=200&d=mp&r=x' }}"
             alt="{{ isset($applicant) ? $applicant->name : null }}"
             default-src="https://gravatar.com/avatar/9095ca04f14b3ec92563039e7864223e?s=200&d=mp&r=x"
             class="img-fluid img-thumbnail position-absolute bottom-0 end-0 avatar">
    </div>
</div>

<div class="row mb-3">
    <label for="division" class="col-md-3 col-form-label text-md-end">Division <span class='text-danger'>*</span></label>

    <div class="col-md-6">
        {{ Form::select('division_id', ['' => 'Select Division'] + $data['dropdown']['divisions'], null, ['id' => 'division', 'class' => 'form-control', 'data-dropdown-child' => 'district_id']) }}
        <span class="invalid-feedback fw-bold" role="alert"></span>
    </div>
</div>

<div class="row mb-3">
    <label for="district" class="col-md-3 col-form-label text-md-end">District <span class='text-danger'>*</span></label>

    <div class="col-md-6">
        <select name="district_id" id="district" class="form-control" data-dropdown-child="upazila_id">
            <option value="">Select District</option>

            @foreach($data['collection']['districts'] as $district)
                <option value="{{ $district['id'] }}"
                        @if(isset($applicant) && $applicant->district_id == $district['id']) selected @endif
                        data-parent="{{ $district['division_id'] }}"
                        class="{{ isset($applicant) && $applicant->division_id == $district['division_id'] ?: 'none' }}">
                        {{ $district['name'] }}
                </option>
            @endforeach
        </select>

        <span class="invalid-feedback fw-bold" role="alert"></span>
    </div>
</div>

<div class="row mb-3">
    <label for="upazila" class="col-md-3 col-form-label text-md-end">Upazila/Thana <span class='text-danger'>*</span></label>

    <div class="col-md-6">
        <select name="upazila_id" id="upazila" class="form-control">
            <option value="">Select Upazila</option>

            @foreach($data['collection']['upazilas'] as $upazila)
                <option value="{{ $upazila['id'] }}"
                        @if(isset($applicant) && $applicant->upazila_id == $upazila['id']) selected @endif
                        data-parent="{{ $upazila['district_id'] }}"
                        class="{{ isset($applicant) && $applicant->district_id == $upazila['district_id'] ?: 'none' }}">
                        {{ $upazila['name'] }}
                </option>
            @endforeach
        </select>

        <span class="invalid-feedback fw-bold" role="alert"></span>
    </div>
</div>

<div class="row mb-3">
    <label for="address_details" class="col-md-3 col-form-label text-md-end">Address Details</label>

    <div class="col-md-6">
        {{ Form::textarea('address_details', null, ['id' => 'address_details', 'class' => 'form-control', "autocomplete" => "address_details", 'rows' => 3]) }}
        <span class="invalid-feedback fw-bold" role="alert"></span>
    </div>
</div>

<div class="row mb-3">
    <label for="language" class="col-md-3 col-form-label text-md-end">Language</label>

    <div class="col-md-6">
        <div class="form-check inline-block">
            <input value="bangla" class="form-check-input" type="checkbox" name="language[]" id="language-bangla" {{ isset($applicant) && in_array('bangla', $applicant->lang_array) ? 'checked' : '' }}>
            <label class="form-check-label" for="language-bangla">
                Bangla
            </label>
        </div>

        <div class="form-check inline-block">
            <input value="english" class="form-check-input" type="checkbox" name="language[]" id="language-english" {{ isset($applicant) && in_array( 'english', $applicant->lang_array) ? 'checked' : '' }}>
                <label class="form-check-label" for="language-english">
                English
            </label>
        </div>

        <div class="form-check inline-block">
            <input value="french" class="form-check-input" type="checkbox" name="language[]" id="language-french" {{ isset($applicant) && in_array('french', $applicant->lang_array) ? 'checked' : '' }}>
                <label class="form-check-label" for="language-french">
                French
            </label>
        </div>

        <span class="invalid-feedback fw-bold" role="alert"></span>
    </div>
</div>

<div class="row mb-3">
    <label for="education" class="col-md-3 col-form-label text-md-end">Education Qualification <span class='text-danger'>*</span></label>

    <div class="col-md-6">
        @include('partials._exams_form')
    </div>
</div>

<div class="row mb-3">
    <label for="cv" class="col-md-3 col-form-label text-md-end">
        @if(isset($applicant) && $applicant->cv && file_exists(public_path($applicant->cv)))
            <a target="_blank" href="{{ url($applicant->cv) }}" class="">Applicant CV</a>
        @else
            CV Attachment
        @endif
    </label>

    <div class="col-md-6">
        {{ Form::file('cv', ['accept' => 'application/msword, application/pdf', 'class' => 'form-control']) }}
        <span class="invalid-feedback fw-bold" role="alert"></span>
    </div>
</div>

<div class="row mb-3">
    <label for="training" class="col-md-3 col-form-label text-md-end">Training</label>

    <div class="col-md-6">
        <div class="form-check inline-block">
            <input value="1" class="form-check-input" type="radio" name="training" @if(isset($applicant) && $applicant->is_trained) checked @endif>
            <label class="form-check-label" for="training">
                Yes
            </label>
        </div>

        <div class="form-check inline-block">
            <input value="0" class="form-check-input" type="radio" name="training" @if(isset($applicant) && ! $applicant->is_trained) checked @endif>
            <label class="form-check-label" for="training">
                No
            </label>
        </div>

        <div id="training-container" class="{{ isset($applicant) && $applicant->is_trained ?: 'none'}} table-container">
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
                                {{ Form::text('training_name[]', $applicant_training->name, ['class' => 'form-control', 'id' => 'training_name-' . $index]) }}
                            </td>
                            <td>
                                {{ Form::text('training_details[]', $applicant_training->details, ['class' => 'form-control', 'id' => 'training_details-' . $index]) }}
                            </td>
                            <td>
                                <button class="btn btn-light btn-sm @if($index > 0) remove-tr @endif" @if($index == 0) disabled @endif>X</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>
                            {{ Form::text('training_name[]', null, ['class' => 'form-control', 'id' => 'training_name-0']) }}
                        </td>
                        <td>
                            {{ Form::text('training_details[]', null, ['class' => 'form-control', 'id' => 'training_details-0']) }}
                        </td>
                        <td>
                            <button class="btn btn-light btn-sm" disabled>X</button>
                        </td>
                    </tr>
                @endif
            </table>

            <span class="invalid-feedback fw-bold" role="alert" data-error="training"></span>
            <span class="invalid-feedback fw-bold" role="alert" data-error="training_name"></span>
            <p class="text-end add-more" data-table="training-table"><button class="btn btn-light btn-sm">Add More..</button></p>
        </div> <!-- .table-container -->
    </div>
</div>

<div class="row mb-0">
    <div class="col-md-6 offset-md-3">
        <button type="submit" class="submit btn btn-primary mr-7">
            Update
        </button>

        <a href="{{ route('admin.applicants.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </div>
</div>
