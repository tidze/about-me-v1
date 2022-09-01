<div {{ $attributes }}>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        {{ $name }}
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $message }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="event.preventDefault();    
                        document.getElementById('{{ $formName }}').submit();">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Hidden Form With Delete Method -->
    {{-- <form action="{{ route('user.post.delete', ['user_id' => $post->user_id, 'post_id' => $post->id]) }}" --}}
        {{-- method="POST" id="{{ $form }}" class="d-none">@csrf --}}
        {{-- @method('delete') --}}
    {{-- </form> --}}
</div>
