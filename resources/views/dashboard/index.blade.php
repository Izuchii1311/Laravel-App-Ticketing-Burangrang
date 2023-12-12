@extends('dashboard.layouts.main')

@section('content')
{{-- Cards --}}
<div class="row">
    {{-- Congratulation Card --}}
    @include('dashboard.layouts.partials.congratulation-card')
    {{-- End Congratualation Card --}}

    <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
            {{-- Card Profit --}}
            @include('dashboard.layouts.partials.card-profit')
            {{-- End Card Profit --}}
            {{-- Card Sales --}}
            @include('dashboard.layouts.partials.card-sales')
            {{-- End Card Sales --}}
        </div>
    </div>

    <!-- Total Revenue -->
    @include('dashboard.layouts.partials.card-total-revenue')
    <!--/ Total Revenue -->

    <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
        <div class="row">
            {{-- Card Payment --}}
            @include('dashboard.layouts.partials.card-payment')
            {{-- End Card Payment --}}
            {{-- Card Transaction --}}
            @include('dashboard.layouts.partials.card-transaction')
            {{-- End Card Transaction --}}
        </div>

        {{-- Card Profile Report --}}
        @include('dashboard.layouts.partials.card-profile-report')
        {{-- End Card Profile Report --}}

    </div>
    {{-- End Col --}}

</div>
{{-- End Cards --}}

{{-- Cards --}}
<div class="row">
    <!-- Order Statistics -->
    @include('dashboard.layouts.partials.card-order-statistic')
    <!--/ Order Statistics -->

    <!-- Expense Overview -->
    @include('dashboard.layouts.partials.card-expense-overview')
    <!--/ Expense Overview -->

    <!-- Transactions -->
    @include('dashboard.layouts.partials.card-transactions')
    <!--/ Transactions -->
</div>
{{-- End Cards --}}
@endsection