<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    use WithPagination;
    public $title;
    public $content;
    public $posts;
    public $searchTerm; 

    public function render()
    {
        
       $query = Post::query();
        
        if ($this->searchTerm) {
            $query->where('title', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('content', 'like', '%' . $this->searchTerm . '%');
        }

        $postdata = $query->simplePaginate(5);

        return view('livewire.post-component',compact('postdata'));
    }
  
    // public function searchPosts()
    // {
    //     $this->resetPage(); // Reset pagination when searching
    // }

  
    public function savePost()
    {
        $this->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->title = '';
        $this->content = '';
       
    }

    public function deletePost($postId)
    {
        // Find the post by its ID and delete it
        $post = Post::find($postId);

        if ($post) {
            $post->delete();
        }

        // Refresh the posts list after deletion
        $this->posts = Post::orderBy('created_at', 'desc')->get();
    }

    public $editPostId;
    public $editedTitle;
    public $editedContent;

    public function editPost($postId)
    {
        $post = Post::find($postId);

        if ($post) {
            $this->editPostId = $post->id;
            $this->editedTitle = $post->title;
            $this->editedContent = $post->content;
        }
    }

    public function updatePost()
    {
        $this->validate([
            'editedTitle' => 'required|string',
            'editedContent' => 'required|string',
        ]);

        $post = Post::find($this->editPostId);

        if ($post) {
            $post->update([
                'title' => $this->editedTitle,
                'content' => $this->editedContent,
            ]);

            // Clear edit mode and reset values
            $this->editPostId = null;
            $this->editedTitle = '';
            $this->editedContent = '';

            // Refresh the posts list
            $this->posts = Post::orderBy('created_at', 'desc')->get();
        }
    }
}
