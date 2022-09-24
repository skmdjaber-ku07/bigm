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
