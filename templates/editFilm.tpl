{include 'templates/header.tp'}

<form class="container mb-3" style="width: 60rem" action="films/edit/{$id}" method="POST">
    <label class="form-label">Title</label>
    <input class="form-control"  name="title" placeholder="title" value="{$title}">
    <label class="form-label">Description</label>
    <input class="form-control"  name="description" placeholder="description" value="{$description}">
    <label class="form-label">Category</label>
    <input class="form-control"  name="category" placeholder="category" value="{$category}">
    <label class="form-label">Año</label>
    <input class="form-control" name="date" type="number" placeholder="Year" value="{$date}">
    <button class="btn btn-warning m-2" type="submit">Edit</button>
</form>

{include 'templates/footer.tp'}