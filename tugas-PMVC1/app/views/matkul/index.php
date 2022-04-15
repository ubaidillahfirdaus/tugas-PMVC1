<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahDataMatkul" data-toggle="modal" data-target="#formModal">
                Tambah Data Mata Kuliah
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-10">
            <form action="<?= BASEURL; ?>/matkul/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="cari mata kuliah.." name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <h3>Daftar Mata Kuliah</h3>
            <ul class="list-group">
                <?php foreach ($data['mk'] as $mk) : ?>
                    <li class="list-group-item">
                        <?= $mk['namaMatkul'] . " (" . $mk['idMatkul'] . ")"; ?>
                        <a href="<?= BASEURL; ?>/matkul/hapus/<?= $mk['idMatkul']; ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
                        <a href="<?= BASEURL; ?>/matkul/ubah/<?= $mk['idMatkul']; ?>" class="badge badge-success float-right tampilModalUbahMatkul" data-toggle="modal" data-target="#formModal" data-id="<?= $mk['idMatkul']; ?>">ubah</a>
                        <a href="<?= BASEURL; ?>/matkul/detail/<?= $mk['idMatkul']; ?>" class="badge badge-primary float-right">detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Mata Kuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/matkul/tambah" method="post">
                    <input type="hidden" name="idH" id="idH">
                    <div class="form-group">
                        <label for="id">ID Mata Kuliah</label>
                        <input type="text" class="form-control" id="id" name="id" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="sks">sks</label>
                        <input type="number" class="form-control" id="sks" name="sks" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>