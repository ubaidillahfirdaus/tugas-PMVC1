<div class="container mt-5">

  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>


  <div class="row">
    <div class="col-lg-12">
      <h3>Daftar Matakuliah Diikuti Mahasiswa (Input Manual)</h3>
      <ul class="list-group">
        <li class="list-group-item">
          <?= "Nama" ?>
          <?= "Jurusan"; ?>
          <?= "Mata Kuliah"; ?>
          <?= "SKS"; ?>
        </li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <!-- <h3>Daftar Mahasiswa</h3> -->
      <ul class="list-group">
        <?php foreach ($data['all'] as $all) : ?>
          <li class="list-group-item">
            <?= $all['nama']; ?>
            <?= $all['jurusan']; ?>
            <?= $all['namaMatkul']; ?>
            <?= $all['sks'] . 'sks'; ?>

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
        <h5 class="modal-title" id="formModalLabel">Tambah Mata Kuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?= BASEURL; ?>/mahasiswa/tambahMatkul/<?= $data['mhs']['id'] ?>" method="post">
          <input type="hidden" name="id" id="id" value="<?= $data['mhs']['id']; ?>">

          <div class="form-group">
            <label for="matkul">Mata kuliah</label>
            <select class="form-control" id="matkul" name="matkul">
              <?php foreach ($data['mk'] as $mk) : ?>
                <option value="<?= $mk['idMatkul']; ?>"><?= $mk['namaMatkul']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Mata Kuliah</button>
        </form>
      </div>
    </div>
  </div>
</div>