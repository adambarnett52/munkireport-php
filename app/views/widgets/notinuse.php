


<div class="col-lg-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Spare Machines</h3>
        </div>
        <div class="list-group scroll-box">
        <!-- we need to put the list here -->
<?php



exec(system("cat /tools/SITE/etc/cfg/systems/systems| grep 116 | grep OSX| cut -d , -f 1 | grep -v '#'| egrep  -v 'yucca|handfish|ghostshark'"),$output); 
foreach($output as $out){ 
    echo $out; 
    echo "\n"; 
}  

//$foo = system("cat /user_data/systems| grep 116 | grep OSX| cut -d , -f 1 | grep -v '#'| egrep  -v 'yucca|handfish|ghostshark'");
//echo $foo
//echo  nl2br($foo);
//
//echo str_replace("\n\r", "<br>",$foo );
?>	


        </div>
    </div><!-- /panel -->
</div><!-- /col -->
