<form class="form-signin" method="post" action="sessions/create">
    <h2>Đăng nhập</h2>
    <?php $this->load->view('admin/message')  ?>
    <input type="text_field", class="form-control", placeholder="Nhập tên đăng nhập...", name="username">
    <input type="password", class="form-control", placeholder="Nhập mật khẩu...", name="password">
    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Đăng nhập">
</form>