<ul class="list-unstyled">
    @foreach($microposts as $micropost)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{Gravatar::src($user->email,50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show',$micropost->user->name,['id'=>$micropost->user->id]) !!}<span class="text-muted">posted at {{ $micropost->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                    
                </div>
                <div class="d-sm-flex">
                    <div class="mr-1">
                        @if(Auth::id()==$micropost->user_id)
                            {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                    <div class=ml-1>
                        @include('user_favorite.favorite_button',['favorites'=>$micropost])
                    </div>
                </div>
                <div>
                    
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{$microposts->render('pagination::bootstrap-4') }}