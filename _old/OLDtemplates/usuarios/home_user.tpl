{extends file="admUser.tpl"}

{block "content"}

	<h2>Welcome {$dado["usuarios"]["primeiro_nome"]}!</h2>
    <h4>{$fila}</h4>

    <h3 class="aviso">{flash}</h3>


	<br />
	<br />

{/block}