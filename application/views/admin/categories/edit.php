<form method="post" action="<?php echo base_url() ?>admin/categories/update">
    <h2>Edit Category</h2>
    <?php $this->load->view('admin/message')  ?>
    <div class="form-group">
        <label>Tên</label>
        <input type="hidden" name="id" value="{category_id}">
        <input type="text_field" class="form-control" placeholder="Nhập tên ..." name="name" value="{category_name}" />
    </div>
    <fieldset>
        <legend>Lists</legend>
        {lists}
            <div class="form-group">
                <input type="text_field" class="form-control" placeholder="Nhập tên ..." name="category_list_name[{id}]" value="{name}" />
                <a class="btn btn-danger remove_fields" href="javascript:void(0)">Remove</a>
            </div>
        {/lists}
    </fieldset>
    <div class="form-group">
        <a href="javascript:void(0)" class="btn btn-success" id="add_list">+</a>
    </div>
    <input type="submit" class="btn btn-success" value="Save">
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $.fn.categories.init();
    });
</script>