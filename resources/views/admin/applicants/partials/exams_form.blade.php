<table id="exam-table" class="table">
    <tr>
        <td style="min-width: 130px;">Exam Name</td>
        <td style="width: 200px;">Board/University</td>
        <td style="width: 100px;">Result</td>
        <td></td>
    </tr>

    @if(isset($applicant) && $applicant->exams()->count())
        @foreach($applicant->exams as $index => $applicant_exam)
            <tr>
                <td>
                    <select name="exam[]" class="form-control">
                        <option value="">Select Exam</option>

                        @foreach($data['exams_list'] as $exam)
                            <option value="{{ $exam->id }}"
                                    level="{{ $exam->level }}"
                                    @if($exam->id == $applicant_exam->id) selected @endif>
                                    {{ $exam->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="institute[]" class="form-control">
                        <option value="">Select {{ ucfirst($applicant_exam->pivot->institute_type) }}</option>

                        @foreach($data[Str::plural($applicant_exam->pivot->institute_type) . '_list'] as $institute_id => $institute_name)
                            <option value="{{ $institute_id }}"
                                    @if($institute_id == $applicant_exam->pivot->institute_id) selected @endif>
                                    {{ $institute_name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    {{ Form::text('result[]', $applicant_exam->pivot->result, ['class' => 'form-control']) }}
                </td>
                <td>
                    <button class="btn btn-light btn-sm @if($index > 1) remove-tr @endif" @if($index <= 1) disabled @endif>X</button>
                </td>
            </tr>
        @endforeach

        @if($applicant->exams()->count() == 1)
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
                    {{ Form::text('result[]', '', ['class' => 'form-control']) }}
                </td>
                <td>
                    <button class="btn btn-light btn-sm" disabled>X</button>
                </td>
            </tr>
        @endif
    @else
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
                {{ Form::text('result[]', '', ['class' => 'form-control']) }}
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
                {{ Form::text('result[]', '', ['class' => 'form-control']) }}
            </td>
            <td>
                <button class="btn btn-light btn-sm" disabled>X</button>
            </td>
        </tr>
    @endif
</table>

{{ Form::select('board', $data['boards_list'], null, ['id' => 'board', 'class' => 'd-none']) }}
{{ Form::select('university', $data['universities_list'], null, ['id' => 'university', 'class' => 'd-none']) }}
<p class="text-end add-more" data-table="exam-table"><button class="btn btn-light btn-sm">Add More..</button></p>
