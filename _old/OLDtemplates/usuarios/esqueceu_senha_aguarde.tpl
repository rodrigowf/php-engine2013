{extends file='html.tpl'}

{block 'body'}

    <div class="corpo row">
        <h3 class="message">AN E-MAIL HAS BEEN SENT TO YOU FOR YOU TO CHANGE YOUR PASSWORD. <br />
        PLEASE CHECK YOUR INBOX.</h3>


        {a action="login" controller="usuarios" }<button>GO BACK</button>{/a}
    </div>
{/block}
