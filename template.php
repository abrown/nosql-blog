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
        </style>
    </head>
    <body>
        <h1>TestBlog</h1>
        <nav>
            <a href="<?php echo WebRouting::getUrl(); ?>?storage=json">JSON</a>
            <a href="<?php echo WebRouting::getUrl(); ?>?storage=couch">CouchDB</a>
            <a href="<?php echo WebRouting::getUrl(); ?>?storage=mongo">MongoDB</a>
            <a href="<?php echo WebRouting::getUrl(); ?>?storage=sql">SQL</a>
        </nav>
        <h2><?php echo WebRouting::getAnchoredUrl(); ?></h2>
        <pre><K:content/><pre>
    </body>
</html>

