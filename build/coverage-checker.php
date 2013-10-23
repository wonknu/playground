<?php

function writeHtml($stats) {
    $content = '<html>
    <head><link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" /></head>
    <body><table class="table"><thead><tr><th>Module</th><th>Coverage</th><th>Percent</th></tr></thead><tbody>';
    foreach ($stats as $stat) {
        $state = 'class="success"';
        if($stat['state'] == 'ko') {
            $state = 'class="danger"';
        }
        $content .="<tr ".$state."><td>".$stat['name']."</td><td><strong>".$stat['coverage']."%</strong></td><td>".$stat['percent']."%</td></tr>";
    }
    $content .= '</tbody></table></body></html>';
    file_put_contents(__DIR__.'/coverage/index.html', $content);
}


function writeCli($stats) {
    foreach ($stats as $stat) {
        if($stat['state'] == 'ko') {
            echo "\033[31m".$stat['name']. " : ".$stat['coverage']."% (".$stat['percent']."%)"."\033[37m";
        } else {
            echo "\033[32m".$stat['name']. " : ".$stat['coverage']."% (".$stat['percent']."%)"."\033[37m";
        }
        echo "\n";
    }
}


$error = false;
$stats = array();

$modules  = new SimpleXMLElement(file_get_contents(__DIR__.'/modules.xml'));

foreach ($modules->modules[0] as $module) {
    $state = 'ok';

    $inputFile  = __DIR__.'/../'.$module->path.'/build/clover.xml';
    $percentage = min(100, max(0, (int) $module->limit));

    if (!file_exists($inputFile)) {
        continue;
    }

    if ($percentage == 0) {
        continue;
    }

    $xml             = new SimpleXMLElement(file_get_contents($inputFile));
    $metrics         = $xml->xpath('//metrics');
    $totalElements   = 0;
    $checkedElements = 0;

    foreach ($metrics as $metric) {
        $totalElements   += (int) $metric['elements'];
        $checkedElements += (int) $metric['coveredelements'];
    }

    $coverage = ceil(($checkedElements / $totalElements) * 100);

    if ($coverage < $percentage) {
        $error = true;
        $state = 'ko';
        echo 'Code coverage is ' . $coverage . '%, which is below the accepted ' . $percentage . '% for '.$module->name. PHP_EOL ;
    }
    $stats[] = array('name' => (string) $module->name, 'percent' => $percentage, 'coverage' => $coverage, 'state' => $state);
}

writeHtml($stats);
writeCli($stats);

if($error){
    exit(1);
}
