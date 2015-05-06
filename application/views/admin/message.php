<?php if ($this->session->flashdata('success')) { ?>
    <p class="bg-success"><?php echo $this->session->flashdata('success') ?></p>
<?php } else if ($this->session->flashdata('error')) { ?>
    <p class="bg-danger"><?php echo $this->session->flashdata('error') ?></p>
<?php } ?>