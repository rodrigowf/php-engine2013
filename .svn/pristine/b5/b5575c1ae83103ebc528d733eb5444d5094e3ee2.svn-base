{extends file="admUser.tpl"}

{block "content"}

<center>
    <br>
    <span>You wanna truly be part of the World's Biggest Event? <br> We really hope you want!So, press the button bellow and make it done!</span>
<br><br>
    {if $payStyle eq 1}
 <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="4LMKH4TATDV5A">
        <input type="image"  style='border: 1px solid gray;'  src="{$_images}/paynow.png" border="0" name="submit" alt="PayPal - A maneira mais fácil e segura de efetuar pagamentos online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
  </form>
    {else}
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="7QLULTJAZXKFA">
        <input type="image" src="{$_images}/paynow.png" border="0" name="submit" alt="PayPal - A maneira mais fácil e segura de efetuar pagamentos online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
    </form>
    {/if}
    <span><em>Don't forget to return to JEWC's Website by the link paypal gaves you when you finish your payment.</em></span>


</center>


{/block}