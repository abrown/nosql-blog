<?php
include '../../../pocket-knife/start.php';
BasicFile::autoloadAll('Service');



// database configurations
$dbs = array(
    'sql' => array('type'=>'StoragePdo', 'username'=>'dev', 'password'=>'dev', 'location'=>'localhost', 'database'=>'blog', 'table' => 'posts', 'primary' => 'id'),
    'couch' => array('type'=>'StorageCouch', 'location'=>'localhost', 'database'=>'blog'),
    'mongo' => array('type'=>'StorageMongo', 'location'=>'localhost', 'database'=>'blog', 'collection' => 'posts'),
    'json' => array('type'=>'StorageJson', 'location'=>'db.json', 'schema'=>''),
);
if( array_key_exists(@$_GET['storage'], $dbs) ){
    $storage = @$_GET['storage'];
}
else{
    pr('Must select a storage method to use in URL: ...?storage=json|couch|mongo|sql');
    die();
}
$configuration = new Configuration($dbs[$storage]);
$class = $configuration->type;
$db = new $class($configuration);



// benchmarking
BasicBenchmark::startTimer();
$initial_memory_usage = BasicBenchmark::getMemory('kb');

// open files
pr('Opening data set...');
$base_dir = '../../test_data2';
$handle1 = opendir($base_dir);
$count = 0;
while( false !== ($dir = readdir($handle1))){
    if( $dir == '.' || $dir == '..' ) continue;
    $handle2 = opendir($base_dir.'/'.$dir);
    while( false !== ($file = readdir($handle2))){
        if( $file == '.' || $file == '..' ) continue;
        // get content
        $content = file_get_contents($base_dir.'/'.$dir.'/'.$file);
        $content = utf8_encode($content);
        // get title
        $a = strpos($content, 'Subject:');
        if( $a !== false ){
            $b = strpos($content, "\n", $a);
            $title = substr($content, $a + 9, $b - ($a + 9));
            $title = htmlentities($title);
        }
        else{
            $title = 'Could not find title';
        }
        // get author
        $c = strpos($content, 'From:');
        if( $c !== false ){
            $d = strpos($content, "\n", $c);
            $author = substr($content, $c + 6, $d - ($c + 6));
            $author = htmlentities($author);
        }
        else{
            $author = 'Could not find author';
        }
        // count
        $count++;
        // insert
        $item = new stdClass();
        $item->created = date('Y-m-d H:i:s');
        $item->modified = date('Y-m-d H:i:s');
        $item->title = $title;
        $item->content = $content;
        $item->author = $author;
        $db->create($item);
    }
}
$db->commit();
pr('Total opened files: '.$count);



// benchmarking
BasicBenchmark::endTimer();
$time = BasicBenchmark::getTime();
$peak_memory_usage = BasicBenchmark::getPeakMemory('kb');
?>
<p>
    Time: <?php echo $time; ?> seconds<br/>
    Memory: <?php echo $peak_memory_usage; ?> (initial file loading: <?php echo $initial_memory_usage; ?>)<br/>
    CSV: <table><tr>
        <td><?php echo date('r'); ?></td>
        <td><?php echo $time; ?></td>
        <td><?php echo $peak_memory_usage; ?></td>
        <td><?php echo $initial_memory_usage; ?></td>
    </tr></table>
</p>