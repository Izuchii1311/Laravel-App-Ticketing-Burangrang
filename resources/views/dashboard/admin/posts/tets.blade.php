{{-- Dashboard Layout --}}
@extends('dashboard.layouts.main')

{{-- Title --}}
@section('title', 'Dashboard | Detail Postingan')

{{-- Content --}}
@section('content')
    <div class="row justify-content-center">
        {{-- Information --}}
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
                            <h1 class="mx-4">Lorem Ipsum Dolor Sit Amet</h1>
                            <p class="mx-4"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                            <p class="mx-4"><i><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. </i>
                                <a href="https://facebook.com" class="text-decoration-none pointer-event" style="color: blue;"><i>https://facebook.com</i></a>
                            </p>
                            
                            <ul class="mx-4">
                                <li>Izuchii1311</li>
                                <li>Luthfi Nur Ramadhan</li>
                            </ul>
                            
                            <p class="mx-4"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                            
                            <ol class="mx-4">
                                <li>Full Stack Developer</li>
                                <li>Back-end Developer</li>
                                <li>Front-end Developer</li>
                                <li>Graphic Designer</li>
                            </ol>
                            
                            <blockquote class="mx-auto fst-italic bg-secondary bg-opacity-50 p-4 text-white col-md-8 blockquote text-center"><p>meskipun kamu dijauhi jadilah diri sendiri jangan terus memikirkan semuanya dan larut dalam kesedihan, bangkit untuk terus berjuan.</p></blockquote>
                            
                            <figure class="table mx-auto col-md-8">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>No</td>
                                            <td>Anime Title</td>
                                            <td>Total Episode</td>
                                            <td>Studio</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Konosuba</td>
                                            <td>All Season (72 Episode)</td>
                                            <td>Deen Studios</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </figure>
                            
                            <figure class="image mx-auto text-center">
                                <img src="http://laravel-app-ticketing-g.burangrang.test/post-images/image_1704792929_659d1361a7dbd.png" class="img-fluid" style="width: 600px;">
                                <figcaption>Sparkle Honkai Star Rail.</figcaption>
                            </figure>

                            {{-- <figure class="media"><oembed url="https://www.youtube.com/watch?v=oOotG8xGRt8"></oembed></figure> --}}
                            <figure class="media mx-auto d-block col-md-5">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/oOotG8xGRt8" frameborder="0" allowfullscreen></iframe>
                            </figure>
                            

                            <figure class="image image-style-side mx-4"><img src="http://laravel-app-ticketing-g.burangrang.test/post-images/image_1704793064_659d13e8ee0be.png" class="img-fluid" style="width: 600px;"></figure>
                            <p class="mx-4">Jangan Lupa Like dan Support Saya</p>
                        </div>
                        <a href="{{ url()->previous() }}" class="text-decoration-none card-link mt-5">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- End Content --}}