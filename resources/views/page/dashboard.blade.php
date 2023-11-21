@extends('layout.master')

@section('title', 'Dashboard')

@section('dashboard', 'active')

@section('content')
<div class="col-12">
    <div class="card card-statistics">
        <div class="card-header">
            <h4 class="card-title">Statistics</h4>
        </div>
        <div class="card-body statistics-body">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                    <div class="media">
                        <div class="avatar bg-light-info mr-2">
                            <div class="avatar-content">
                                <i data-feather="user" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="media-body my-auto">
                            <h4 class="font-weight-bolder mb-0">{{ $tim }}</h4>
                            <p class="card-text font-small-3 mb-0">Team</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                    <div class="media">
                        <div class="avatar bg-light-primary mr-2">
                            <div class="avatar-content">
                                <i data-feather="trending-up" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="media-body my-auto">
                            <h4 class="font-weight-bolder mb-0">{{ $berita }}</h4>
                            <p class="card-text font-small-3 mb-0">Berita</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                    <div class="media">
                        <div class="avatar bg-light-danger mr-2">
                            <div class="avatar-content">
                                <i data-feather="box" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="media-body my-auto">
                            <h4 class="font-weight-bolder mb-0">{{ $event }}</h4>
                            <p class="card-text font-small-3 mb-0">Event</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="media">
                        <div class="avatar bg-light-success mr-2">
                            <div class="avatar-content">
                                <i data-feather="book-open" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="media-body my-auto">
                            <h4 class="font-weight-bolder mb-0">{{ $literasi }}</h4>
                            <p class="card-text font-small-3 mb-0">Literasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection