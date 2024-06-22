<form action="modul/pengguna/aksi_pengguna.php?act=insert" method="post">
<div class="card mb-3">
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" name="password">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="level" class="form-label">Level</label>
                    <input type="text" class="form-control" name="level">
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
        <h3>Data Pengguna</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Email</th>
                        <th><i class="bi bi-gear-fill"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>admin</td>
                        <td>admin</td>
                        <td>admin@gmail.com</td>
                        <td>
                            <a href="#editPengguna" class="text-decoration-none" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square text-success"></i>
                            </a>
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>user</td>
                        <td>user</td>
                        <td>user@gmail.com</td>
                        <td>
                            <a href="#editPengguna" class="text-decoration-none" data-bs-toggle="modal">
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
<div class="modal fade" id="editPengguna" tabindex="-1" aria-labelledby="editPenggunaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPenggunaLabel">Edit Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="edit_username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="edit_username" name="edit_username" value="admin">
                </div>
                <div class="mb-3">
                    <label for="edit_password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="edit_password" name="edit_password">
                    <span class="form-text text-muted">Kosongkan jika tidak ingin mengganti password</span>
                </div>
                <div class="mb-3">
                    <label for="edit_level" class="form-label">Level</label>
                    <select class="form-select" id="edit_level" name="edit_level">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="edit_email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="edit_email" name="edit_email" value="admin@gmail.com">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
</form>