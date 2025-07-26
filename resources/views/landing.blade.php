
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

		<title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">
          <img src="{{asset('img/logo_etnofarmaka.jpg')}}" class="rounded-circle" alt="" style="width:90px">
        </a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item active">
							<a class="nav-link" href="index.html">Home</a>
						</li>
						<li><a class="nav-link" href="about.html">About us</a></li>
						<li><a class="nav-link" href="contact.html">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
  <li>
    <a href="{{ route('login') }}" class="btn btn-dark d-flex align-items-center gap-2 px-4 py-2 rounded-pill shadow-sm">
      <img src="{{ asset('img/user.svg') }}" alt="Login" style="width: 20px;">
      <span style="font-weight: 500;">Login</span>
    </a>
  </li>
</ul>


				</div>
			</div>

		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1>Solusi Alami <span class="d-block">Kesehatan Anda</span></h1>
					<p class="mb-4">Temukan berbagai pilihan obat herbal etnofarmaka yang terbuat dari bahan alami pilihan, aman, dan bermanfaat untuk kesehatan tubuh Anda.</p>
					<p>
						<a href="{{ url('/produk') }}" class="btn btn-secondary me-2">Lihat Produk</a>
						<a href="{{ url('/tentang') }}" class="btn btn-white-outline">Pelajari Lebih Lanjut</a>
					</p>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="hero-img-wrap">
					<img src="{{ asset('img/foto1.png') }}" class="img-fluid" alt="Obat Herbal">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Hero Section -->

		<!-- Start Product Section -->
<div class="product-section">
  <div class="container">
    <div class="row">

      <!-- Start Column 1 -->
      <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
        <h2 class="mb-4 section-title">Produk Herbal Terlaris</h2>
        <p class="mb-4">Dapatkan produk pilihan terbaik dari bahan alami yang telah dipercaya membantu menjaga kesehatan secara tradisional dan alami.</p>
        <p><a href="{{ url('/produk') }}" class="btn">Lihat Semua Produk</a></p>
      </div>
      <!-- End Column 1 -->

      <!-- Loop Produk Terlaris -->
      @foreach ( $produkTerbaru as $produk)
      <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
        <a class="product-item" href="{{ url('/produk/' . $produk->id) }}">
          <img src="{{ asset('storage/' . $produk->foto) }}" class="img-fluid product-thumbnail" alt="{{ $produk->nama_obat }}">
          <h3 class="product-title">{{ $produk->nama_obat }}</h3>
          <strong class="product-price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</strong>

          <span class="icon-cross">
            <img src="{{ asset('img/cross.svg') }}" class="img-fluid" alt="Add to cart">
          </span>
        </a>
      </div>
      @endforeach
      <!-- End Loop -->

    </div>
  </div>
</div>
<!-- End Product Section -->


	<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
  <div class="container">
    <div class="row justify-content-between">

      <!-- Text & Features -->
      <div class="col-lg-6">
        <h2 class="section-title">Mengapa Memilih Kami?</h2>
        <p>Kami menyediakan produk herbal etnofarmaka berkualitas tinggi yang diramu dari bahan alami pilihan dan diproses secara higienis untuk mendukung kesehatan keluarga Anda.</p>

        <div class="row my-5">
          <div class="col-6 col-md-6">
            <div class="feature">
              <div class="icon">
                <img src="{{ asset('img/truck.svg') }}" alt="Pengiriman Cepat" class="img-fluid">
              </div>
              <h3>Pengiriman Cepat</h3>
              <p>Pengiriman cepat & aman ke seluruh Indonesia dalam waktu 1-3 hari kerja.</p>
            </div>
          </div>

          <div class="col-6 col-md-6">
            <div class="feature">
              <div class="icon">
                <img src="{{ asset('img/bag.svg') }}" alt="Belanja Mudah" class="img-fluid">
              </div>
              <h3>Belanja Mudah</h3>
              <p>Website mudah digunakan dengan berbagai metode pembayaran yang tersedia.</p>
            </div>
          </div>

          <div class="col-6 col-md-6">
            <div class="feature">
              <div class="icon">
                <img src="{{ asset('img/support.svg') }}" alt="Layanan Pelanggan" class="img-fluid">
              </div>
              <h3>Layanan Pelanggan</h3>
              <p>Tim support kami siap membantu Anda setiap hari, 24 jam nonstop.</p>
            </div>
          </div>

          <div class="col-6 col-md-6">
            <div class="feature">
              <div class="icon">
                <img src="{{ asset('img/return.svg') }}" alt="Garansi" class="img-fluid">
              </div>
              <h3>Garansi Pengembalian</h3>
              <p>Jika produk tidak sesuai, kami jamin pengembalian tanpa ribet dalam 7 hari.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Image -->
      <div class="col-lg-5">
        <div class="img-wrap">
          <img src="{{ asset('img/why-choose-us-img.jpg') }}" alt="Alasan Memilih Kami" class="img-fluid">
        </div>
      </div>

    </div>
  </div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start We Help Section -->
<div class="we-help-section">
  <div class="container">
    <div class="row justify-content-between">

      <!-- Image Grid -->
      <div class="col-lg-7 mb-5 mb-lg-0">
        <div class="imgs-grid">
          <div class="grid grid-1"><img src="{{ asset('img/1.jpg') }}" alt="Proses Pembuatan Obat Herbal"></div>
          <div class="grid grid-2"><img src="{{ asset('img/img-grid-2.jpg') }}" alt="Tanaman Herbal Alami"></div>
          <div class="grid grid-3"><img src="{{ asset('img/4.jpg') }}" alt="Produk Kami"></div>
        </div>
      </div>

      <!-- Text -->
      <div class="col-lg-5 ps-lg-5">
        <h2 class="section-title mb-4">Kami Hadir untuk Kesehatan Anda secara Alami</h2>
        <p>Obat herbal etnofarmaka kami terinspirasi dari warisan budaya dan pengetahuan lokal yang telah terbukti turun-temurun dalam menjaga kesehatan. Kami membantu Anda menjalani gaya hidup sehat dengan bahan alami pilihan.</p>

        <ul class="list-unstyled custom-list my-4">
          <li>Diformulasikan dari bahan herbal asli Indonesia</li>
          <li>Diproses secara higienis dan terstandarisasi</li>
          <li>Telah melalui uji keamanan dan manfaat</li>
          <li>Dikirim langsung dari pusat produksi kami</li>
        </ul>

        <p><a href="#" class="btn">Jelajahi Produk</a></p>
      </div>
    </div>
  </div>
</div>
<!-- End We Help Section -->

		<!-- Start Popular Product -->
<div class="popular-product py-5">
  <div class="container">
    <div class="row">

      @foreach ($produkTerlaris as $produk)
        <div class="col-12 col-md-6 col-lg-4 mb-4">
          <div class="product-item-sm d-flex">
            <div class="thumbnail">
              <img src="{{ asset('img/' . $produk->gambar) }}" alt="{{ $produk->nama }}" class="img-fluid">
            </div>
            <div class="pt-3 ps-3">
              <h3 class="mb-1">{{ $produk->nama }}</h3>
              <p class="mb-2">{{ Str::limit($produk->deskripsi, 80) }}</p>
              <p><a href="{{ route('produk.show', $produk->id) }}">Lihat Detail</a></p>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</div>
<!-- End Popular Product -->

		<!-- Start Testimonial Slider -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Testimonials</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div>
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div>
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div>
								<!-- END item -->

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->


		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="images/sofa.png" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
						<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>  <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->


		<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/tiny-slider.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

	</body>

</html>
