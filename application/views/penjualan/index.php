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
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('success'); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('error'); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-lg-12 mb-4">
      <!-- Simple Tables -->
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="#myBtn">
            Tambahkan data penjualan
          </button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Silahkan Input Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th>No</th>
                          <th>Nama Pelanggan</th>
                          <th>Alamat</th>
                          <th>No Telepon</th>
                          <th class="colspan-2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $w = 1 ?>
                        <?php foreach ($pelanggan as $pg): ?>
                          <tr>
                            <td><?= $w ?></td>
                            <td><?= $pg->NamaPelanggan ?></td>
                            <td><?= $pg->Alamat ?></td>
                            <td><?= $pg->NomorTelepon ?></td>
                            <td><a href="<?= base_url('penjualan/prosescreate/' . $pg->PelangganID) ?>"
                                class="btn btn-sm btn-warning">Tambah</a></td>
                            <?php $w++ ?>
                          <?php endforeach ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $w = 1 ?>
              <?php foreach ($penjualan as $pd): ?>
                <tr>
                  <td><?= $w ?></td>
                  <td><?= $pd->NamaPelanggan ?></td>
                  <td><?= $pd->TanggalPenjualan ?></td>
                  <td>Rp.<?= number_format($pd->TotalHarga, 0, '.', '.') ?></td>
                  <?php if ($pd->TotalHarga == 0) { ?>
                    <td><a href="<?= base_url('penjualan/detail/' . $pd->PenjualanID) ?>" class="btn btn-primary">Detail</a>
                      <a href="<?= base_url('penjualan/hapus_penjualan/' . $pd->PenjualanID) ?>"
                        class="btn btn-danger">Hapus</a>
                    </td>
                  <?php } else { ?>
                    <td>
                      <a href="<?= base_url('penjualan/struk/' . $pd->PenjualanID) ?>" class="btn btn-success">Struk</a>
                    </td>
                  <?php } ?>
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
</div>
</div>