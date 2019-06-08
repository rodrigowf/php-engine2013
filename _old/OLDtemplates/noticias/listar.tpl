{extends file="adm.tpl"}

{block "content"}

<table cellpadding='0' cellspacing='0' width='100%' class='questions'>
    <thead>
    <tr>
        <th>Título</th>
        <th>Data de Criação</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    </thead>

    <tbody>
        {foreach $news as $new }
        <tr>
            <td class="first"><a href="./../visualizar/{$new['noticias']['idNoticia']}" class="newsTitle">{$new['noticias']['Titulo']}</a></td>
            <td>{$new['noticias']['Data']}</td>
            <td><a href="./../editar/{$new['noticias']['idNoticia']}"><img src="../../images/edit.png" alt="editar"></a></td>
            <td><a href="./../excluir/{$new['noticias']['idNoticia']}"><img src="../../images/delete.png" alt="excluir"></a></td>
        </tr>
        {/foreach}
    </tbody>

</table>

{a action="inserir" controller="noticias" class="insert" class="button"}Novo Post{/a}

{/block}