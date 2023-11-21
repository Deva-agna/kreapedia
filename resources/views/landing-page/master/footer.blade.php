<section id="footer" class="pt-2 pb-2">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('app-assets/images/asset-company/logo-dashboard.png') }}" height="40px">
                <hr>
                <p>
                    {{ $profileCompany->alamat }} - {{ $profileCompany->kota }} - {{ $profileCompany->negara }}
                    <br>
                    <br>
                    <strong>Whatsapp:</strong> +{{ $profileCompany->no_wa }}
                    <br>
                    <strong>Email:</strong> {{ $profileCompany->email }}
                    <br>
                </p>
            </div>
            <div class="col-md-4">
                <h4>Tautan</h4>
                <ul>
                    <li>
                        <i data-feather='chevron-right'></i>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <i data-feather='chevron-right'></i>
                        <a href="{{ route('about.us') }}">About Us</a>
                    </li>
                    <li>
                        <i data-feather='chevron-right'></i>
                        <a href="{{ route('page.event') }}">Event</a>
                    </li>
                    <li>
                        <i data-feather='chevron-right'></i>
                        <a href="{{ route('page.service') }}">Service</a>
                    </li>
                    <li>
                        <i data-feather='chevron-right'></i>
                        <a href="{{ route('page.berita') }}">News</a>
                    </li>
                    <li>
                        <i data-feather='chevron-right'></i>
                        <a href="{{ route('page.literasi') }}">Literasi</a>
                    </li>
                    <li>
                        <i data-feather='chevron-right'></i>
                        <a href="{{ route('page.contact') }}">Contact Us</a>
                    </li>
                    <li>
                        <i data-feather='chevron-right'></i>
                        <a href="{{ route('page.faq') }}">FAQ</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Layanan Kami</h4>
                <ul>
                    <?php

                    use App\Models\Service;

                    $service_s = Service::orderBy('layanan', 'asc')->get();
                    ?>

                    @foreach($service_s as $service)
                    <li>
                        <i data-feather='chevron-right'></i>
                        <a href="#">{{$service->layanan}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="copyright" class="w-100 text-center">
    <div><i class="fa-regular fa-copyright"></i> Copyright <strong>Kreapedia</strong>. All Rights Reserved</div>
    <div class="sosial d-flex justify-content-center">
        <a href="https://wa.me/{{ $profileCompany->no_wa }}"><i class="fa-brands fa-whatsapp"></i></a>
        <a href="mailto:{{$profileCompany->email}}"><i class="fa-regular fa-envelope"></i></a>
        @if($profileCompany->tiktok)
        <a href="{{ $profileCompany->tiktok }}" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
        @endif
        @if($profileCompany->instagram)
        <a href="{{ $profileCompany->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
        @endif
        @if($profileCompany->youtube)
        <a href="{{ $profileCompany->youtube }}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
        @endif
        @if($profileCompany->facebook)
        <a href="{{ $profileCompany->facebook }}" target="_blank"><i class="fa-brands fa-facebook"></i></a>
        @endif
        @if($profileCompany->twitter)
        <a href="{{ $profileCompany->twitter }}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
        @endif
        @if($profileCompany->telegram)
        <a href="{{ $profileCompany->telegram }}" target="_blank"><i class="fa-brands fa-telegram"></i></a>
        @endif
    </div>
</section>