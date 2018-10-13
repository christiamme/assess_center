<?php

include ('config.php');

$gantt = new JSONGanttConnector($res, $dbtype);

$gantt->mix("open", 1);
//$gantt->enable_order("sortorder");

$proyecto = $_GET['proyecto'];

$gantt->filter("proyecto", $proyecto);
$gantt->render_links("gantt_links", "id", "source,target,type");
$gantt->render_table("gantt_tasks","id","start_date,duration,text,progress,type,proyecto,parent,priority","");


?>