<form method="post" action="create">
    <h2>Create new Categories</h2>
    <?php $this->load->view('admin/message')  ?>
    <div class="form-group">
        <label>Tên</label>
        <input type="text_field" class="form-control" placeholder="Nhập tên ..." name="name" />
    </div>
    <fieldset>
        <legend>Lists</legend>
        <div class="form-group">
            <input type="text_field" class="form-control", placeholder="Nhập tên ..." name="category_list_name[]" />
            <a class="btn btn-danger remove_fields" href="javascript:void(0)">Remove</a>
        </div>
    </fieldset>
    <div class="form-group">
        <a href="javascript:void(0)" class="btn btn-success" id="add_list">+</a>
    </div>
    <input type="submit" class="btn btn-success" value="Add new">
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $.fn.categories.init();
    });
</script>