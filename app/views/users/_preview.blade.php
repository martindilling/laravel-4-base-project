<div class="col-md-12">
    <article>
        <a href="{{ route('users.show', array('id' => $user->id)) }}">
            <h1>{{ $user->present()->fullName }}</h1>
        </a>
        <div class="email">{{ $user->present()->email }}</div>
    </article>
    <hr>
</div>

