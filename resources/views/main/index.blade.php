{{-- Main Layouts --}}
@extends('main.layouts.main')

@section('title', "Home")

@section('container')
    {{-- Hero Section --}}
    @include('main.layouts.partials.hero')
    {{-- End Hero Section --}}

    {{-- Main Section --}}
    <main id="main">
        @include('main.layouts.partials.about')

        @include('main.layouts.partials.services')

        {{-- @include('main.layouts.partials.counts') --}}

        @include('main.layouts.partials.cta')

        @include('main.layouts.partials.portofolio')

        {{-- @include('main.layouts.partials.testimonials') --}}

        {{-- @include('main.layouts.partials.team') --}}

        @include('main.layouts.partials.contact')
    </main>
    {{-- End Main Section --}}
@endsection