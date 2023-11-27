<form method="post" action="index.php?action=newnews" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="newstitle" class="form-label">Newstitel:</label>
        <input type="text" class="form-control" id="newstitle" aria-describedby="emailHelp">
    </div>

    <label for="newstext" class="form-label">Newstext:</label>
    <textarea class="form-control" rows="10" id="newstext" name="text"></textarea>



<div class="input-group">




    <div class="custom-file">
        <input type="file" class="custom-file-input" id="picture" name="picture" accept=".jpg,.gif,.png">
        <label class="custom-file-label" for="picture">Choose file</label>
    </div>
</div>
<button type="submit" class="btn btn-primary">Upload</button>

</form>
