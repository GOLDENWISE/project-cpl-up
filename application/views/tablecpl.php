<div class="container">
  <table class="table table-bordered border-primary">
  <tbody>
      <tr>
        <td scope="row" colspan="3">
          <?php foreach($linksheader as $linkheader) : ?>
            <?= $linkheader; ?>
          <?php endforeach; ?>
        </td>
      </tr>
  </tbody>
  </table>
</div>
<div class="container d-flex justify-content-center">
  <table id="data-table" class="table table-bordered border-primary text-center" style="width: 700px;">
  </table>
  <br>
<script>var excelFile = "<?= $sourceFile; ?>";</script>
<script src="<?= base_url('assets/js/accessexcel.js'); ?>"></script>