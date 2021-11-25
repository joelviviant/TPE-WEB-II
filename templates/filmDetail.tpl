{include 'templates/header.tp'}
<div class="container">
    <h1>{$title}</h1>

    <div class="row">
        <h2>{$film->title} - {$film->name}, {$film->last-name}</h2>
        <p>{$film->description}</p>
        <p>{$film->category} - {$film->date}</p>
    </div>
</div>


{include 'templates/footer.tp'}