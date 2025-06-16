@foreach($posts as $post)
<section class="card">
    <div class="card-body">
        <div class="fb-user-thumb">
            <img src="{{ $post->user->fotoperfil ?? asset('img/pro-ac-1.png') }}" alt="{{ $post->user->name }}">
        </div>
        <div class="fb-user-details">
            <h3><a href="#">{{ $post->user->name }}</a></h3>
            <p>{{ $post->created_at->diffForHumans() }}</p>
        </div>
        <div class="clearfix"></div>
        <p class="fb-user-status">{{ $post->conteudo }}</p>

        @if($post->imagem)
        <div class="fb-status-container fb-border">
            <img src="{{ $post->imagem }}" alt="Imagem do post" style="max-width: 100%; border-radius: 4px; margin-top: 10px;">
        </div>
        @endif

        <div class="fb-status-container fb-border">
            <div class="fb-time-action">
                <a href="#" title="Like this">Like</a>
                <span>-</span>
                <a href="#" title="Leave a comment">Comments</a>
                <span>-</span>
                <a href="#" title="Share this post">Share</a>
            </div>
        </div>
    </div>
</section>
@endforeach
