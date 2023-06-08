<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Codeigniter 4 Datatables Example - positronx.io</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="mt-3">
        <table class="table table-bordered" id="users-list">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row): ?>
                        <tr>
                            <td>
                                <?= $row['judul'] ?>
                            </td>
                            <td>
                                <?= $row['penulis'] ?>
                            </td>
                            <td>
                                <?= $row['penerbit'] ?>
                            </td>
                            <td>
                                <?= $row['tahun_terbit'] ?>
                            </td>
                            <td>
                                <a href="<?= base_url('/editdata/'.$row['id']) ?>"
                                    class="btn btn-sm btn-warning">Edit</a>

                                <form action="<?= base_url('/hapus/'.$row['id']) ?>" method="post"
                                    style="display: inline-block" onsubmit="return confirm('Hapus?')">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#users-list').DataTable();
    });
    </script>
</body>

</html>