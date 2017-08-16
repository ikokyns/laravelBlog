<p>Hello {{ $post->user->name }} </p>

<p>Yoy have new comment on your post
	<a href="{{ url('posts/' . $post->id) }}">
		{{ $post->title }}
	</a>
</p>