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
$db->begin();



// benchmarking
BasicBenchmark::startTimer();
$initial_memory_usage = BasicBenchmark::getMemory('kb');

// read into list
pr('Accessing database...');
$list = $db->all();
pr('Total records: '.count($list));


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