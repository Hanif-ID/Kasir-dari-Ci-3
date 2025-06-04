 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('Beranda') ?>">Beranda</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('Pelanggan') ?>">Data Pelanggan</a></li>
              <li class="breadcrumb-item"><?= $title ?></li>
            </ol>
          </div>

          <div class="row">
  <div class="col-lg-12 mb-4">
    <!-- Simple Tables -->
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
      </div>

      <form action="" method="post">
        <div class="card-body">
          <div class="mb-3">
            <label for="NamaPelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" name="NamaPelanggan" id="NamaPelanggan" class="form-control" value="<?= $pelanggan->NamaPelanggan ?>">
          </div>
          <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <input type="text" name="Alamat" id="Alamat" class="form-control" value="<?= $pelanggan->Alamat ?>">
          </div>
          <div class="mb-3">
            <label for="NomorTelepon" class="form-label">Nomor Telepon</label>
            <input type="text" name="NomorTelepon" id="NomorTelepon" class="form-control" value="<?= $pelanggan->NomorTelepon ?>">
          </div>
        </div>

        <div class="modal-footer">
          <a href="<?= base_url('pelanggan') ?>" class="btn btn-outline-primary">Batal</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>

      <div class="card-footer"></div>
    </div>
  </div>
</div>
          <!--Row-->
          </div>
        </div>
        <!---Container Fluid-->