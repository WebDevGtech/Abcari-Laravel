<?php

namespace App\Http\Livewire\BarAdmin\RatingAndReview;
use App\Models\Rating;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BarRestaurant;
use Illuminate\Support\Facades\Auth;
class RatingAndReview extends Component
{
    use withPagination;
   public $search;

    public function render()
    {
        $search=$this->search.'%';
$bar=BarRestaurant::where('user_id',Auth::id())->first();
//dd($bar->id);
       // $rating=Rating::all();
        $rating=Rating::where([['bar_restaurant_id',$bar->id],['id','LIKE',$search]])->paginate(15);
       // dd($rating);
        return view('livewire.bar-admin.rating-and-review.rating-and-review',['ratings'=>$rating]);
    }
}
