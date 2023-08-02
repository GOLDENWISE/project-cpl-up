<div class="container d-flex">
  <table class="table table-bordered border-primary m-auto" style="width: 700px;">
    <tbody>
      <tr>
        <td scope="row" colspan="3">
          <?php foreach($linksheader as $linkheader) : ?>
            <?= $linkheader; ?>
          <?php endforeach; ?>
        </td>
      </tr>
      <tr>
        <td scope="row">
          <h1 class="text-center my-3" style="color: #0076be;">
            <?= $title; ?>
          </h1>
          <?php foreach($links as $link) : ?>
            <div class="text-center my-3" style="font-size: 20px;">
              <?= $link ?>
            </div>
          <?php endforeach; ?>
        </td>