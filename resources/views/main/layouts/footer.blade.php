{{-- Footer --}}
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

            {{-- Footer Description --}}
            <div class="col-lg-4 col-md-6 footer-newsletter">
                <h3 class="fw-bolder">Kampung Nyalindung</h3>
                <p class="mt-2">
                    Tugumukti, Cisarua, Kabupaten Bandung Barat, Jawa Barat 40551 <br><br>
                    <strong>Telfon:</strong> +62 857 2258 4409<br>
                    <strong>Email:</strong> izuchii1311@gmail.com<br>
                </p>
                <div class="social-links mt-3">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>

            {{-- Links --}}
            <div class="col-lg-2 col-md-6 footer-links">
                <h4>Link Terkait</h4>
                <ul>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">About</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Pelayanan</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Kerja sama</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Dokumentasi</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Hubungi Kami</a></li>
                </ul>
            </div>

            {{-- Another Links --}}
            <div class="col-lg-2 col-md-6 footer-links">
                <h4>Link Lainnya</h4>
                <ul>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Beranda</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Berita</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Wisata</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Tentang Kami</a></li>
                    @auth
                        <li><i class="bx bx-chevron-right"></i><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    @else
                        <li><i class="bx bx-chevron-right"></i><a href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>
            </div>

            {{-- About us --}}
            <div class="col-lg-4 col-md-6 footer-newsletter">
                <h4>Tentang kami</h4>
                <p class="pb-3"><em>Kampung Nyalindung, tempat di mana keindahan alam menyatu, dari puncak Pegunungan Burangrang hingga ke pesona Curug Cipalasari, menghadirkan ketenangan dan keajaiban yang tak terlupakan. Kami harap anda tertarik untuk terus berkunjung ke tempat wisata...</em></p>
            </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Kampung Nyalindung</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Created by <a href="#"><strong>BEM</strong> STMIK "AMIK BANDUNG"</a>
        </div>
    </div>
</footer>
{{-- End Footer --}}