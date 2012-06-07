<a href="<?php echo urlpath;?>/tracking/index">Return To Tracking Overview</a><br />
Displaying Page View Statistics<br />
<br />
<?php
if(isset($this->params['pageViewData'])){ ?>
<table>
    <tr><th>ControllerName</th><th>ViewName</th><th>Views</th></tr>
<?php   foreach($this->params['pageViewData'] as $controllerName=>$controllerData){
            foreach($controllerData as $viewName=>$viewCount){
    ?>
    <tr>
        <td><?php echo $controllerName; ?></td>
        <td><?php echo $viewName; ?></td>
        <td><?php echo $viewCount; ?></td>
    </tr>
<?php       }
        }
        ?>
</table>
<?php
} ?>

