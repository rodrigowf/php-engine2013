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
function smarty_function_flash($params, &$view)
{
    $flash = $view->controller->flash();

    if ( $flash )
    {
        ?>
        <div class="alert <?php echo $flash['type']; ?>">
            <a class="close" data-dismiss="alert" href="#">&times;</a>
            <strong><?php echo $flash['msg']; ?></strong>
        </div>
        <?php
    }
}
?>