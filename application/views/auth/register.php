
<body class="bg-gradient-login">
  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                  <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $this->session->flashdata('error'); ?>
                  </div>
                  <?php endif; ?>
                    <h1 class="h4 text-gray-900 mb-4"><?= $title ?></h1>
                  </div>
                  <form action="<?= base_url('auth/register') ?>" method="post">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" name="username" id="exampleInputFirstName" placeholder="Isi Username" required>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Isi Email" required>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="<?= base_url('auth') ?>">Sudah punya akun?</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>