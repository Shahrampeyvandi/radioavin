@isset($post)

@else
<div class="form-group col-md-6">
    <label for=""> Upload 360p Quality: </label>
    <input type="file" name="file360p" id="" class="form-control" />
</div>
<div class="form-group col-md-6">
    <label for=""> Upload 720p Quality: </label>
    <input type="file" name="file720p" id="" class="form-control" />
</div>
<div class="form-group col-md-6">
    <label for=""> Upload 1080p Quality: </label>
    <input type="file" name="file1080p" id="" class="form-control" />
</div>
@endisset