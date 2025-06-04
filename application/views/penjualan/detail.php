 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('Beranda')?>">Beranda</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('Penjualan')?>">Data Penjualan</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
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
            <div class="col-lg-4">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Pembelian</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                      <label class="form-label">Nama Pelanggan</label>
                      <input type="text" class="form-control" name="" value="<?= $Penjualan->NamaPelanggan ?>" disabled>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Tanggal</label>
                      <input type="text" class="form-control" name="" value="<?= $Penjualan->TanggalPenjualan ?>" disabled>
                    </div>
                  <form action="<?= base_url('penjualan/ProsesTambahDetail') ?>" method="post">
                  <input type="hidden" name="PenjualanID" value="<?= $this->uri->segment(3)?>">
                    <div class="mb-3">
                      <label class="form-label">Produk,Stok, dan Harga</label>
                      <select name="ProdukID" id="ProdukID" class="form-control">
                        <?php foreach ($produk as $pd) : ?>
                        <option value="<?= $pd->ProdukID ?>">
                            <?= $pd->NamaProduk. "- Stok". $pd->Stok . '- Rp.'. number_format($pd->Harga, 0,'.','.') ?>
                        </option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Jumlah</label>
                      <input type="text" class="form-control" name="JumlahProduk" required>
                    </div>
                    <a href="<?= base_url('penjualan') ?>" class="btn btn-primary col-3">Kembali</a>
                    <button type="submit" class="btn btn-warning col-8">Tambah</button>
                  </form>
                  <br>
                  <?php if ($detail) { ?>
                        <div class="">
                            <h3>
                                Rp. <?= number_format($TotalHarga->Subtotal) ?>
                            </h3>
                        </div>
                        <button class="btn btn-success col-12" data-toggle="modal" data-target="#ModalBayar">
                            Bayar
                        </button>
                    <?php } else {
                    } ?>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Pembelian</h6>
                </div>
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $w=1 ?>
                        <?php foreach ($detail as $dt) : ?>
                      <tr>
                        <td><?= $w?></td>
                        <td><?= $dt->NamaProduk ?></td>
                        <td><?= $dt->JumlahProduk ?></td>
                        <td>Rp.<?= number_format($dt->Harga, 0 ,'.','.') ?></td>
                        <td>Rp.<?= number_format($dt->Subtotal, 0 ,'.','.') ?></td>
                        <td><a href="<?= base_url('penjualan/hapus_detail/'. $dt->DetailID) ?>" class="btn btn-danger">Hapus</a></td>
                      </tr>
                      <?php $w++ ?>
                      <?php endforeach ?>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
          <div class="modal fade" id="ModalBayar" tabindex="-1" aria-labelledby="ProdukModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-xs">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ProdukModalLabel">Tambah Produk</h1>
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">-</button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form method="post" action="<?= base_url('Penjualan/Bayar/' . $Penjualan->PenjualanID) ?>">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Total Yang Harus
                                                Dibayar</label>
                                            <input type="text" class="form-control" readonly
                                                value="Rp. <?= $TotalHarga->Subtotal ?>" />
                                            <input type="hidden" value="<?= $TotalHarga->Subtotal ?>" name="TotalHarga">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Pembayaran</label>
                                            <input type="number" class="form-control" required name="Pembayaran"
                                                min="<?= $TotalHarga->Subtotal ?>" />
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                    <!--begin::Footer-->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <!--end::Footer-->
                                </form>
                            </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
          </div>