<?php ?>
<br>
<div class="container">
        
        <form class="form" action="index.php?controller=user&task=signIn" method="POST">
            <div class="form-group">
                <textarea name="username" placeholder="username" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <textarea name="password" placeholder="password" id="" cols="30" rows="10"></textarea>
            </div>
                <input type="hidden" name="logRequest" value="on">
            <div class="form-group">
                <button class="btn btn-success" type="submit">Login</button>
            </div>
        </form>
</div>
<br>