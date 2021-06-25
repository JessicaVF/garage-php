

<button class="btn btn-primary"> <a href="index.php?controller=gateau&task=create" class="text-light">Add an gateau </a></button>

<br>
<br>
<?php foreach($gateaux as $gateau){ ?>

<div class="row border border-dark bg-info">
        <p><strong>Name: </strong>   <?php echo $gateau->name; ?>  </p>
        <p><strong>Flavor: </strong> <?php echo $gateau->flavor; ?>  </p>
        <p><strong> Makes: </strong> <?php echo $gateau->getMakes(); ?> </p>
        
        <a class="btn btn-secondary" href=""> Make </a>
        <a class="btn btn-success" href="index.php?controller=gateau&task=show&id=<?php echo $gateau->id?>">Check this gateau </a>
        <a class="btn btn-danger" href="index.php?controller=gateau&task=suppr&id=<?php echo $gateau->id?>">Delete this gateau </a>    
</div>
<br>
<?php } ?>
