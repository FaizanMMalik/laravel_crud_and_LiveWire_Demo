<!-- resources/views/livewire/post-component.blade.php -->

<div>
    <h1>Posts</h1>

    <form wire:submit.prevent="savePost">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" wire:model="title" class="form-control">
            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea wire:model="content" class="form-control"></textarea>
            @error('content')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Post</button>
    </form>

    <hr>
      
    <h2>Search Posts</h2>
    <div class="form-group">
        <label for="searchTerm">Search Term</label>
        <input type="text" wire:model.lazy="searchTerm" class="form-control">
    </div>

    <hr>
    <h2>Recent Posts</h2>
   





        <ul>
       
            @foreach ($postdata as $post)
                <li><b>Title:</b> {{ $post->title }}</li>
                <p><b>Content:</b> {{ $post->content }}</p>

                <!-- Edit button -->
                <button wire:click="editPost({{ $post->id }})" class="btn btn-primary">Edit</button>
                <!-- Delete button -->
                <button wire:click="deletePost({{ $post->id }})" class="btn btn-danger">Delete</button>

                <!-- Edit form -->
                @if ($editPostId === $post->id)
                    <form wire:submit.prevent="updatePost">
                        <input type="hidden" wire:model="editPostId">
                        <div class="form-group">
                            <label for="editedTitle">Edited Title</label>
                            <input type="text" wire:model="editedTitle" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="editedContent">Edited Content</label>
                            <textarea wire:model="editedContent" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                @endif

                <hr>
           
                @endforeach
                {{ $postdata->links() }}
        </ul> 
        
       
     
</div>

<script>
    Livewire.on('postAdded', function() {
        // Clear the form fields after adding a post
        Livewire.emit('resetFields');
    });
</script>
