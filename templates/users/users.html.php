
<?php 

foreach($users as $utilisateur){ ?>

<div class="row border border-dark bg-info">
        <p><strong>Username: </strong>   <?php echo $utilisateur->username; ?>  </p>
        <p><strong> Email: </strong> <?php echo $utilisateur->email ?> </p>
        
        </div>
<?php }?>
