{extends file='html.tpl'}

{block 'body'}
{form submit="LOGIN"}
    <fieldset>
        <legend>Login</legend>
        <div class="row">
            {input name='login' label='Login'}{val_error name='login'}
        </div>
        <div class="row">
            {input type="password" name='password' label='Password'}{val_error name='senha'}
        </div>
        {if $valError}<p class='error'>Login and/or password incorrect!</p>{/if}
        
    </fieldset>
    {a class='button' action='esqueceu_senha'}Forgot your password?{/a}
{/form}
{/block}
