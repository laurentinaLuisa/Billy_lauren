<div class="card mb-3">
    <div class="card-body">
        <form action="" method="post">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label" for="nama_akun">Nama akun</label>
                    <input type="text" class="form-control" name="nama_akun">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="jenis_akun">Jenis akun</label>
                    <input type="text" class="form-control" name="jenis_akun">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="type_saldo">Type saldo</label>
                    <select class="form-select" name="type_saldo">
                        <option value="debit">Debit</option>
                        <option value="kredit">Kredit</option>
                    </select>
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
        <h3>Data Akun</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Akun</th>
                        <th>Jenis Akun</th>
                        <th>Type Saldo</th>
                        <th><i class="bi bi-gear-fill"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kas</td>
                        <td>Aset</td>
                        <td>Debit</td>
                        <td>
                            <a href="#editAkun" class="text-decoration-none" data-bs-toggle="modal">
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