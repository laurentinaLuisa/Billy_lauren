<form action="modul/supplier/aksi_supplier.php?act=insert" method="post">
<div class="card mb-3">
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control" name="nama_supplier">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="telp" class="form-label">Telp</label>
                    <input type="text" class="form-control" name="telp">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email">
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
        <h3>Data Supplier</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th>Email</th>
                        <th><i class="bi bi-gear-fill"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>PT. ABC</td>
                        <td>Jl. ABC</td>
                        <td>08123456789</td>
                        <td>oK5Zt@example.com</td>
                        <td>
                            <a href="#editSupplier" class="text-decoration-none" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square text-success"></i>
                            </a>
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>PT. XYZ</td>
                        <td>Jl. XYZ</td>
                        <td>08123456789</td>
                        <td>xyz@example.com</td>
                        <td>
                            <a href="#editSupplier" class="text-decoration-none" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square text-success"></i>
                            </a>
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editSupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="edit_nama_supplier">Nama Supplier</label>
                        <input type="text" class="form-control" id="edit_nama_supplier" name="edit_nama_supplier" value="PT. ABC">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit_alamat">Alamat</label>
                        <input type="text" class="form-control" id="edit_alamat" name="edit_alamat" value="Jl. ABC">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit_telp">Telp</label>
                        <input type="text" class="form-control" id="edit_telp" name="edit_telp" value="08123456789">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit_email">Email</label>
                        <input type="text" class="form-control" id="edit_email" name="edit_email" value="oK5Zt@example.com">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
</form>