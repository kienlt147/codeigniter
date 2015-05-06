<form method="post" action="create" enctype="multipart/form-data">
    <h2>Create new Product</h2>
    <?php $this->load->view('admin/message')  ?>
    {product}
        <div class="form-group">
            <label>Name</label>
            <input type="hidden" value="{id}">
            <input type="text_field" class="form-control" placeholder="Input name ..." name="name" value="{name}" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text_field" class="form-control" placeholder="Input price ..." name="price" value="{price}" />
        </div>
        <div class="form-group">
            <label>Sale</label>
            <input type="text_field" class="form-control" placeholder="Input sale ..." name="sale" value="{sale}" />
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="filestyle" id="image" name="image" data-icon="false" />
        </div>
        <div class="form-group">
            <img id="show_image" name="show_image" src="<?php echo base_url() . 'public/img/no-image.png' ?>" width="200" />
            <input type="hidden" id="hidden_image" name="hidden_image" value="<?php echo base_url() ?>{image}"/>
            <input type="hidden" id="type_image" name="type_image" value=""/>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea id="description" name="description">{description}</textarea>
        </div>
    {/product}
    <div class="form-group">
        <label>Categories</label>
        <select class="form-control" name="list_id">
            <?php
                foreach ($categories as $category) {
                $lists = $this->list_model->filter_by_category_id($category['id']);
            ?>
                <optgroup label="<?php echo $category['name'] ?>">
                    <?php foreach ($lists->result() as $list) { ?>
                        <option value="<?php echo $list->id ?>"><?php echo $list->name ?></option>
                    <?php } ?>
                </optgroup>
            <?php } ?>
        </select>
    </div>
    <input type="submit" class="btn btn-success" value="Create new">
</form>
