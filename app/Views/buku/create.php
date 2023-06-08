<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    <div class="container">


        <div class="row">
            <div class="col-12">
                <h2>Tambah Data Buku</h2>
            </div>

            <?php $validation =  \Config\Services::validation(); ?>

            <div class="col-3">
                <form action="<?= base_url('/tambahdata') ?>" method="post">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text"
                            class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ; ?>"
                            id="judul" name="judul" autofocus>
                        <div id="judul" class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text"
                            class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : '' ; ?>"
                            id="penulis" name="penulis">
                        <div id="judul" class="invalid-feedback">
                            <?= $validation->getError('penulis'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text"
                            class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : '' ; ?>"" id="
                            penerbit" name="penerbit">
                        <div id="judul" class="invalid-feedback">
                            <?= $validation->getError('penerbit'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input type="number"
                            class="form-control <?= ($validation->hasError('tahun_terbit')) ? 'is-invalid' : '' ; ?>"" id="
                            tahun_terbit" name="tahun_terbit">
                        <div id="judul" class="invalid-feedback">
                            <?= $validation->getError('tahun_terbit'); ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">tambah</button>
                </form>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
</body>

</html>