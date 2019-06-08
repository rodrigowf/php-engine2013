{extends file="admUser.tpl"}

{block "content"}

	<h2>Change password</h2>
	
	{form submit="DONE"}
	<div class='row'>
		{input name='password' label='Password' type='password'} {if $valError}<p class='error'>The passwords don't match</p>{/if}
	</div>
	<div class='row'>
		{input name='chk_password' label='Retype the password' type='password'}
	</div>
	{/form}

{/block}