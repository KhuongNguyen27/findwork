<?php
 
namespace App\View\Composers;
 
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
 
class PostComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct() {}
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        // $items = Post::where('status',1)->limit(10)->get();
        // $view->with('shared_posts', $items);
        $careerGuidePosts = Post::where('status', 1)->where('category', 1)->limit(100)->get();
        $entertainmentPosts = Post::where('status', 1)->where('category', 2)->limit(100)->get();

        $view->with('careerGuidePosts', $careerGuidePosts)
             ->with('entertainmentPosts', $entertainmentPosts);
    }
}