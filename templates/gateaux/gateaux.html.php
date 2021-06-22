<?php

foreach($gateaux as $gateau){ ?>

<div class="row">
          <p><strong>  <?php echo $gateau['name']; ?>  </strong></p>
          <p><strong>  <?php echo $gateau['flavor']; ?>  </strong></p>
          <a class="btn btn-success" href="index.php?controller=gateau&task=show&id=<?php echo $gateau['id']?>">Check this gateau </a>
          <a class="btn btn-danger" href="index.php?controller=gateau&task=suppr&id=<?php echo $gateau['id']?>">Delete this gateau </a>
  </div>
  <hr>



<?php } ?>

<h5><u>Add an gateau</u></h3>
    <form action="index.php?controller=gateau&task=save" method="POST">
        <input type="text" name="name" placeholder="name" required>
        <input type="text" name="flavor" placeholder="flavor" required>
        <input type="submit" value="Add gateau">
    </form>