@extends('admin.layouts.main')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800">Edit  Membership</h5>
            <a href="{{ route('memberships.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-circle-left fa-sm text-white-50"></i> Back</a>

        </div>

        <div class="row">
            <div class="col-sm-12">
                <edit-membership :membership_id="{{ $membership->id }}"></edit-membership>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection