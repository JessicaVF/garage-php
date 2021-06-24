<?php 


if (!$recette) {?>
    <div class="container">
        <form class="form" action="index.php?controller=recette&task=create" method="POST">
            <div class="form-group"><textarea name="name" placeholder="nom du recette" id="" cols="30" rows="10"></textarea>
        </div>
            <div class="form-group"><textarea name="description" placeholder="description du recette" id="" cols="30" rows="10"></textarea>
        </div>
            <div class="form-group"><button class="btn btn-success" type="submit">Envoyer</button>
        </div>

        </form>
    </div>

<?php }else{ ?>

    <div class="container">
        <form class="form" action="index.php?controller=recette&task=edit" method="POST">
            <input type="hidden" name="id" value="<?php echo $recette['id']?>">
                <div class="form-group">
                <textarea name="nameEdit" cols="30" rows="10"><?php echo $recette['name']?></textarea>
            </div>
                <div class="form-group">
                <textarea name="DescriptionEdit"cols="30" rows="10"><?php echo $recette['description']?></textarea>
            </div>
                <div class="form-group"><button class="btn btn-success" type="submit">Enregistrer les modifs</button>
            </div>
        </form>
    </div>
    <br>

<?php }?>

<a class="btn btn-primary" href="index.php?controller=recette&task=index">Back to home</a>
<br>
<br>