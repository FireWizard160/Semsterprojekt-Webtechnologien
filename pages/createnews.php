<form method="post" action="actions/newnews">
    <div class="mb-3">
        <label for="newstitle" class="form-label">Newstitel:</label>
        <input type="text" class="form-control" id="newstitle" aria-describedby="emailHelp">
    </div>

    <label for="newstext" class="form-label">Newstext:</label>
    <textarea class="form-control" rows="10" id="newstext" name="text"></textarea>


</form>


<div class="input-group">



    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
    </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputGroupFile01"
               aria-describedby="inputGroupFileAddon01" accept=".jpg,.gif,.png">
        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
    </div>
</div>