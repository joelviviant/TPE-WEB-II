{include 'templates/header.tp'}
<div class="container" style="width: 60rem">
    <h1 class="text-uppercase fw-bolder container">{$title}</h1>
    <form action="verify" method="POST" style="width: 30rem">
        <div class="mb-3">
            <label class="form-label">User (email)</label>
            <input class="form-control" aria-describedby="passwordHelpBlock" type="email" name="email" placeholder="Email" required>

            <label class="form-label">Password</label>
            <input class="form-control" aria-describedby="passwordHelpBlock" type="password" name="password" placeholder="Password" required>

        </div>
        <h4 class="alert-danger" >{$error}</h4>
        <button  class="btn btn-primary" type="submit">Login</button>
    </form>

</div>
{include 'templates/footer.tp'}