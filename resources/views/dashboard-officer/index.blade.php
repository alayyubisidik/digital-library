@extends('layout.main')

@section('title', 'Officer')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Dashboard </h3>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="mb-2 text-dark font-weight-normal">Book</h5>
                        <h2 class="mb-4 text-dark font-weight-bold">{{ $countBook }}</h2>
                        <div
                            class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent">
                            <i class="mdi mdi-account-circle icon-md absolute-center text-dark"></i>
                        </div>
                        <p class="mt-4 mb-0">Available</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="mb-2 text-dark font-weight-normal">Borrowing</h5>
                        <h2 class="mb-4 text-dark font-weight-bold">{{ $countBorrowing }}</h2>
                        <div
                            class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent">
                            <i class="mdi mdi-eye icon-md absolute-center text-dark"></i>
                        </div>
                        <p class="mt-4 mb-0">Have been done</p>
                        {{-- <h3 class="mb-0 font-weight-bold mt-2 text-dark">35%</h3> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="mb-2 text-dark font-weight-normal">Rating and Review</h5>
                        <h2 class="mb-4 text-dark font-weight-bold">{{ $countReview }}</h2>
                        <div
                            class="dashboard-progress dashboard-progress-4 d-flex align-items-center justify-content-center item-parent">
                            <i class="mdi mdi-cube icon-md absolute-center text-dark"></i>
                        </div>
                        <p class="mt-4 mb-0">Given</p>
                        {{-- <h3 class="mb-0 font-weight-bold mt-2 text-dark">25%</h3> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
