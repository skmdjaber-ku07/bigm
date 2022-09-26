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
                    <select name="exam[]" class="form-control" id="{{ 'exam-' . $index }}">
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
                    <select name="institute[]" class="form-control" id="{{ 'institute-' . $index }}">
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
                    {{ Form::number('result[]', $applicant_exam->pivot->result, ['class' => 'form-control', 'step' => '0.01', 'max' => 5, 'id' => 'result-' . $index]) }}
                </td>
                <td>
                    <button class="btn btn-light btn-sm @if($index > 0) remove-tr @endif" @if($index == 0) disabled @endif>X</button>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td>
                <select name="exam[]" class="form-control" id="exam-0">
                    <option value="">Select Exam</option>

                    @foreach($data['exams_list'] as $exam)
                        <option value="{{ $exam->id }}" level="{{ $exam->level }}">{{ $exam->name }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                {{ Form::select('institute[]', ['' => '--'], null, ['class' => 'form-control', 'disabled' => true, 'id' => 'institute-0']) }}
            </td>
            <td>
                {{ Form::number('result[]', null, ['class' => 'form-control', 'step' => '0.01', 'max' => 5, 'id' => 'result-0']) }}
            </td>
            <td>
                <button class="btn btn-light btn-sm" disabled>X</button>
            </td>
        </tr>
    @endif
</table>

{{ Form::select('board', $data['boards_list'], null, ['id' => 'board', 'class' => 'd-none']) }}
{{ Form::select('university', $data['universities_list'], null, ['id' => 'university', 'class' => 'd-none']) }}
<span class="invalid-feedback fw-bold" role="alert" data-error="exam"></span>
<p class="text-end add-more" data-table="exam-table"><button class="btn btn-light btn-sm">Add More..</button></p>
