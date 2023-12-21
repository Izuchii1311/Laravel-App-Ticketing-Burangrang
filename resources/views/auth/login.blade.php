{{-- Auth Layout --}}
@extends('auth.layouts.main')

{{-- Title --}}
@section('title', "Halaman Login")

{{-- Content --}}
@section('content')
    <div class="authentication-inner">

    {{-- Login --}}
        <div class="card">
            <div class="card-body">

                {{-- Logo --}}
                <div class="app-brand justify-content-center">
                    <a href="#" class="app-brand-link gap-2">
                        <span class="app-brand-text demo text-body fw-bold">Halaman Login</span>
                    </a>
                </div>

                {{-- Information --}}
                <h4 class="mb-2">Selamat Datang! 👋</h4>
                <p class="mb-4">Tolong masukkan informasi data login anda.</p>

                {{-- Form --}}
                <form id="formAuthentication" class="mb-3" action="/login" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan alamat email anda..." autocomplete="off" autofocus required value="{{ old("email") }}"/>
                        @error('email')
                            <div class="invalid-feedback">
                                Pastikan email dan password yang anda masukkan benar!
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password anda..." aria-describedby="password" autocomplete="off" required/>
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            @error('email')
                                <div class="invalid-feedback">
                                    Pastikan email dan password yang anda masukkan benar!
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                    </div>
                    <p class="text-center">
                        <a href="{{ route('main.index')}}" class="text-decoration-none">Kembali</a>
                    </p>
                </form>

            </div>
        </div>

    </div>
    {{-- End Login --}}
@endsection
{{-- End Content --}}