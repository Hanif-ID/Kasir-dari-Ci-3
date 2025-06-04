 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('Beranda') ?>">Beranda</a></li>
              <li class="breadcrumb-item"><?= $title ?></li>
            </ol>
          </div>

          <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?= $this->session->flashdata('success'); ?>
          </div>
          <?php endif; ?>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
                  
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    id="#myBtn">
                    Tambahkan data pelanggan
                  </button>
                </div>

                     <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Silahkan Input Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="" method="post">
                        <div class="mb-3">
                          <label for="" class="form-label">Nama Pelanggan</label>
                          <input type="text" name="NamaPelanggan" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Alamat</label>
                          <input type="text" name="Alamat" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Nomor Telepon</label>
                          <input type="text" name="NomorTelepon" class="form-control">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $w=1 ?>
                      <?php foreach ($pelanggan as $pg): ?>
                      <tr>
                        <td><a href="#"><?= $w ?></a></td>
                        <td><?= $pg->NamaPelanggan ?></td>
                        <td><?= $pg->Alamat ?></td>
                        <td><?= $pg->NomorTelepon ?></td>
                        <td>
                          <a href="<?= base_url('Pelanggan/edit/' . $pg->PelangganID) ?>" class="btn btn-sm btn-primary">Edit</a>
                          <a href="<?= base_url('Pelanggan/delete/' . $pg->PelangganID) ?>" class="btn btn-sm btn-danger">Hapus</a>
                      </td>
                      </tr>
                      <?php $w++ ?>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->
          </div>
        </div>
        <!---Container Fluid-->