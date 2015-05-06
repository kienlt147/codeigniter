<h1>Users</h1>
<a href="">Add new</a>
<table class="table table-bordered">
    <tr>
        <td class="active">#</td>
        <td class="success">Name</td>
        <td class="warning">Price</td>
        <td class="danger">Sale</td>
        <td class="info">Image</td>
        <td class="info">Categories</td>
        <td class="info">Action</td>
    </tr>
    {products}
        <tr>
            <td>{id}</td>
            <td>{name}</td>
            <td>{price}</td>
            <td>{sale}</td>
            <td><img src="<?php echo base_url() ?>{image}" width="50"/></td>
            <td>{list_name}</td>
            <td>Delete</td>
        </tr>
    {/products}
</table>
