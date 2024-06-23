<div class="card mb-3">
    <div class="card-body">
        <form action="modul/barang/aksi_barang.php?act=insert" method="post">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="nama_barang" class="form-label"> Nama barang</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="harga_beli" class="form-label">Harga beli</label>
                    <input type="number" class="form-control" name="harga_beli" id="harga_beli">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="harga_jual" class="form-label">Harga jual</label>
                    <input type="number" class="form-control" name="harga_jual" id="harga_jual">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok" id="stok">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col text-end">
                    <button class="btn btn-secondary" type="reset">Reset</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Data Barang</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Barang</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM barang";
                    $result = mysqli_query($koneksi, $query);
                    $no = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['nama_barang'] ?></td>
                            <td><?= 'Rp ' . number_format($row['harga_beli'], 0, ',', '.') ?></td>
                            <td><?= 'Rp ' . number_format($row['harga_jual'], 0, ',', '.') ?></td>
                            <td><?= $row['stok'] ?></td>
                            <td>
                                <!-- Edit Button with Modal Trigger -->
                                <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editBarang<?= $row['barang_id'] ?>">
                                    Edit
                                </a>
                                <!-- Delete Button -->
                                <a href="modul/barang/aksi_barang.php?act=delete&id=<?= $row['barang_id'] ?>" class="btn btn-sm btn-danger">
                                    Delete
                                </a>
                            </td>
                        </tr>

                        <!-- Modal for Editing Barang -->
                        <div class="modal fade" id="editBarang<?= $row['barang_id'] ?>" tabindex="-1" aria-labelledby="editBarangLabel<?= $row['barang_id'] ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="modul/barang/aksi_barang.php?act=update" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editBarangLabel<?= $row['barang_id'] ?>">Edit Barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $row['barang_id'] ?>">
                                            <div class="mb-3">
                                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $row['nama_barang'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="harga_beli" class="form-label">Harga Beli</label>
                                                <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="<?= $row['harga_beli'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="harga_jual" class="form-label">Harga Jual</label>
                                                <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="<?= $row['harga_jual'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="stok" class="form-label">Stok</label>
                                                <input type="number" class="form-control" id="stok" name="stok" value="<?= $row['stok'] ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>