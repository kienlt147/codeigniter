<form method="post" action="create">
    <h2>Create new Lists</h2>
    <?php $this->load->view('admin/message')  ?>
    <div class="form-group">
        <label>Tên</label>
        <input type="text_field", class="form-control", placeholder="Nhập tên ...", name="name">
    </div>
    <div class="form-group">
        <select name="category_id">
            {categories}
                <option value="{id}">{name}</option>
            {/categories}
        </select>
    </div>
    <input type="submit" class="btn btn-success" value="Tạo mới">
</form>