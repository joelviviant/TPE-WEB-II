{include 'templates/header.tp'}

<form class="container mb-3" style="width: 60rem" action="directors/edit/{$id}" method="POST">
    <label class="form-label">Name</label>
    <input class="form-control" name="name" type="text" placeholder="Name" value="{$name}">
    <label>Last Name</label>
    <input class="form-control" name="Last Name" type="text" placeholder="Last Name" value="{$Last Name}">
    <label class="form-label">Date</label>
    <input class="form-control" name="Date" type="date" placeholder="Date" value="{$Date}">
    <label class="form-label">About the director</label>
    <textarea class="form-control" name="About the director" type="text" placeholder="About the director">
        {$About the director}
    </textarea>
    <button class="btn btn-warning m-2" type="submit">Edit</button>
</form>

{include 'templates/footer.tp'}