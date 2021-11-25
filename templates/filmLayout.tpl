{include 'templates/header.tp'}

<div class= "container">
    <h1 id="title" data-book="{$film->id_film}">{$title}</h1>

    <div>
        <h2>{$film->title} - {$film->name}, {$film->last-name}</h2>
        <p>{$film->description}</p>
        <p>{$film->category} - {$film->date}</p>
    </div>

    <div id="remarks" data-isLogged="{$isLogged}" data-isAdmin="{$isAdmin}">
        {include 'vue/remarks.tp'}
         <div class="row" style="margin-bottom: 10%;">
        {if $isLogged}
        <h2>Add remark</h2>
        <form id="form" method="POST">
            <label class="form-label">Add remark</label>
            <input class="form-control"  name="remark" placeholder="remark">
            <label class="form-label">How much grade do you give it?</label>

            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name='qualification'>
                <option selected>Qualification</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <button id="test" class="btn btn-primary m-2" type="submit">Add</button>
        </form>
        {/if}
    </div>
    </div>
</div>


<script src="js/remarks.js"></script>
{include 'templates/footer.tp'}
