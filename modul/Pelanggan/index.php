<div class="card mb-3">
    <div class="card-body">
        <form action="modul/pelanggan/aksi_pelanggan.php?act=insert" method="post">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
                </div>
                <div class="col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="2" required></textarea>
                </div>
                <div class="col-md-6">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="tel" class="form-control" id="telepon" name="telepon" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="mail" name="mail" required>
                </div>
            </div>
            <hr class="text-secondary">
            <div class="text-end">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Data Pelanggan</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th><i class="bi bi-gear-fill"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM pelanggan";
                    $result = mysqli_query($koneksi, $query);
                    $no = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['nama_pelanggan'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= $row['telepon'] ?></td>
                            <td><?= $row['mail'] ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editPelanggan<?= $row['pelanggan_id'] ?>">
                                    Edit
                                </a>
                                <a href="modul/pelanggan/aksi_pelanggan.php?act=delete&id=<?= $row['pelanggan_id'] ?>" class="btn btn-sm btn-danger">
                                    Delete
                                </a>
                            </td>
                        </tr>

                        <!-- Modal for Editing Customer -->
                        <div class="modal fade" id="editPelanggan<?= $row['pelanggan_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="modul/pelanggan/aksi_pelanggan.php?act=update" method="post">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Pelanggan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $row['pelanggan_id'] ?>">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?= $row['nama_pelanggan'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $row['alamat'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="telepon" class="form-label">Telepon</label>
                                                    <input type="tel" class="form-control" id="telepon" name="telepon" value="<?= $row['telepon'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="mail" name="mail" value="<?= $row['mail'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>