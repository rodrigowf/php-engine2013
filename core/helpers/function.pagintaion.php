<?php
/**
 * Smarty plugin
 * *feito pelo Werneck
 * -------------------------------------------------------------
 * File:     function.flash.php
 * Type:     function
 * Name:     flash
 * Purpose:  script helper
 * -------------------------------------------------------------
 */
/**
 * @param $params
 * @param View $view
 * @return mixed
 */
function smarty_function_pagination($params, &$view)
{
    $view->controller->formModels[$params['model']];

    ?>
        <div class="pagination">
            <ul>
                <li class="disabled"><a href="#">«</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">»</a></li>
            </ul>
        </div>
    <?php
}
?>