<?php foreach($users as $user){ ?>

    <div class="row border border-dark bg-info">
        <p><strong>Username: </strong>   <?php echo $user->username; ?>  </p>
        <p><strong> Email: </strong> <?php echo $user->email ?> </p>
        

<?php }?>