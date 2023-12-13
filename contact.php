<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hamro Hotel -Contact</title>


    <?php require('include/links.php') ?>
</head>

<body class="bgc">
    <?php require('include/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Contact Us</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Deserunt nisi, aspernatur eaque <br> distinctio delectus maiores
            error doloribus? Voluptatem, nulla sint!
        </p>

    </div>

    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <iframe height="320px" class="w-100 rounded mb-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28258.01822253837!2d84.3948963259048!3d27.709496052975954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994fb6fdfd935ed%3A0x29e6424f203a7aec!2zTFVNQklOSSBJQ1Qg4KSy4KWB4KSu4KWN4KSs4KS_4KSo4KWAIOCkhuCkiOCkuOClgOCkn-ClgCDgpJXgpY3gpK_gpL7gpK7gpY3gpKrgpLg!5e0!3m2!1sen!2snp!4v1681529758774!5m2!1sen!2snp"></iframe>
                    <h5>Address</h5>
                    <a href="https://goo.gl/maps/cpdgi2JSUnuBNScX7" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i>
                        kaligandaki Chow,Gaindakot
                    </a>
                    <h5 class="mb-2 mt-3">Call Us:</h5>
                    <i class="bi bi-telephone-outbound-fill"></i>
                    <a href="tel: +977-9742488633" class="text-decoration-none p-2 rounded mb-3">9742488633</a><br>
                    <i class="bi bi-telephone-outbound-fill"></i>
                    <a href="tel: +977-9863188364" class="text-decoration-none p-2 rounded">9836188364</a>
                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: pratikpj122@gmail.com" class="text-decoration-none p-2 rounded text-info">
                        <i class="bi bi-envelope-at"></i> pratikpj122@gmail.com
                    </a>

                    <h5 class="mb-2 mt-4 fs-5">Follow Us:</h5>
                    <a href="https://www.instagram.com/prateek_pz/" target="_blank" class="d-inline-block text-decoration-none text-dark ">
                        <i class="bi bi-instagram me-3 fs-5"></i>
                    </a>
                    <a href="https://www.facebook.com/prp.059" target="_blank" class="d-inline-block text-decoration-none text-darkms-3">
                        <i class="bi bi-facebook fs-5"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form action="">
                        <h5>Send a message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500">Name:</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500">Email:</label>
                            <input type="email" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500">Subject:</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500">Message:</label>
                            <textarea class="form-control shadow-none" rows="5" style="resize:none"></textarea>
                        </div>

                        <button type="submit" class="btn btn-dark shadow-none mt-3">Submit</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php require('include/footer.php'); ?>
</body>

</html>