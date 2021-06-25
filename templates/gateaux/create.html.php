
<?php if (!$gateau) {?>
<div class="container">
    <form class="form" action="index.php?controller=gateau&task=create" method="POST">
        <div class="form-group"><textarea name="name" placeholder="nom du gateau" id="" cols="30" rows="10"></textarea>
    </div>
        <div class="form-group"><textarea name="flavor" placeholder="saveur du gateau" id="" cols="30" rows="10"></textarea>
    </div>
        <div class="form-group"><button class="btn btn-success" type="submit">Envoyer</button>
    </div>

    </form>

</div>

<?php }else{ ?>

    <div class="container">
    <form class="form" action="index.php?controller=gateau&task=edit" method="POST">
    <input type="hidden" name="id" value="<?php echo $gateau->id?>">
        <div class="form-group">
        <textarea name="nameEdit" cols="30" rows="10"><?php echo $gateau->name?></textarea>
    </div>
        <div class="form-group">
        <textarea name="flavorEdit"cols="30" rows="10"><?php echo $gateau->flavor?></textarea>
    </div>
        <div class="form-group"><button class="btn btn-success" type="submit">Enregistrer les modifs</button>
    </div>

    </form>

</div>
<br>
<a class="btn btn-secondary" href="index.php?controller=gateau&task=show&id=<?php echo $gateau->id?>">Cancel</a>
<?php }?>

<a class="btn btn-primary" href="index.php?controller=gateau&task=index">Back to home</a>
<br>
<br>