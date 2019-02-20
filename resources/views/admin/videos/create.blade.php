@extends('admin.layouts.main')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">new video</h1>
            <a href="{{ route('videos.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-circle-left fa-sm text-white-50"></i> Back</a>
        </div>

        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">create new video</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <new-video></new-video>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection