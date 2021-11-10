<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ثانوية الفرقان</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('site/img/favicon.png')}}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('site/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('site/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('site/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('site/css/style.css')}}" rel="stylesheet">


</head>

<body>

<!-- ======= Mobile nav toggle button ======= -->
<i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

<!-- ======= Header ======= -->
<header id="header">
    <div class="d-flex flex-column">

        <div class="profile">
            <img src="{{asset('site/img/profile-img.jpg')}}" alt="" class="img-fluid rounded-circle">
            <h1 class="text-light"><a href="">{{\Illuminate\Support\Facades\Auth::user()->name}}</a></h1>
        </div>

        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>الرئيسية</span></a></li>
                <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>معلوماتي</span></a></li>
                <li><a href="#facts" class="nav-link scrollto"><i class="bi bi-gift"></i> <span>نقاطي</span></a></li>
                <li><a href="#skills" class="nav-link scrollto"><i class="bi bi-stickies"></i> <span>ملاحظاتي</span></a></li>
                <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>الواجبات المنزلية</span></a></li>
                <li><a href="#services" class="nav-link scrollto"><i class="bi bi-book"></i> <span>العلامات</span></a></li>
                <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>تواصل معنا</span></a></li>
                <li><a href="{{route('site.logout')}}" class="nav-link scrollto"><i class="bi bi-door-open"></i> <span>تسجيل خروج</span></a></li>
            </ul>
        </nav><!-- .nav-menu -->
    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
        <h1>الفرقان</h1>
        <p>شرعية <span class="typed" data-typed-items="تميز , اجتهاد , متابعة  "></span></p>
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title">
                <h2>معلوماتي</h2>
                <p>أتمنى الاجتهاد والمثابرة في المدرسة والحصول على الدرجات العالية</p>
            </div>

            <div class="row">
                <div class="col-lg-4" data-aos="fade-right">
                    <img src="{{asset('site/img/profile-img.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3></h3>
                    <p class="fst-italic">

                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>تاريخ الميلاد :&nbsp; </strong> <span> {{\Illuminate\Support\Facades\Auth::user()->birthday}}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>العنوان :&nbsp;</strong> <span>{{\Illuminate\Support\Facades\Auth::user()->address}}</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>العمر :&nbsp; </strong> <span>{{$age.' سنة '}}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong> الهاتف :&nbsp;</strong> <span>{{\Illuminate\Support\Facades\Auth::user()->phone}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <p>
                        معلومات عامة عن الطالب
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section  points ======= -->
    <section id="facts" class="facts">
        <div class="container">

            <div class="section-title">
                <h2>نقاطي</h2>
                <p></p>
            </div>

            <div class="row no-gutters">

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
                    <div class="count-box">
                        <i class="bi bi-emoji-sunglasses"></i>
                        <span data-purecounter-start="0" data-purecounter-end="@isset($pointPos) {{$pointPos}} @endisset" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong> النقاط الإيجابية</strong> </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="count-box">
                        <i class="bi bi-emoji-frown"></i>
                        <span data-purecounter-start="0" data-purecounter-end="@isset($pointNeg) {{$pointNeg}} @endisset" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>النقاط السلبية</strong> </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="count-box">
                        <i class="bi bi-hand-thumbs-up"></i>
                        <span data-purecounter-start="0" data-purecounter-end="@isset($pointNeg) {{$pointPos + $pointNeg}} @endisset" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>المحصلة</strong> </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Facts Section -->

    <!-- ======= Skills Section  Notes ======= -->
    <section id="skills" class="skills section-bg">
        <div class="container">

            <div class="section-title">
                <h2>ملاحظاتي</h2>

                @if(count($notes))
                    <ul>
                        @foreach($notes as $note)
                            <li>{{$note->note}}</li>
                        @endforeach
                    <ul>
                @else
                    <li>لا يوجد ملاحظات بعد </li>
                @endif

            </div>

        </div>
    </section><!-- End Skills Section -->

    <!-- ======= Resume Section ///Homeworks ======= -->
    <section id="resume" class="resume">
        <div class="container">
            <div class="section-title">
                <h2>الواجبات المنزلية</h2>
            </div>
            <div class="row">
                @if(count($homeworks) || count($homeworks_files) )
                    @isset($homeworks)
                        @foreach($homeworks as $homework)
                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="resume-item">
                                    <h5>{{$homework->date}}</h5>
                                    <ul>
                                        <li>{{$homework->info}}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                    @isset($homeworks_files)
                         @foreach($homeworks_files as $homeworks_file)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="50">
                            <div class="resume-item">
                                <h5>{{$homeworks_file->date}}</h5>
                                <ul>
                                    <li>{{$homeworks_file->name}}<span>: &nbsp; لتحميل الملف اضغط <a href="{{route('site.homeworksFile.download',$homeworks_file->id)}}">هنا</a> </span></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    @endisset

                 @else
                    <h5>لا يوجد واجبات منزلية حالياً</h5>
                @endif
            </div>
        </div>
    </section><!-- End Resume Section -->


    <!-- ======= Services Section // Marks ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>موادي</h2>
            </div>

            <div class="row">
                <table class="table table-striped table-hover " >
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th colspan="2"> الفصل الأول</th>
                        <th colspan="2">  الفصل الثاني</th>
                    </tr>
                    <tr>
                        <th scope="col">المادة</th>
                        <th scope="col">الشفهي</th>
                        <th scope="col">الوظايف</th>
                        <th scope="col">الشفهي</th>
                        <th scope="col">الوظايف</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($marks))
                            @foreach($marks as $mark)
                                <tr>
                                    <td><strong>@if(isset($mark->subject->name)){{$mark->subject->name}}@endif</strong></td>
                                    <td>{{$mark->recite1}}</td>
                                    <td>{{$mark->activity1}}</td>
                                    <td>{{$mark->recite2}}</td>
                                    <td>{{$mark->activity2}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

            </div>

        </div>
    </section><!-- End Services Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>تواصل معنا</h2>
                <p>شرعية الفرقان </p>
            </div>

            <div class="row" data-aos="fade-in">

                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>الموقع:</h4>
                            <p>دمشق - المهاجرين </p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>الهاتف:</h4>
                            <p>011 8886662</p>
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13305.78926175887!2d36.279177190291314!3d33.515753828086645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1518e751fceb2001%3A0xc7a7f30221c7f3f5!2z2YXYudmH2K8g2KfZhNmB2LHZgtin2YY!5e0!3m2!1sar!2s!4v1635332899031!5m2!1sar!2s" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <form action="{{route('site.message.store')}}" method="post"  class="php-email-form">
                           @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">اسم المرسل</label>
                                <input type="text" name="sender" class="form-control" id="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">الموضوع</label>
                                <input type="text" class="form-control" name="subject" id="subject" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">الرسالة</label>
                            <textarea class="form-control" name="message" rows="10" required></textarea>
                        </div>
                        <div class="text-center"><button type="submit">إرسال </button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <div class="copyright">
            برمجة <strong><span>احمد الخن  &copy;</span></strong>
        </div>
        <div class="credits">
             <a href="mailto:ahmad.alkhen.sy@gmail.com">ahmad.alkhen.sy@gmail.com</a>
        </div>
    </div>
</footer><!-- End  Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('site/vendor/aos/aos.js')}}"></script>
<script src="{{asset('site/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('site/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('site/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

<script src="{{asset('site/vendor/purecounter/purecounter.js')}}"></script>
<script src="{{asset('site/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('site/vendor/typed.js/typed.min.js')}}"></script>
<script src="{{asset('site/vendor/waypoints/noframework.waypoints.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('site/js/main.js')}}"></script>

@include('sweetalert::alert')

</body>

</html>
