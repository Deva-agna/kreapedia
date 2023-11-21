<h4 class="card-title">{{ $literasi->judul }}</h4>
<div class="badge badge-pill badge-light-warning">{{ $literasi->kategoriLiterasi->kategori }}</div>
<hr>
<h4 class="card-title">Abstrak</h4>
<p class="card-text mb-2 text-justify">{{ $literasi->abstrak }}</p>
<iframe src="{{ asset('asset-literasi/' . $literasi->nama_file) }}" frameborder="0" width="100%" height="500px"></iframe>