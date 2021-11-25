{include 'templates/header.tpl'}

<h1>{$title} </h1>
<div>
{if count($film) == 0}
<p> There are no films by this director </p>
{/if}
    <ul>
        {foreach from=$film item=$film}
        <li>
            <p> {$film->title} {$film->description}, {$film->category} - {$film->date}
            </p>

        </li>
        {/foreach}
    </ul>
</div>

{include 'templates/footer.tp'}