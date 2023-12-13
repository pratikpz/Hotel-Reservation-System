<?php require('include/header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hamro Hotel -HOME</title>

    <!-- imported links and libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <?php require('include/links.php') ?>

    <!-- Internal CSS -->

    <style>
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width:575px) {
            .availability-form {
                margin-top: 25px;
                z-index: 2;
                position: relative;
                padding: 0 35px;
            }

        }

        body,
        .navbar {
            background-color: #FFFFFd;
        }
    </style>

</head>



<body class="bgc">




    <!-- carousel -->
    <div class="container-fluid my-3">


        <div class="swiper swiper-controller">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="admin/images/gallery/1.jpg" class="img-fluid  d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="admin/images/gallery/2.jpg" class="img-fluid  d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="admin/images/gallery/3.jpg" class="img-fluid  d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="admin/images/gallery/4.jpg" class="img-fluid  d-block" />
                </div>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>
    </div>

    <!-- Availability form -->

    <div class="container availability-form">
        <div class="row align-items-end">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h4 class="mb-4">Check Booking Availability</h4>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight:500">Check-In</label>
                            <input type="date" class="form-control shadow-sm">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight:500">Check-Out</label>
                            <input type="date" class="form-control shadow-sm">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight:500">Adult</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>

                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight:500">Children</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>

                        </div>
                        <div class="col-lg-1 mb-lg-3 mb-1 mt-4">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Room Info -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS </h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="width: 350px; margin: auto;">
                    <img src="admin/images\rooms\1.jpg" class="card-img-top">

                    <div class="card-body">
                        <h5>Normal Room</h5>
                        <h6 class="mb-3">Rs. 2000 per night</h6>

                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge bg-light text-dark text-wrap">
                                2 Rooms
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                1 Bathroom
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                1 Balcony
                            </span>
                        </div>

                        <div class="facilities mb-4">
                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge bg-info text-dark text-wrap">
                                Wi-Fi
                            </span>
                            <span class="badge bg-info text-dark text-wrap">
                                Air Conditioner
                            </span>
                            <span class="badge bg-info text-dark text-wrap">
                                Television
                            </span>
                        </div>

                        <div class="guests mb-4">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge bg-info text-dark text-wrap">
                                5 Adults
                            </span>
                            <span class="badge bg-info text-dark text-wrap">
                                4 Children
                            </span>
                        </div>

                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                        </div>


                        <!-- <div id="loginMessage" class="d-none">Please login first to book.</div>
                        <script>
                            function showLoginMessage() {
                                var messageContainer = document.getElementById("loginMessage");
                                alert(messageContainer.innerText);
                            }
                        </script> -->
                    </div>
                </div>
            </div>



            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="width:350px; margin:auto;">
                    <img src="admin/images\rooms\2.jpg" class="card-img-top">

                    <div class="card-body">
                        <h5>Normal Room</h5>
                        <h6 class="mb-3">Rs. 2000 per night</h6>

                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge bg-light text-dark text-wrap">
                                2 Rooms
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                1 Bathroom
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                1 Balcony
                            </span>
                        </div>

                        <div class="facilities mb-4">

                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge bg-info text-dark text-wrap">
                                Wi-Fi
                            </span>
                            <span class="badge bg-info text-dark text-wrap">
                                Air Conditioner
                            </span>
                            <span class="badge bg-info text-dark text-wrap">
                                Television
                            </span>
                            <div class="guests mb-4">

                                <h6 class="mb-1">Guests</h6>
                                <span class="badge bg-info text-dark text-wrap">
                                    5 Adults
                                </span>
                                <span class="badge bg-info text-dark text-wrap">
                                    4 Children
                                </span>
                            </div>

                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                        </div>

                        <!-- <div id="loginMessage" class="d-none">Please login first to book.</div>
                        <script>
                            function showLoginMessage() {
                                var messageContainer = document.getElementById("loginMessage");
                                alert(messageContainer.innerText);
                            }
                        </script> -->

                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="width:350px; margin:auto;">
                    <img src="admin/images\rooms\3.jpg" class="card-img-top">

                    <div class="card-body">
                        <h5>Normal Room</h5>
                        <h6 class="mb-3">Rs. 2000 per night</h6>

                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge bg-light text-dark text-wrap">
                                2 Rooms
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                1 Bathroom
                            </span>
                            <span class="badge bg-light text-dark text-wrap">
                                1 Balcony
                            </span>
                        </div>

                        <div class="facilities mb-4">
                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge bg-info text-dark text-wrap">
                                Wi-Fi
                            </span>
                            <span class="badge bg-info text-dark text-wrap">
                                Air Conditioner
                            </span>
                            <span class="badge bg-info text-dark text-wrap">
                                Television
                            </span>
                        </div>
                        <div>
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge bg-info text-dark text-wrap">
                                5 Adults
                            </span>
                            <span class="badge bg-info text-dark text-wrap">
                                4 Children
                            </span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                        </div>


                        <!-- <div id="loginMessage" class="d-none">Please login first to book.</div>

                        <script>
                            function showLoginMessage() {
                                var messageContainer = document.getElementById("loginMessage");
                                if (!messageContainer.classList.contains("d-none")) {
                                    alert(messageContainer.innerText);
                                }
                            }
                        </script> -->


                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-center mt-5">
                <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 shadow-none">More Rooms >>></a>
            </div>

        </div>
    </div>

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR Facilities </h2>

    <div class="container mb-5">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="admin/images\features\1.svg.svg" width="80px">
                <h5 class="mt-3">WiFi</h5>
            </div>

            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="admin/images\features\2.svg" width="80px">
                <h5 class="mt-3">Air Conditioner</h5>
            </div>

            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="admin/images\features\3.svg" width="80px">
                <h5 class="mt-3">Free Breakfast</h5>
            </div>

            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="admin/images\features\4.svg" width="80px">
                <h5 class="mt-3">Cozy Beds</h5>
            </div>

            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="admin/images\features\5.svg" width="80px">
                <h5 class="mt-3">Room Service</h5>
            </div>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="facilities.php" class="btn btn-sm btn-outline-dark shadow-none">More Facilities>>></a>
        </div>
    </div>
    <!-- reviews -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Reviews & Ratings </h2>

    <div class="conatiner mt-5 hamro-bg mb-5">
        <div class="swiper swipertest h-25 ">
            <div class="swiper-wrapper mb-4 ">
                <div class="swiper-slide bg-white p-4 mb-4">
                    <div class="profile d-flex align-items-center p-1 mb-2">
                        <img src="admin/images\features\user.jfif" width="30px">
                        <h6 class="ms-3">Basanta Kandel kunwar</h6>
                    </div>
                    <p>Sarai ramro hotel system banayexas pratik.badhai xa tallai</p>
                    <div class="rating my-1 mb-0">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4 mb-4">
                    <div class="profile d-flex align-items-center p-1 mb-2">
                        <img src="admin/images\features\user.jfif" width="30px">
                        <h6 class="ms-3">Basanta Kandel kunwar</h6>
                    </div>
                    <p>Sarai ramro hotel system banayexas pratik.badhai xa tallai</p>
                    <div class="rating my-1 mb-0">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4 mb-4">
                    <div class="profile d-flex align-items-center p-1 mb-2">
                        <img src="admin/images\features\user.jfif" width="30px">
                        <h6 class="ms-3">Basanta Kandel kunwar</h6>
                    </div>
                    <p>Sarai ramro hotel system banayexas pratik.badhai xa tallai</p>
                    <div class="rating my-1 mb-0">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination p-0"></div>
        </div>
    </div>

    <div class="col-lg-12 text-center mt-5">
        <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Know More>>></a>
    </div>

    <!-- Map -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Reach Us</h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white">
                <iframe height="320px" class="w-100 rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28258.01822253837!2d84.3948963259048!3d27.709496052975954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994fb6fdfd935ed%3A0x29e6424f203a7aec!2zTFVNQklOSSBJQ1Qg4KSy4KWB4KSu4KWN4KSs4KS_4KSo4KWAIOCkhuCkiOCkuOClgOCkn-ClgCDgpJXgpY3gpK_gpL7gpK7gpY3gpKrgpLg!5e0!3m2!1sen!2snp!4v1681529758774!5m2!1sen!2snp"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5 class="mb-2">Call Us:</h5>
                    <i class="bi bi-telephone-outbound-fill"></i>
                    <a href="tel: +977-9742488633" class="text-decoration-none p-2 rounded mb-3">9742488633</a><br>
                    <i class="bi bi-telephone-outbound-fill"></i>
                    <a href="tel: +977-9863188364" class="text-decoration-none p-2 rounded">9836188364</a>
                </div>

                <div class="bg-white p-4 rounded mb-4 mt-5">
                    <h5 class="mb-2">Connect with us:</h5>
                    <a href="https://www.instagram.com/prateek_pz/" target="_blank" class="d-inline-block text-decoration-none mb-3">
                        <span class="badge bg-light text-dark fs-6">
                            <i class="bi bi-instagram me-1"></i>Instagram
                        </span>
                    </a><br>

                    <a href="https://www.facebook.com/prp.059" target="_blank" class="d-inline-block text-decoration-none mb-3">
                        <span class="badge bg-light text-dark fs-6">
                            <i class="bi bi-facebook me-1"></i>Facebook
                        </span>
                    </a><br>
                </div>
            </div>
        </div>
    </div>

    <?php require('include/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper-controller", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 2550,
                disableOnInteraction: false,

            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

        });


        var swiper = new Swiper(".swipertest", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: 2,
            loop: false,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
                type: "bullets",
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
            initialSlide: 0,
        });
    </script>
</body>

</html>