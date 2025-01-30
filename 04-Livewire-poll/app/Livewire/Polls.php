<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Polls extends Component
{
    use WithPagination, WithoutUrlPagination;

    // protected $listeners = [
    //     'pollCreated' => 'render'
    // ];
    #[On('pollCreated')]
    public function render()
    {
        $polls = Poll::with('options.votes')->latest()->paginate(4);
        return view('livewire.polls', ['polls' =>$polls]);
    }
    
    public function vote(Option $option){
        $option->votes()->create();
    }
}
