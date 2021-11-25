{include 'templates/header.tp'}

<h1 class="text-uppercase fw-light container" style="width: 60rem">{$title}</h1>

<div class="card container" style="width: 60rem; margin-bottom: 5%;">
    <ul class="list-group list-group-flush">
        {foreach from=$films item=$film}
        <li class="list-group-item">
            <p> {$film->title} ({$film->name}, {$film->last-name}) <a class="btn btn-link btn-sm"
                    href="films/detalle/{$film->id_film}">
                    Ver más</a>
                {if $isLogged && $isAdmin}
                <button class="btn"> <a class="btn btn-warning " href='films/edit/{$film->id_film}'>Edit
                    </a></button>
                <button class="btn"> <a class="btn btn-danger " href="films/delete/{$film->id_film}">Delete</a>
                </button>
                {/if}
            </p>

        </li>
        {/foreach}
    </ul>

    <div class="container mt-3 mb-3">

        <div class="row justify-content-center align-items-center">

            {for $page=1 to $countPag}
            <div class="col-1">
            </div>
            {/for}


        </div>
    </div>
</div>


{if $isLogged && $isAdmin}
<div class="container" style="width: 60rem; margin-bottom: 5%;">
    <h2 class="text-primary m-3">Add film</h2>
    <form class="mb-3" action="film/add" method="POST" style="width: 30rem">
        <label class="form-label">Title</label>
        <input class="form-control" name="title" placeholder="title">
        <label class="form-label">Description</label>
        <input class="form-control" name="description" placeholder="description">
        <label class="form-label">Category</label>
        <input class="form-control" name="category" placeholder="category">
        <label class="form-label">Date</label>
        <input class="form-control" name="date" type="number" placeholder="Date">
        <label class="form-label" for="director">Director</label>
        <select class="form-select" name="director">
            {foreach from=$directors item=$director}
            <option value="{$director->id_director}">{$director->name}, {$director->last-name} </option>
            {/foreach}
        </select>

        <button class="btn btn-primary m-2" type="submit">Add</button>

    </form>
    {/if}




</div>


{include 'templates/footer.tp'}