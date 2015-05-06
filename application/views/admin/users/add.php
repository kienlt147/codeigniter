<h2>Create new User</h2>
<?php $this->load->view('admin/message')  ?>
<form class="form-signin" method="post" action="create">
    <div class="form-group">
        <label>Tên đăng nhập</label>
        <input type="text_field", class="form-control", placeholder="Nhập tên đăng nhập...", name="username">
    </div>
    <div class="form-group">
        <label>Họ và Tên</label>
        <input type="text_field", class="form-control", placeholder="Nhập họ và tên...", name="fullname">
    </div>
    <div class="form-group">
        <label>Mật khẩu</label>
        <input type="password", class="form-control", placeholder="Nhập mật khẩu...", name="password">
    </div>
    <div class="form-group">
        <label>Xác nhận mật khẩu</label>
        <input type="password", class="form-control", placeholder="Nhập xác nhận mật khẩu...", name="confirmation_password">
    </div>
    <input type="submit" class="btn btn-success" value="Tạo mới">
</form>