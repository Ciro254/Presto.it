<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Category;
use Livewire\Component;

class CreateAnnouncement extends Component
{
    public $title;
    public $body;
    public $price;
    public $category;

    protected $rules=[
        'title'=>'required|min:4',
        'body'=>'required|min:8',
        'price'=>'required|numeric',
        'category'=>'required',
    ];

    protected $messages=[
     'required'=>'Campo obbligatorio',
     'min'=>'Caratteri insufficienti',
    ];

    public function store() {
        $this->validate();
        $category=Category::find($this->category);
        //dd($category);
        $category->announcements()->create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
        ]);
        
        // Announcement::create(
        // [
        //  'title' => $this->title,
        //  'body' => $this->body,
        //  'price' => $this->price,
        // ]);      
        session()->flash('message','Annuncio inserito con successo!');
        $this->clear();
    }

    public function updated($propertyName){
     $this->validateOnly($propertyName);
    }

    public function clear(){
        $this->title='';
        $this->body='';
        $this->price='';
        $this->category='';
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
