<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
    </tr>
    
    @if (!$posts->count())
    
        <p>There are no no any posts.</p>
    
    @else
    
        @foreach($posts as $post)
            <tr>
                <td>
                    {{ $post->id }}
                </td>
                <td>
                    {{ $post->title }}
                </td>
            </tr>
        @endforeach
    
    @endif
    
</table>