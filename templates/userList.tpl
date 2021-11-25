{include 'templates/header.tp'}

<h1 class="text-uppercase fw-light container" style="width: 60rem">{$title}</h1>

<div class="card container" style="width: 60rem">
    <ul class="list-group list-group-flush">
        {foreach from=$users item=$user}
        <li class="list-group-item">
            <p> {$user->name}: {$user->mail}, {$user->type}
                {if $isLogged && $isAdmin}
                <button class="btn"> <a class="btn btn-danger" href='users/edit/{$user->id_user}'>Edi
                    </a></button>
                <button class="btn"> <a class="btn btn-warning"
                        href="users/delete/{$user->id_user}">Delete</a> </button>
                {/if}
            </p>
        </li>
        {/foreach}
    </ul>
</div>


{include 'templates/footer.tp'}