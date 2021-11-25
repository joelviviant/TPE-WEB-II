{include 'templates/header.tp'}

<h1 class="text-uppercase fw-light container" style="width: 60rem">{$title}</h1>

<div class="card container mb-5" style="width: 60rem">
    <ul class="list-group list-group-flush">
        {foreach from=$directors item=$director}
        <li class="list-group-item">
            <p> {$director->name}, {$director->last-name} ({$director->date}), {$director->about_the_director}- &nbsp;
             <a class="btn btn-link btn-sm" href="directors/films/{$director->id_director}">Show Films</a>
                {if $isLogged && $isAdmin}
                    <button class="btn"> <a class="btn btn-danger" href='directors/edit/{$director->id_director}'>Edit </a></button>
                    <button class="btn"> <a class="btn btn-warning" href="directors/delete/{$director->id_director}">Delete</a> </button>
                {/if}
            </p>
        </li>
        {/foreach}
    </ul>
</div>

{if $isLogged && $isAdmin}
<div class="container" style="width: 60rem; margin-bottom:10%;">
    <h2 class="text-primary m-3">Add Director</h2>
        <form style="width: 30rem" class="mb-3" action="directors/add" method="POST">
    <label class="form-label">Name</label>
    <input class="form-control"  name="name" type="text" placeholder="Name" >
    <label class="form-label">Last Name</label>
    <input class="form-control" name="last-name" type="text" placeholder="Last Name">
    <label class="form-label">Date</label>
    <input class="form-control"  name="date" type="date" placeholder="Date">
    <label class="form-label">About the director</label>
    <textarea class="form-control" name="About-the-director" type="text" placeholder="About the director">
    </textarea>

     <button class="btn btn-primary m-2" type="submit">Add</button>

        </form>
</div>
{/if}

{include 'templates/footer.tp'}