  <!-- BEGIN STRUK -->
  <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Struk Pembayaran</h3>
                        <hr>

                        <!-- Nama Pelanggan -->
                        <div class="mb-3">
                            <label><strong>Nama Pelanggan:</strong></label>
                            <p><?= $penjualan->NamaPelanggan ?></p>
                        </div>

                        <!-- Tanggal Penjualan -->
                        <div class="mb-3">
                            <label><strong>Tanggal Penjualan:</strong></label>
                            <p><?= $penjualan->TanggalPenjualan ?></p>
                        </div>

                        <hr>

                        <!-- Produk yang dibeli -->
                        <div class="mb-3">
                            <h5><strong>Produk yang Dibeli:</strong></h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detail as $p): ?>
                                        <tr>
                                            <td><?= $p->NamaProduk ?></td>
                                            <td>Rp. <?= number_format($p->Harga) ?></td>
                                            <td><?= number_format($p->JumlahProduk) ?></td>
                                            <td>Rp. <?= number_format($p->Subtotal) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <hr>

                        <!-- Total Harga -->
                        <div class="mb-3">
                            <label><strong>Total Harga:</strong></label>
                            <p>Rp. <?= number_format($penjualan->TotalHarga) ?></p>
                        </div>

                        <!-- Pembayaran -->
                        <div class="mb-3">
                            <label><strong>Pembayaran:</strong></label>
                            <p>Rp. <?= number_format($penjualan->TotalPembayaran) ?></p>
                        </div>

                        <!-- Kembalian -->
                        <div class="mb-3">
                            <label><strong>Kembalian:</strong></label>
                            <p>Rp. <?= number_format($penjualan->TotalPembayaran - $penjualan->TotalHarga) ?></p>
                        </div>

                        <hr>

                        <!-- Footer -->
                        <p class="text-center"><strong>Terima Kasih atas Pembelian Anda!</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Print -->
    <div class="text-center mt-4 hide-on-print">
        <button onclick="window.print()" class="btn btn-success">Cetak Struk</button>
        <a href="<?= base_url('penjualan')?>" class="btn btn-primary">Kembali</a>
    </div>
    