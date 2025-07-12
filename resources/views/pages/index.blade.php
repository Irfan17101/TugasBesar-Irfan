@extends('layouts.layout')

@section('content')

<head>
    <meta charset="utf-8">
    <title>LAUNDRYFY - Layanan Laundry Profesional di Bandung</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Laundry Kiloan Bandung, Dry Cleaning Jas, Cuci Karpet Bandung, Laundry Cepat" name="keywords">
    <meta content="LAUNDRYFY menyediakan layanan laundry kiloan, satuan, dan dry cleaning berkualitas dengan staf profesional dan antar jemput gratis di area Bandung." name="description">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <!-- Topbar End -->

    <!-- Carousel Start -->
    <div class="carousel-inner">
    <!-- Slide 1 -->
    <div class="carousel-item active">
        <img class="w-100" src="{{ asset('template/img/carousel-1.jpg') }}" alt="Laundry Service">
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <div class="p-3" style="max-width: 900px;">
                <h4 class="text-white text-uppercase mb-md-3">Laundry & Dry Cleaning</h4>
                <h1 class="display-3 text-white mb-md-4">Best For Laundry Services</h1>          
            </div>
        </div>
    </div>
    
    <!-- Slide 2 -->
    <div class="carousel-item">
        <img class="w-100" src="{{ asset('template/img/carousel-2.jpg') }}" alt="Professional Staff">
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <div class="p-3" style="max-width: 900px;">
                <h4 class="text-white text-uppercase mb-md-3">Laundry & Dry Cleaning</h4>
                <h1 class="display-3 text-white mb-md-4">Highly Professional Staff</h1>
                <a href="{{ url('/about') }}" class="btn btn-primary py-md-3 px-md-5 mt-2">Learn More</a>
            </div>
        </div>
    </div>
    
    <!-- Slide 3 (tambahan) -->
    <div class="carousel-item">
        <img class="w-100" src="{{ asset('template/img/carousel-3.jpg') }}" alt="Quality Service">
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <div class="p-3" style="max-width: 900px;">
                <h4 class="text-white text-uppercase mb-md-3">Laundry & Dry Cleaning</h4>
                <h1 class="display-3 text-white mb-md-4">Quality & Fast Service</h1>
                <a href="{{ url('/contact') }}" class="btn btn-primary py-md-3 px-md-5 mt-2">Contact Us</a>
            </div>
        </div>
    </div>
