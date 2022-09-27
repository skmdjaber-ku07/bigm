@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Applicants</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div id="table-filter" class="d-none">
                        {{ Form::select('division_id', ['' => 'Select Division'] + $data['dropdown']['divisions'], null, ['data-dropdown-child' => 'district_id']) }}

                        <select name="district_id" data-dropdown-child="upazila_id">
                            <option value="">Select District</option>

                            @foreach($data['collection']['districts'] as $district)
                                <option value="{{ $district['id'] }}"
                                        data-parent="{{ $district['division_id'] }}"
                                        class="none">
                                        {{ $district['name'] }}
                                </option>
                            @endforeach
                        </select>

                        <select name="upazila_id">
                            <option value="">Select Upazila</option>

                            @foreach($data['collection']['upazilas'] as $upazila)
                                <option value="{{ $upazila['id'] }}"
                                        data-parent="{{ $upazila['district_id'] }}"
                                        class="none">
                                        {{ $upazila['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div> <!-- table-filter -->

                    <table id="datatable" class="table table-hover" data-url="{{ route('admin.applicants.data') }}">
                        <thead>
                            <tr>
                                <th scope="col">Applicant's Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Division</th>
                                <th scope="col">District</th>
                                <th scope="col">Upazila/Thana</th>
                                <th scope="col">Insert Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
