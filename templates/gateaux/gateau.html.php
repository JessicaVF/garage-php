<div class="container">
    

    <?php if(!empty($_POST['id']) && $_POST['id']== $gateau['id']){
      ?>
    <form action="index.php?controller=gateau&task=edit" method="POST">
          <input type="hidden" name="id" value=<?php echo $gateau['id']?>>
          <input type="hidden" name="edit" value="edit">
          <input type="text" name="nameEdit" value= <?php echo $gateau['name']?>>
          <input type="text" name="flavorEdit" value= <?php echo $gateau['flavor']?>>
          <input type="submit" value="Edit"> 
      </form>
      <?php } else{ ?>
        <div class="row">
        <div class="col">
            <h2>Name:</h2> 
            <p> <?php echo $gateau['name'];?></p>
        </div>
        <div class="col">
            <h2>Description:</h2>
            <p><?php echo $gateau['flavor'];?></p>
        </div>
    </div>
        <?php }?>
        <form method="POST">
        <input type="hidden" name="id" value=<?php echo $gateau['id']?>>
        <input type="submit" value="Edit">
      </form> 
    <hr>
    <a class="btn btn-primary" href="index.php?controller=gateau&task=index">Back to home</a>
    <br>
    <br>
</div>