</div>
T
    <!-- Carousel End -->


    <!-- Contact Info Start -->
    <div class="container-fluid contact-info mt-5 mb-4">
        <div class="container" style="padding: 0 30px;">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-secondary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex">
                        <i class="fa fa-2x fa-map-marker-alt text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">Our Location</h5>
                            <p class="m-0 text-white">Bandung Jawa Barat</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-primary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex text-left">
                        <i class="fa fa-2x fa-envelope text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">Email Us</h5>
                            <p class="m-0 text-white">Laundryfy@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center bg-secondary mb-4 mb-lg-0" style="height: 100px;">
                    <div class="d-inline-flex text-left">
                        <i class="fa fa-2x fa-phone-alt text-white m-0 mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="text-white font-weight-medium">Call Us</h5>
                            <p class="m-0 text-white">08989837450</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Info End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
    <div class="container pt-0 pt-lg-4">
        <div class="row align-items-center">
            <!-- Gambar Kiri -->
            <div class="col-lg-5 mb-4 mb-lg-0">
                <img class="img-fluid rounded" src="{{ asset('template/img/about.jpg') }}" alt="Tentang Kami">
            </div>
            <div class="col-lg-7 mt-5 mt-lg-0 pl-lg-5">
                <h6 class="text-secondary text-uppercase font-weight-medium mb-3">Learn About Us</h6>
                <h1 class="mb-4">Penyedia Layanan Laundry Berkualitas di Kota Anda</h1>
                <h5 class="font-weight-medium font-italic mb-4">
                    Kami hadir untuk memberikan layanan laundry terbaik dengan sentuhan profesional dan hasil yang memuaskan. Kami memahami betapa berharganya waktu Anda—karena itu, kami menggabungkan kecepatan, kualitas, dan pelayanan terbaik dalam setiap proses pencucian.
                </h5>
                <p class="mb-2">
                    Dari pakaian sehari-hari hingga item khusus, semua dicuci dengan standar kebersihan tinggi dan perhatian pada setiap detail.
                </p>

                <!-- Fitur -->
                <div class="row">
                    <div class="col-sm-6 pt-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check text-primary mr-2"></i>
                            <p class="text-secondary font-weight-medium m-0">
                                <i class="fas fa-soap mr-2"></i> Layanan Laundry Berkualitas
                              </p>
                        </div>
                    </div>
                    <div class="col-sm-6 pt-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check text-primary mr-2"></i>
                            <p class="text-secondary font-weight-medium m-0">
                                <i class="fas fa-shipping-fast mr-2"></i> Pengantaran Cepat & Tepat Waktu
                              </p>
                        </div>
                    </div>
                    <div class="col-sm-6 pt-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check text-primary mr-2"></i>
                            <p class="text-secondary font-weight-medium m-0">
                                <i class="fas fa-user-tie mr-2"></i> Staf Profesional & Berpengalaman
                              </p>
                        </div>
                    </div>
                    <div class="col-sm-6 pt-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check text-primary mr-2"></i>
                            <p class="text-secondary font-weight-medium m-0">
                                <i class="fas fa-thumbs-up mr-2"></i> Garansi Kepuasan 100%
                              </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <h6 class="text-secondary text-uppercase text-center font-weight-medium mb-3">Proses Kerja</h6>
            <h1 class="display-4 text-center mb-5">Bagaimana Kami Bekerja</h1>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">1</h2>
                        </div>
                        <h3 class="font-weight-bold m-0 mt-2">Pesan Layanan</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">2</h2>
                        </div>
                        <h3 class="font-weight-bold m-0 mt-2">Penjemputan Gratis</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">3</h2>
                        </div>
                        <h3 class="font-weight-bold m-0 mt-2">Proses Cuci</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4" style="width: 150px; height: 150px; border-width: 15px !important;">
                            <h2 class="display-2 text-secondary m-0">4</h2>
                        </div>
                        <h3 class="font-weight-bold m-0 mt-2">Pengantaran Gratis</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing Plan End -->


    <!-- Testimonial Start -->
    <div id="harga" class="container-fluid pt-5 pb-3">
        <div class="container">
            <h6 class="text-secondary text-uppercase text-center font-weight-medium mb-3">Daftar Harga Kami</h6>
            <h1 class="display-4 text-center mb-5">Harga Terbaik & Transparan</h1>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="bg-light text-center mb-2 pt-4">
                        <div class="d-inline-flex flex-column align-items-center justify-content-center bg-secondary rounded-circle shadow mt-2 mb-4" style="width: 200px; height: 200px; border: 15px solid #ffffff;">
                            <h3 class="text-white">Kiloan</h3>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top" style="font-size: 22px; line-height: 45px;">Rp</small>8K<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/kg</small>
                            </h1>
                        </div>
                        <div class="d-flex flex-column align-items-center py-3">
                            <p>Cuci, Kering, Setrika</p>
                            <p>Pengerjaan 3 Hari</p>
                            <p>Pakaian Sehari-hari</p>
                            <p>Minimal Order 3 kg</p>
                        </div>
                        <a href="" class="btn btn-secondary py-2 px-4">Pesan Sekarang</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="bg-light text-center mb-2 pt-4">
                        <div class="d-inline-flex flex-column align-items-center justify-content-center bg-primary rounded-circle shadow mt-2 mb-4" style="width: 200px; height: 200px; border: 15px solid #ffffff;">
                            <h3 class="text-white">Satuan</h3>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top" style="font-size: 22px; line-height: 45px;"></small>Mulai<small class="align-bottom" style="font-size: 16px; line-height: 40px;"></small>
                            </h1>
                        </div>
                        <div class="d-flex flex-column align-items-center py-3">
                            <p>Jas, Gaun, Kebaya</p>
                            <p>Selimut & Bed Cover</p>
                            <p>Gorden & Karpet</p>
                            <p>Perawatan Khusus</p>
                        </div>
                        <a href="" class="btn btn-primary py-2 px-4">Lihat Detail</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="bg-light text-center mb-2 pt-4">
                        <div class="d-inline-flex flex-column align-items-center justify-content-center bg-secondary rounded-circle shadow mt-2 mb-4" style="width: 200px; height: 200px; border: 15px solid #ffffff;">
                            <h3 class="text-white">Ekspres</h3>
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top" style="font-size: 22px; line-height: 45px;">Rp</small>15K<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/kg</small>
                            </h1>
                        </div>
                        <div class="d-flex flex-column align-items-center py-3">
                            <p>Layanan Super Cepat</p>
                            <p>Selesai di Hari yang Sama</p>
                            <p>Kualitas Tetap Terjaga</p>
                            <p>Hubungi untuk Info</p>
                        </div>
                        <a href="" class="btn btn-secondary py-2 px-4">Pesan Ekspres</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-primary text-white mt-5 pt-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href=""><h1 class="text-secondary mb-3"><span class="text-white">DRY</span>ME</h1></a>
                <p>Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr sit no, sed kasd et ipsum dolor duo dolor</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white mb-4">Get In Touch</h4>
                <p>Dolor clita stet nonumy clita diam vero, et et ipsum diam labore</p>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white mb-4">Quick Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Services</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Pricing</a>
                    <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white mb-4">Newsletter</h4>
                <form action="">
                    <div class="form-group">
                        <input type="text" class="form-control border-0" placeholder="Your Name" required="required" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control border-0" placeholder="Your Email" required="required" />
                    </div>
                    <div>
                        <button class="btn btn-lg btn-secondary btn-block border-0" type="submit">Submit Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center text-white">
            &copy; <a class="text-white font-weight-medium" href="#">Your Site Name</a>. All Rights Reserved. 
			
			<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
			Designed by <a class="text-white font-weight-medium" href="https://htmlcodex.com">HTML Codex</a>
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>



@endsection
