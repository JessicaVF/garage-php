<div class="container">
    

    
      
        <div class="row">
            <div class="col">
                <h2>Name:</h2> 
                <p> <?php echo $gateau->name;?></p>
            </div>
            <div class="col">
                <h2>Description:</h2>
                <p><?php echo $gateau->flavor;?></p>
            </div>
            <div class="col">
                <h2>Makes:</h2>
                <p><?php echo $gateau->getMakes(); ?></p>
            </div>
            
        </div>
    <a class="btn btn-secondary"> Make </a>
    <form action="index.php?controller=gateau&task=create" method="POST">
            <button type="submit" name="id" value="<?php echo $gateau->id ?>" class="btn btn-warning">Modifier ce gateau</button>
        </form>
        <?php foreach($recettes as $recette){?>
            <hr>
            <h6><?php echo $recette->name?></h6>
            <p><?php echo $recette->description?></p>
            <br>
            <a class="btn btn-secondary"> Make </a>
            <br>
            <form action="index.php?controller=recette&task=create" method="POST">
                <input type= hidden name= gateau_id value = "<?php echo $gateau->id ?>">
                <button type="submit" name="id" value="<?php echo $recette->id ?>" class="btn btn-warning">Modifier la recette</button>
            </form>
        <br>
            <a class="btn btn-danger" href="index.php?controller=recette&task=suppr&id=<?php echo $recette->id?>">Delete this recette </a>
           
        <?php } ?>
   
    <hr>
    <!-- Creation of recette -->
    <form action="index.php?controller=recette&task=create" method="POST">
            <input type="hidden"  name="creation">
            <button type="submit" name="id" value="<?php echo $gateau->id ?>" class="btn btn-success">Create new recette</button>
    </form>
    <hr>
        <a class="btn btn-primary" href="index.php?controller=gateau&task=index">Back to home</a>
    <br>
    <br>
</div>
