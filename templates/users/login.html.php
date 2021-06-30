<?php ?>

<div class="container">
    <div class="d-flex flex-row">
        <div class="m-5">
            <h2> Connect</h2>
            <form class="form" action="index.php?controller=user&task=signIn" method="POST">
                <div class="form-group  m-3">
                    <textarea name="username" placeholder="username" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group  m-3">
                    <textarea name="password" placeholder="password" id="" cols="30" rows="10"></textarea>
                </div>
                    <input type="hidden" name="logRequest" value="on">
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Login</button>
                </div>
            </form>
        </div>
        
        <div class="m-5">
            <h2> Create </h2>

            
            <form class="form" action="index.php?controller=user&task=signUp" method="POST">
                <div class="d-flex flex-row">
                    <div class="form-group  m-3">
                        <textarea name="usernameCreation" placeholder="username" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group  m-3">
                        <textarea name="emailCreation" placeholder="email" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="form-group  m-3">
                        <textarea name="passwordCreation" placeholder="password" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group  m-3">
                        <textarea name="passwordConfirmation" placeholder="password confirmation" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                    
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Create</button>
                </div>
            </form>
            </div>
    </div>
</div>