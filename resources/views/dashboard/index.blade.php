{{-- Dashboard Layout --}}
@extends('dashboard.layouts.main')

{{-- Title --}}
@section('title', 'Dashboard | Home')

{{-- Content --}}
@section('content')
    {{-- @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="menu-icon tf-icons bx bx-error-circle me-2 mb-1"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}

    {{-- Cards --}}
    <div class="row">
        {{-- Congratulation Card --}}
        @include('dashboard.layouts.partials.congratulation-card')

        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                {{-- Card Profit --}}
                @include('dashboard.layouts.partials.card-profit')
                {{-- Card Sales --}}
                @include('dashboard.layouts.partials.card-sales')
            </div>
        </div>

        {{-- Total Revenue --}}
        @include('dashboard.layouts.partials.card-total-revenue')

        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
            <div class="row">
                {{-- Card Payment --}}
                @include('dashboard.layouts.partials.card-payment')
                {{-- Card Transaction --}}
                @include('dashboard.layouts.partials.card-transaction')
            </div>

            {{-- Card Profile Report --}}
            @include('dashboard.layouts.partials.card-profile-report')
        </div>
    </div>

    {{-- Cards --}}
    <div class="row">
        {{-- Order Statistic --}}
        @include('dashboard.layouts.partials.card-order-statistic')

        {{-- Expense Overview --}}
        @include('dashboard.layouts.partials.card-expense-overview')

        {{-- Transactions --}}
        @include('dashboard.layouts.partials.card-transactions')
    </div>
@endsection
{{-- End Content --}}