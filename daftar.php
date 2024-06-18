<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/logo3.png">
    <title>BPJS KETENAGAKERJAAN</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<style>
    body {
            background-image: url('assets/img/logo9.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Menggunakan tinggi 100% dari viewport */
            margin: 0; /* Menghilangkan margin default body */
        }
</style>

<body class="">
    <div class="container">
        <div class="card-body p-0">
            <center>
                <div class="col-lg-7" style="background-color: white;">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Daftar akun !</h1>
                        </div>
                        <form class="user" action="proses_daftar.php" method="POST">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="nama" id="exampleFirstName" placeholder="Nama Lengkap">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" name="no_hp" id="exampleLastName" placeholder="No.Handphone">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" placeholder="Email ">
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Kirim">
                            <a href="index.php" class="btn btn-danger btn-user btn-block">
                                Batal
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="masuk.php">Kamu Sudah memiliki akun ? Login !</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>