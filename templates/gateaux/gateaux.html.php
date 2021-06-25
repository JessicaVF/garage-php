

<button class="btn btn-primary"> <a href="index.php?controller=gateau&task=create" class="text-light">Add an gateau </a></button>

<br>
<br>
<?php foreach($gateaux as $gateau){ ?>

<div class="row border border-dark bg-info">
        <p><strong>  <?php echo $gateau['name']; ?>  </strong></p>
        <p><strong>  <?php echo $gateau['flavor']; ?>  </strong></p>
        <?php $count = 0; foreach($makes as $make){
                if($make['gateau_id'] == $gateau['id']){
                      $count = $count +1;  
                }
        } ?>
        <p><strong> Makes: <?php echo $count; ?>  </strong></p>
        <a class="btn btn-secondary" href=""> Make </a>
        <a class="btn btn-success" href="index.php?controller=gateau&task=show&id=<?php echo $gateau['id']?>">Check this gateau </a>
        <a class="btn btn-danger" href="index.php?controller=gateau&task=suppr&id=<?php echo $gateau['id']?>">Delete this gateau </a>    
</div>
<br>
<?php } ?>
