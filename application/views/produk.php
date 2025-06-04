 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Beranda</a></li>
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
                    Tambahkan data produk
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
                          <label for="" class="form-label">Nama Produk</label>
                          <input type="text" name="NamaProduk" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Harga</label>
                          <input type="number" name="Harga" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Stok</label>
                          <input type="number" name="Stok" class="form-control">
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
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $w=1 ?>
                      <?php foreach ($produk as $pd): ?>
                      <tr>
                        <td><a href="#"><?= $w ?></a></td>
                        <td><?= $pd->NamaProduk ?></td>
                        <td>Rp.<?= number_format($pd->Harga, 0, ',','.') ?></td>
                        <td><?= $pd->Stok ?></td>
                        <td>
                          <a href="<?= base_url('Produk/edit/' . $pd->ProdukID) ?>" class="btn btn-sm btn-primary">Edit</a>
                          <a href="<?= base_url('Produk/delete/' . $pd->ProdukID) ?>" class="btn btn-sm btn-danger">Hapus</a>
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