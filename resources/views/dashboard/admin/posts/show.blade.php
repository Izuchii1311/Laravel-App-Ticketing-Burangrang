{{-- Dashboard Layout --}}
@extends('dashboard.layouts.main')

{{-- Title --}}
@section('title', 'Dashboard | Detail Postingan')

{{-- Content --}}
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 card-separator">
            <h3>Detail Pesan ✌ </h3>
            <div class="col-12 col-md-8">
                <p>Pesan para pengunjung ini akan ditampilkan di halaman landing page, kamu bisa menambahkan atau menghapus pesan rekomendasi para pengunjung...</p>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p class="mt-4">{{ $post->title }}</p>
                        <div class="description">
                            {!! $post->description !!}
                        </div>
                        <a href="{{ url()->previous() }}" class="text-decoration-none card-link mt-5">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const description = document.querySelector('.description');
        const images = description.querySelectorAll('img');
        const figures = description.querySelectorAll('figure');

        // Figure Styling
        figures.forEach(function (figure) {
            // Change Image Style
            const isImageFigure = figure.classList.contains('image');
            const isSideImageFigure = figure.classList.contains('image-style-side');

            if (isImageFigure) {
                figure.classList.add('mx-auto', 'text-center');
                if (isSideImageFigure) {
                    figure.classList.remove('mx-auto', 'text-center');
                }
            }

            // Change Table Position
            const isTable = figure.querySelector('.table');
        });

        // Change Image Size
        images.forEach(function(image) {
            image.style.width = '600px';
            image.classList.add('img-fluid');
        });
    </script>
@endpush