{{-- Main Layouts --}}
@extends('main.layouts.main')

{{-- Title --}}
@section('title', "Home")

{{-- Container --}}
@section('container')
    {{-- Hero Section --}}
    @include('main.layouts.partials.hero')

    {{-- Main Section --}}
    <main id="main">
        @include('main.layouts.partials.about')

        @include('main.layouts.partials.services')

        @include('main.layouts.partials.cta')

        @include('main.layouts.partials.portofolio')

        @include('main.layouts.partials.contact')
    </main>
@endsection