<?php
require_once("includes.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$requests = $_POST['req'];

usort($requests, function($a, $b) {return $a['space'] - $b['space'];});

$done = array();

foreach ($requests as $req)
{
    try {
        if (Tree::request($_SESSION['id'], $req['loc']['lat'], $req['loc']['lng'], $req['space']))
        {
            $done[] = $req['id'];
        }
    }
    catch (InvalidArgumentException $e)
    {
        
    }
}
echo json_encode($done);

?>
