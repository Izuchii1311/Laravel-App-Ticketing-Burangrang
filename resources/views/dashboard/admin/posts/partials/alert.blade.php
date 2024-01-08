{{-- TODO: Partials Alert --}}
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
        <i class="menu-icon tf-icons bx bx-check me-2 mb-1"></i>
        <strong>Selamat</strong>, {!! session('success') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session()->has('warning'))
    <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert">
        <i class="menu-icon tf-icons bx bx-info-circle me-2 mb-1"></i>
        {!! session('warning') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mx-4" role="alert">
        <i class="menu-icon tf-icons bx bx-error-circle me-2 mb-1"></i>
        {!! session('error') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif