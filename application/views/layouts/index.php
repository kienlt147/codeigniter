<html>
    <head>
        <title>Fels</title>
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
        <script type="text/javascript">
            ddsmoothmenu.init({
                mainmenuid: "smoothmenu2", //Menu DIV id
                orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
                classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
                //customtheme: ["#804000", "#482400"],
                contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
            })
        </script>
    </head>
    <body>
        <?php $this->load->view('layouts/header') ?>
        <?php $this->load->view('layouts/menubar') ?>
        <div id="home">
            <?php $this->load->view('layouts/menuleft') ?>
            <div id="main">
                <?php $this->load->view('layouts/support') ?>
                <?php echo $output ?>
            </div>
            <div style="clear:both"></div>
            <?php $this->load->view('layouts/info') ?>
        </div>
        <?php $this->load->view('layouts/footer') ?>
    </body>
</html>
