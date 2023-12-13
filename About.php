<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hamro Hotel -About</title>


    <style>
        .box:hover {
            border-top-color: darkcyan !important;
        }
    </style>



    <!-- imported links and libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <?php require('include/links.php') ?>
</head>

<body class="bgc">
    <?php require('include/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">About Us</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Deserunt nisi, aspernatur eaque <br> distinctio delectus maiores
            error doloribus? Voluptatem, nulla sint!
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit. Eligendi officiis quae recusandae aliquam,
                    dolor animi saepe.
                </p>
            </div>

            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="admin/images/aboutus/vv.jpeg.jpg" width="420px" alt="">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4 ">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="admin/images/aboutus/hotel.svg" width="70px" alt="">
                    <h4 class="mt-3">100+ rooms</h4>
                </div>

            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4 ">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="admin/images/aboutus/customers.png" width="70px" alt="">
                    <h4 class="mt-3">2000+ customers</h4>
                </div>

            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4 ">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="admin/images/aboutus/review.svg" width="70px" alt="">
                    <h4 class="mt-3">1000+ Reviews</h4>
                </div>

            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4 ">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="admin/images/aboutus/staffs.png" width="70px" alt="">
                    <h4 class="mt-3">100+ Staffs</h4>
                </div>

            </div>

        </div>
    </div>


    <h3 class="my-5 fw-bold h-font text-center">Management Team</h3>

    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white text-center overflow-hidden rounded-3">
                    <img src="admin/images/aboutus/team1.jfif" class="w-100">
                    <h5 class="mt-2">Leo</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded-3">
                    <img src="admin/images/aboutus/team1.jfif" class="w-100">
                    <h5 class="mt-2">Leo</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded-3">
                    <img src="admin/images/aboutus/team1.jfif" class="w-100">
                    <h5 class="mt-2">Leo</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded-3">
                    <img src="admin/images/aboutus/team1.jfif" class="w-100">
                    <h5 class="mt-2">Leo</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded-3">
                    <img src="admin/images/aboutus/team1.jfif" class="w-100">
                    <h5 class="mt-2">Leo</h5>
                </div>
                <div class="swiper-slide bg-white text-center overflow-hidden rounded-3">
                    <img src="admin/images/aboutus/team1.jfif" class="w-100">
                    <h5 class="mt-2">Leo</h5>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 40,
            pagination: {
                el: ".swiper-pagination",
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
        });
    </script>






    <?php require('include/footer.php'); ?>
</body>

</html>