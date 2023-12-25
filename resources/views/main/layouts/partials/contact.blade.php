{{-- Contact Section --}}
<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">

        {{-- Information --}}
        <div class="section-title">
            <h2>Hubungi Kami</h2>
            <p>Kami senantiasa siap mendengar dan melayani Anda. Hubungi kami melalui kontak yang tersedia untuk segala pertanyaan, kebutuhan, atau masukan. Bersama-sama kita bangun Desa Burangrang menjadi tempat yang lebih baik untuk kita semua. Terima kasih atas partisipasi dan dukungan Anda.</p>
        </div>

        {{-- Content --}}
        <div class="row">
            <div class="col-lg-6">
                <div class="info-box mb-4">
                    <i class="bx bx-map"></i>
                    <h3>Alamat</h3>
                    <p>Tugumukti, Cisarua, Kabupaten Bandung Barat, Jawa Barat 40551</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="info-box mb-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Email</h3>
                    <p>izuchii1311@gmail.com</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Telfon</h3>
                    <p>+62 857 2258 4409</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 ">
                <iframe src="https://maps.google.com/maps?q=Tugumukti,%20Cisarua,%20West%20Bandung%20Regency,%20West%20Java%2040551&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
            </div>

            <div class="col-lg-6">
                <form action="/message" method="post" class="bg-white p-4">
                    @csrf
                    <h6 class="text-center fw-bold mb-3">Berikan Pesan dan Kesan Anda!</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control rounded-0" id="name" name="name" placeholder="Masukkan nama anda" required autocomplete="off">
                            @error('name')
                                <div class="invalid-feedback">
                                    Nama harus diisi dengan benar
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" class="form-control rounded-0" id="email" name="email" placeholder="Masukkan email anda" required autocomplete="off">
                            @error('email')
                                <div class="invalid-feedback">
                                    Email harus diisi dengan benar
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 form-group">
                        <input type="text" class="form-control rounded-0" id="title" name="title" placeholder="Judul Pesan" required autocomplete="off">
                        @error('title')
                            <div class="invalid-feedback">
                                Judul Pesan harus diisi dengan benar
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control rounded-0" id="message" name="message" rows="5" placeholder="Masukkan Pesan" required autocomplete="off"></textarea>
                        @error('message')
                            <div class="invalid-feedback">
                                Pesan harus diisi dengan benar
                            </div>
                        @enderror
                    </div>

                    @if(session()->has("success"))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Selamat, </strong>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary rounded-0 border-0" style="background-color: #21D375">Kirim</button>
                </form>
                {{-- <form action="/message"  method="post" id="myForm" class="php-email-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama" required autofocus value="{{ old('name') }}" autocomplete="off">
                            @error('name')
                                <div class="invalid-feedback">
                                    Nama harus diisi dengan benar
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required value="{{ old('email') }}" autocomplete="off">
                            @error('email')
                                <div class="invalid-feedback">
                                    Email harus diisi dengan benar
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Judul" required value="{{ old('title') }}" autocomplete="off">
                        @error('title')
                                <div class="invalid-feedback">
                                    Subjek Judul harus diisi dengan benar
                                </div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Pesan" required autocomplete="off"></textarea>
                        @error('message')
                                <div class="invalid-feedback">
                                    Pesan harus diisi dengan benar
                                </div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="submitButton">Kirim Pesan</button>
                    </div>
                </form> --}}
            </div>

        </div>

    </div>
</section>
{{-- End Contact Section5 --}}
