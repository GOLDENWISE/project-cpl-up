<div class="container d-flex">
  <table class="table table-bordered border-primary">
    <tbody>
      <tr>
        <td scope="row" colspan="3">
          <a href="<?= base_url("/home"); ?>" class="disabled">Home</a> >>
        </td>
      </tr>
      <tr>
        <td scope="row" style="width: 20%;">
          <h4 class="text-end me-3 mt-4" style="color: #0076be;">
            Menu
            <hr class=" border border-primary opacity-50" style="margin: 0rem;">
          </h4>
          <div class="list-group list-group-flush text-end fw-semibold">
            <a href="<?= base_url("/home"); ?>" class="list-group-item text-end <?= $kalender ? "active" : "" ?> disabled">Beranda</a>
            <a href="<?= base_url("/calendar"); ?>" class="list-group-item text-end <?= $beranda ? "active" : "" ?> disabled">Kalender Akademik</a>
            <a href="<?= base_url("/login"); ?>" class="list-group-item text-end <?= $login ? "active" : "" ?> text-end ">Login</a>
          </div>
        </td>