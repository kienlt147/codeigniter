<html>
    <head>
        <title><?php echo get_title() ?></title>
        <?php
            foreach ($css as $file) {
                echo "\t";
                echo $file;
                echo "\n";
            }
            foreach($js as $file){
                echo "\t";
                echo $file;
                echo "\n";
            }
        ?>
    </head>
    <body>
        <?php $this->load->view('layouts/header') ?>
        <div class="container starter-template">
            <?php echo $output ?>
        </div>
    </body>
</html>
