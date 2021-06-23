

<button class="btn btn-secondary"> <a href="index.php?controller=gateau&task=create">Add an gateau </a></button>

<br>
<br>
<?php foreach($gateaux as $gateau){ ?>

<div class="row">
          <p><strong>  <?php echo $gateau['name']; ?>  </strong></p>
          <p><strong>  <?php echo $gateau['flavor']; ?>  </strong></p>
          <a class="btn btn-success" href="index.php?controller=gateau&task=show&id=<?php echo $gateau['id']?>">Check this gateau </a>
          <a class="btn btn-danger" href="index.php?controller=gateau&task=suppr&id=<?php echo $gateau['id']?>">Delete this gateau </a>
  </div>
  <hr>
<?php } ?>
