 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('Beranda') ?>">Beranda</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('Produk') ?>">Data Produk</a></li>
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
                          <label for="" class="form-label">Nama Produk</label>
                          <input type="text" name="NamaProduk" class="form-control" value="<?= $produk->NamaProduk ?>">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Harga</label>
                          <input type="text" name="Harga" class="form-control" value="<?= $produk->Harga ?>">
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Stok</label>
                          <input type="text" name="Stok" class="form-control" value="<?= $produk->Stok ?>">
                        </div>
                      </div>
                      <div class="modal-footer">
                       <a href="<?= base_url('produk') ?>" class="btn btn-outline-primary">Batal</a>
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