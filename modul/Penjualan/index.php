<div class="card mb-3">
    <div class="card-body">
        <form action="modul/penjualan/aksi_penjualan.php?act=insert" method="POST" id="salesForm">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="invoice" class="form-label">Invoice</label>
                    <input type="text" class="form-control" name="invoice_penjualan" required>
                </div>
                <div class="col-md-4">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal_penjualan" required>
                </div>
                <div class="col-md-4">
                    <label for="barang" class="form-label">Barang</label>
                    <select name="id_barang" class="form-select" required>
                        <?php
                        $barangQuery = "SELECT barang_id, nama_barang FROM barang";
                        $barangResult = mysqli_query($koneksi, $barangQuery);
                        if ($barangResult) {
                            while ($barangRow = mysqli_fetch_assoc($barangResult)) {
                                echo "<option value='{$barangRow['barang_id']}'>{$barangRow['nama_barang']}</option>";
                            }
                            mysqli_free_result($barangResult);
                        } else {
                            echo "<option disabled selected>No barang available</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="pelanggan" class="form-label">Pelanggan</label>
                    <select name="pelanggan_id" class="form-select" required>
                        <?php
                        $pelangganQuery = "SELECT pelanggan_id, nama_pelanggan FROM pelanggan";
                        $pelangganResult = mysqli_query($koneksi, $pelangganQuery);
                        if ($pelangganResult) {
                            while ($pelangganRow = mysqli_fetch_assoc($pelangganResult)) {
                                echo "<option value='{$pelangganRow['pelanggan_id']}'>{$pelangganRow['nama_pelanggan']}</option>";
                            }
                            mysqli_free_result($pelangganResult);
                        } else {
                            echo "<option disabled selected>No pelanggans available</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah_penjualan" id="jumlah_penjualan" required>
                </div>
                <div class="col-md-3">
                    <label for="harga" class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" name="harga_penjualan" id="harga_penjualan" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="total" class="form-label">Total</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" id="total_penjualan" disabled>
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
        <h3>Data Penjualan</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Pelanggan</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Keterangan</th>
                        <th><i class="bi bi-gear-fill"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT a.penjualan_id, a.invoice_penjualan, a.tanggal_penjualan, b.nama_barang, p.nama_pelanggan, a.harga_penjualan, a.jumlah_penjualan, a.total_penjualan, a.keterangan 
                              FROM penjualan a 
                              INNER JOIN barang b ON a.id_barang = b.barang_id
                              INNER JOIN pelanggan p ON a.pelanggan_id = p.pelanggan_id";
                    $exec = mysqli_query($koneksi, $query);
                    $no = 0;
                    while ($row = mysqli_fetch_assoc($exec)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['invoice_penjualan'] ?></td>
                            <td><?= $row['tanggal_penjualan'] ?></td>
                            <td><?= $row['nama_barang'] ?></td>
                            <td><?= $row['nama_pelanggan'] ?></td>
                            <td><?= $row['jumlah_penjualan'] ?></td>
                            <td>Rp. <?= number_format($row['harga_penjualan'], 0, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($row['total_penjualan'], 0, ',', '.'); ?></td>
                            <td><?= $row['keterangan'] ?></td>
                            <td>
                                <a href="#editPenjualan<?= $row['penjualan_id'] ?>" class="text-decoration-none" data-bs-toggle="modal">
                                    <i class="bi bi-pencil-square text-success"></i>
                                </a>
                                <a href="modul/penjualan/aksi_penjualan.php?act=delete&id=<?= $row['penjualan_id']; ?>" class="text-decoration-none" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="bi bi-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editPenjualan<?= $row['penjualan_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="modul/penjualan/aksi_penjualan.php?act=update&id=<?= $row['penjualan_id']; ?>" method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Penjualan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="invoice" class="form-label">Invoice</label>
                            <input type="text" class="form-control" name="invoice_penjualan" value="" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal_penjualan" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="barang" class="form-label">Barang</label>
                            <select name="id_barang" class="form-select">
                                <?php
                                $barangQuery = "SELECT barang_id, nama_barang FROM barang";
                                $barangResult = mysqli_query($koneksi, $barangQuery);
                                if ($barangResult) {
                                    while ($barangRow = mysqli_fetch_assoc($barangResult)) {
                                        echo "<option value='{$barangRow['barang_id']}'>{$barangRow['nama_barang']}</option>";
                                    }
                                    mysqli_free_result($barangResult);
                                } else {
                                    echo "<option disabled selected>No barang available</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="pelanggan" class="form-label">Pelanggan</label>
                            <select name="pelanggan_id" class="form-select">
                                <?php
                                $pelangganQuery = "SELECT pelanggan_id, nama_pelanggan FROM pelanggan";
                                $pelangganResult = mysqli_query($koneksi, $pelangganQuery);
                                if ($pelangganResult) {
                                    while ($pelangganRow = mysqli_fetch_assoc($pelangganResult)) {
                                        echo "<option value='{$pelangganRow['pelanggan_id']}'>{$pelangganRow['nama_pelanggan']}</option>";
                                    }
                                    mysqli_free_result($pelangganResult);
                                } else {
                                    echo "<option disabled selected>No pelanggans available</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah_penjualan" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="harga" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" class="form-control" name="harga_penjualan" value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="total" class="form-label">Total</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" class="form-control" name="total_penjualan" value="" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control"></textarea>
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

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const jumlah = document.getElementById('jumlah_penjualan');
        const harga = document.getElementById('harga_penjualan');
        const total = document.getElementById('total_penjualan');

        function calculateTotal() {
            const jumlahValue = parseFloat(jumlah.value) || 0;
            const hargaValue = parseFloat(harga.value) || 0;
            total.value = jumlahValue * hargaValue;
        }

        jumlah.addEventListener('input', calculateTotal);
        harga.addEventListener('input', calculateTotal);
    });
</script>