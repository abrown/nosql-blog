<!DOCTYPE>
<html>
    <head>
        <title><?php echo WebRouting::getAnchoredUrl(); ?></title>
        <style type="text/css">
            /** eggnog E3E3CB, grey A6A6A6, varvatos 988575, red FF0101 **/ 
            html{
                background-color: #A6A6A6;
            }
            body{
                background-color: white;
                margin: 3em auto;
                width: 80%;
                font-family: Tahoma, Verdana, Segoe, sans-serif;
                padding: 1em;
                outline: 1em solid #988575;
                border: 1px solid #FF0101;
            }
            h1{
                border-bottom: 1px solid #E3E3CB;
            }
            a{
                color: #FF0101;
            }
            th{
                text-align: left;
            }
            td{
                padding-right: 1em;
            }
            .field{
                clear: left;
                float: left;
                line-height: 1.5em;
            }
            .field label{
                display: inline-block;
                width: 10em;
                
            }
            .message{
                margin-top: 1em;
                background: #E3E3CB;
                padding: 0.5em;
            }
        </style>
    </head>
    <body>
        <h1>TestBlog</h1>
        <nav>
            <a href="<?php echo WebRouting::getLocationUrl(); ?>/posts?storage=json">JSON</a>
            <a href="<?php echo WebRouting::getLocationUrl(); ?>/posts?storage=couch">CouchDB</a>
            <a href="<?php echo WebRouting::getLocationUrl(); ?>/posts?storage=mongo">MongoDB</a>
            <a href="<?php echo WebRouting::getLocationUrl(); ?>/posts?storage=sql">SQL</a>
        </nav>
        <!-- <template:content /> -->
        <?php
            if( @$_GET['message'] ) echo '<div class="message">'.htmlentities($_GET['message']).'</div>';
        ?>
        <h2><?php echo WebRouting::getAnchoredUrl(); ?></h2>
        <?php
            if( !@$error ){
                list($class, $id, $method) = Service::getRouting();
                if( $class == 'posts' && $method == 'read' ) include 'snippet-all.php';
                if( $class == 'post' && $method == 'read' ) include 'snippet-view.php';
                if( $class == 'post' && $method == 'edit' ) include 'snippet-edit.php';
            }
        ?>
    </body>
</html>

