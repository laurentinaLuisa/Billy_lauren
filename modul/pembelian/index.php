<div class="card mb-3">
    <div class="card-body">
        <form action="modul/pembelian/aksi_pembelian.php?act=insert" method="post">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="invoice" class="form-label">Invoice</label>
                    <input type="text" class="form-control" name="invoice_pembelian" required>
                </div>
                <div class="col-md-4">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal_pembelian" required>
                </div>
                <div class="col-md-4">
                    <label for="supplier" class="form-label">Supplier</label>
                    <select name="supplier_id" class="form-select" required>
                        <?php
                        $query = "SELECT supplier_id, nama_supplier FROM supplier";
                        $result = mysqli_query($koneksi, $query);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['supplier_id']}'>{$row['nama_supplier']}</option>";
                            }
                            mysqli_free_result($result);
                        } else {
                            echo "<option disabled selected>No suppliers available</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah_pembelian" required>
                </div>
                <div class="col-md-4">
                    <label for="harga" class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="harga_pembelian" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="total" class="form-label">Total</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control" id="total_pembelian" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control"></textarea>
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
        <h3>Data Pembelian</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Supplier</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Keterangan</th>
                        <th><i class="bi bi-gear-fill"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT a.pembelian_id, a.invoice_pembelian, a.tanggal_pembelian, b.nama_supplier, a.jumlah_pembelian, a.harga_pembelian, a.total_pembelian, a.keterangan 
                              FROM pembelian a 
                              INNER JOIN supplier b ON a.supplier_id = b.supplier_id";
                    $exec = mysqli_query($koneksi, $query);
                    $no = 0;
                    while ($row = mysqli_fetch_assoc($exec)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['invoice_pembelian'] ?></td>
                            <td><?= $row['tanggal_pembelian'] ?></td>
                            <td><?= $row['nama_supplier'] ?></td>
                            <td><?= $row['jumlah_pembelian'] ?></td>
                            <td>Rp. <?= number_format($row['harga_pembelian'], 0, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($row['total_pembelian'], 0, ',', '.'); ?></td>
                            <td><?= $row['keterangan'] ?></td>
                            <td>
                                <a href="#editPembelian<?= $row['pembelian_id'] ?>" class="text-decoration-none" data-bs-toggle="modal">
                                    <i class="bi bi-pencil-square text-success"></i>
                                </a>
                                <a href="modul/pembelian/aksi_pembelian.php?act=delete&id=<?= $row['pembelian_id']; ?>" class="text-decoration-none">
                                    <i class="bi bi-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Modal for Edit -->
                        <div class="modal fade" id="editPembelian<?= $row['pembelian_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="modul/pembelian/aksi_pembelian.php?act=update&id=<?= $row['pembelian_id']; ?>" method="post">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pembelian</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="invoice" class="form-label">Invoice</label>
                                                    <input type="text" class="form-control" name="invoice_pembelian" value="<?= $row['invoice_pembelian'] ?>" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="tanggal" class="form-label">Tanggal</label>
                                                    <input type="date" class="form-control" name="tanggal_pembelian" value="<?= $row['tanggal_pembelian'] ?>" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="supplier" class="form-label">Supplier</label>
                                                    <select name="supplier_id" class="form-select" required>
                                                        <?php
                                                        $supplierQuery = "SELECT supplier_id, nama_supplier FROM supplier";
                                                        $supplierResult = mysqli_query($koneksi, $supplierQuery);
                                                        if ($supplierResult) {
                                                            while ($supplierRow = mysqli_fetch_assoc($supplierResult)) {
                                                                $selected = $supplierRow['supplier_id'] == $row['supplier_id'] ? 'selected' : '';
                                                                echo "<option value='{$supplierRow['supplier_id']}' $selected>{$supplierRow['nama_supplier']}</option>";
                                                            }
                                                            mysqli_free_result($supplierResult);
                                                        } else {
                                                            echo "<option disabled selected>No suppliers available</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="jumlah" class="form-label">Jumlah</label>
                                                    <input type="number" class="form-control" name="jumlah_pembelian" value="<?= $row['jumlah_pembelian'] ?>" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp.</span>
                                                        <input type="number" class="form-control" name="harga_pembelian" value="<?= $row['harga_pembelian'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="total" class="form-label">Total</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp.</span>
                                                        <input type="text" class="form-control" name="total_pembelian" value="<?= number_format($row['total_pembelian'], 0, ',', '.') ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="keterangan" class="form-label">Keterangan</label>
                                                    <textarea name="keterangan" class="form-control"><?= $row['keterangan'] ?></textarea>
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
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const jumlahElement = document.querySelector('input[name="jumlah_pembelian"]');
    const hargaElement = document.querySelector('input[name="harga_pembelian"]');
    const totalElement = document.getElementById('total_pembelian');

    jumlahElement.addEventListener('input', updateTotal);
    hargaElement.addEventListener('input', updateTotal);

    function updateTotal() {
        const jumlahPembelian = parseFloat(jumlahElement.value) || 0;
        const hargaPembelian = parseFloat(hargaElement.value) || 0;
        const total = jumlahPembelian * hargaPembelian;
        totalElement.value = formatRupiah(total);
    }

    function formatRupiah(angka) {
        var number_string = angka.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        return number_string;
    }
</script>