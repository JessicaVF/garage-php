
<?php if($user){ ?>
<button class="btn btn-primary"> <a href="index.php?controller=gateau&task=create" class="text-light">Add an gateau </a></button>

<br>
<br>

<?php } ?>
<?php foreach($gateaux as $gateau){ ?>

<div class="row border border-dark bg-info">
        <p><strong>Name: </strong>   <?php echo $gateau->name; ?>  </p>
        <p><strong>Flavor: </strong> <?php echo $gateau->flavor; ?>  </p>
        
        <p><strong>Makes: </strong> <?php echo $gateau->getMakes(); ?> </p>

        <?php if($user) {
                if($user->hasMade($gateau)){ ?> 
                        <form action="index.php?controller=make&task=unsave" method="post">
                                <input type="hidden" name="gateau_id" value =<?php echo $gateau->id?>>
                                <input class= "btn btn-success" type="submit" value="made!">
                        </form>
        <?php }else{ ?>
                        <form action="index.php?controller=make&task=save" method="post">
                                <input type="hidden" name="gateau_id" value =<?php echo $gateau->id?>>
                                <input class= "btn btn-secondary" type="submit" value="to make">
                        </form>
        <?php }
              } ?>
        
        


        <br>
        <br>
        <a class="btn btn-success" href="index.php?controller=gateau&task=show&id=<?php echo $gateau->id?>">Check this gateau </a>

        <?php if($user){
                if($user->isAuthor($gateau)){ ?> 
                                                <a class="btn btn-danger" href="index.php?controller=gateau&task=suppr&id=<?php echo $gateau->id?>">Delete this gateau </a>    
        <?php }} ?>
        
</div>
<br>
<?php } ?>
