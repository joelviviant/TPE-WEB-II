{include 'templates/header.tp'}
{if !isset($error)}
<h2 class="text-uppercase fw-light container" style="width: 40%">{$title}</h2>
<form class="container mb-3" style="width: 40%" action="usuarios/edit/{$id}" method="POST">
    <label class="form-label">Name</label>
    <input class="form-control" name="name" type="text" placeholder="Name" value="{$name}">
    <label class="form-label">Email</label>
    <input class="form-control" name="mail" type="email" placeholder="Email" value="{$mail}">
    <label class="form-label">Type</label>
    <select class="form-select" name="Type" type="text" placeholder="Type">
         <option value="">Choose Type</option>
         {if $type == 'admin'}
            <option value="admin" selected>Admin</option>
            <option value="no-admin">No-Admin</option>
         {/if}
         {if $type == 'no-admin'}
            <option value="admin">Admin</option>
            <option value="no-admin" selected>No-Admin</option>
        {/if}
    </select>
    <button class="btn btn-warning m-2" type="submit">Edit</button>
</form>
{/if}
 {if isset($error)}
    <p>{$error}</p>
{{/if}}


{include 'templates/footer.tp'}