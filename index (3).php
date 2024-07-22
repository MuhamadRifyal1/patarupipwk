<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./index.css">
    <title>Patar UPI PWK</title>
</head>

<body>
    <header class="shadow-sm py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="./index.html" class="">
                <img src="image/logo.jpeg" alt="logo">
                <img src="image/textLogo.jpeg" alt="textLogo" class="d-none d-md-inline">
            </a>
            <div class="flex">
                <a href="https://drive.google.com/file/d/1MAY0vL_YRYxGqddJjfpc_twIqNDATC94/view?usp=drive_link" class="btn btn-success custom-bg2">Panduan</a>
                <a href="#tentang_kami" class="btn btn-success custom-bg2">Tentang Kami</a>
            </div>
        </div>
    </header>

    <section id="content" class="vh-max my-5">
        <div class="container">
            <div class="row d-flex align-items-center rectangle-head custom-bg mx-1">
                <div class="col-3 col-lg-4 d-flex justify-content-around align-items-center">
                    <div class="rectangle-head-content"></div>
                    <div class="rectangle-head-content"></div>
                </div>
                <div class="col-6 col-lg-4 d-flex justify-content-center align-items-center">
                    <span class="fw-bold text-sm">Normal School</span>
                </div>
                <div class="col-3 col-lg-4 d-flex justify-content-around align-items-center">
                    <div class="rectangle-head-content"></div>
                    <div class="rectangle-head-content"></div>
                </div>
            </div>

            <div class="row">
                <div class="col bg-white rectangle-body d-flex flex-column align-items-center">
                    <div class="d-flex justify-content-center align-items-center h-25">
                        <img src="image/arrow.png" alt="arrow1">
                    </div>
                    <div class="d-flex justify-content-around w-100">
                        <div id="rectA1" class="rectangle-body-content d-flex justify-content-center align-items-center">
                            <span class="fw-bold text-white">A1</span>
                        </div>
                        <div id="rectA2" class="rectangle-body-content d-flex justify-content-center align-items-center">
                            <span class="fw-bold text-white">A2</span>
                        </div>
                    </div>
                </div>
                <div class="col rectangle-body custom-bg"></div>
                <div class="col bg-white rectangle-body d-flex flex-column align-items-center">
                    <div class="d-flex justify-content-center align-items-center h-25">
                        <img src="image/arrow.png" alt="arrow1">
                    </div>
                    <div class="d-flex justify-content-around w-100">
                        <div id="rectB1" class="rectangle-body-content d-flex justify-content-center align-items-center">
                            <span class="fw-bold text-white">B1</span>
                        </div>
                        <div id="rectB2" class="rectangle-body-content d-flex justify-content-center align-items-center">
                            <span class="fw-bold text-white">B2</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row rectangle-footer custom-bg2 mx-1">
                <span class="text-white fw-bold d-flex align-items-center justify-content-center fs-6">Taman Teater UPI Kampus Purwakarta</span>
            </div>
            <div class="container py-5" id="panduan">
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <div class="rectangle-footer2 bg-success m-2"></div>
                        <span class="fw-bold">Kosong</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="rectangle-footer2 bg-danger m-2"></div>
                        <span class="fw-bold">Terisi</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="shadow-lg py-5" id="tentang_kami">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-4 d-flex flex-column justify-content-center">
                    <p class="fw-bold text-center">Tentang Kami</p>
                    <a href="/" class="d-flex justify-content-center">
                        <img src="image/logo.jpeg" alt="logo">
                        <img src="image/textLogo.jpeg" alt="textLogo">
                    </a>
                </div>
                <div class="col-md-8">
                    <h5 class="fs-5 fw-bold text-md-start text-center">Selamat Datang di Parkir Pintar UPI Kampus Purwakarta</h5>
                    <p class="fs-6 text-md-start text-center">Parkir pintar merupakan projek Internet of Things yang terintegrasi dengan website Parkir Pintar UPI Purwakarta guna memudahkan user untuk menemukan lahan parkir yang tersedia di depan Normaal School Universitas Pendidikan Indonesia Kampus Purwakarta</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="text-center">Copyright ©2024 patar.upipwk</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        function fetchData() {
            fetch('get_park_area.php')
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error(data.error);
                        return;
                    }
                    updateRectangles(data);
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        function updateRectangles(data) {
            document.getElementById('rectA1').className = 'rectangle-body-content d-flex justify-content-center align-items-center ' + (data[0].status == 1 ? 'bg-danger' : 'bg-success');
            document.getElementById('rectA2').className = 'rectangle-body-content d-flex justify-content-center align-items-center ' + (data[1].status == 1 ? 'bg-danger' : 'bg-success');
            document.getElementById('rectB1').className = 'rectangle-body-content d-flex justify-content-center align-items-center ' + (data[2].status == 1 ? 'bg-danger' : 'bg-success');
            document.getElementById('rectB2').className = 'rectangle-body-content d-flex justify-content-center align-items-center ' + (data[3].status == 1 ? 'bg-danger' : 'bg-success');
        }

        setInterval(fetchData, 5000); // Mengambil data setiap 5 detik
    </script>
</body>

</html>
