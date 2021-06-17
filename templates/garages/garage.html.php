<div class="container">
    <div class="row">
        <div class="col">
            <h2>Name:</h2> 
            <p> <?php echo $garage['name'];?></p>
        </div>
        <div class="col">
            <h2>Description:</h2>
            <p><?php echo $garage['description'];?></p>
        </div>
        <div class="col">
            <h2>Address:</h2>
            <p> <?php echo $garage['address'];?></p>
        </div>
    </div>
    <a class="btn btn-primary" href="index.php">Back to home</a>
    <h5><u>Add an annonce</u></h3>
    <form action="saveAnnonce.php" method="POST">
        <input type="hidden" name="garage_id" value="<?php echo $garage["id"]?>">
        <input type="text" name="name" placeholder="name" required>
        <input type="number" name="price" placeholder="price" required>
        <input type="submit" value="Add annonce">
    </form>
    <br>
    <?php if($annonces){?>
    <h5><u>Annonces</u></h3>
    <?php }else{?>
    <h5>This garage still has not annonces</h5>
    <?php } ?>
    <?php foreach($annonces as $annonce){?>
        <em> Car: </em> <?php echo $annonce['name']; ?>
        <br>
        <em> Price: </em> <?php echo $annonce['price']; ?>
        <br>
        <a class="btn btn-danger" href="deleteAnnonce.php?id=<?php echo $annonce['id']?>">Delete this annonce </a>
        <hr>
    <?php } ?>
</div>



