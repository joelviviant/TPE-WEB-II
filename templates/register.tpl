{include 'templates/header.tp'}

<div class="container" style="width: 70rem">
    <h2 class="text-uppercase fw-bolder container">{$title}</h2>
    <form action="verify-register" method="POST" style="width: 30rem">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input class="form-control" type="text" name="name" placeholder="Name" />
            <label class="form-label">Email</label>
            <input class="form-control" type="text" name="email" placeholder="Email" />
            <label class="form-label">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Password" />
        </div>
        <h4 class="alert-danger">{$error}</h4>
        <button class="btn btn-primary" type="submit">Create account</button>
    </form>
</div>


{include 'templates/footer.tp'}