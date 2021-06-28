<?php foreach($garages as $garage){?>
  
  <div class="row">
          <p><strong>  <?php echo $garage->name; ?>  </strong></p>
          <p><strong>  <?php echo $garage->address; ?>  </strong></p>
          <p><strong>  <?php echo $garage->description; ?>  </strong></p>
          <a class="btn btn-success" href="index.php?controller=garage&task=show&id=<?php echo $garage->id?>">Check this garage </a>
          <a class="btn btn-danger" href="index.php?controller=garage&task=suppr&id=<?php echo $garage->id?>">Delete this garage </a>
  </div>
  <hr>



<?php } ?>