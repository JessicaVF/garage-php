<div class="container">
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
    <a class="btn btn-primary" href="index.php?controller=gateau&task=index">Back to home</a>
    <br>
    <br>
</div>
