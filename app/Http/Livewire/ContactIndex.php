<?php

namespace App\Http\Livewire;

use App\Contact;
use App\Models\Master\Kategori;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $statusUpdate = false;
    public $paginate = 5;
    public $cari = "all";
    public $search;

    protected $listeners = [
        'contactStored' =>'handleStored',
        'contactUpdated' =>'handleUpdated'
    ];

    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        // return view('livewire.contact-index', [
        //     'contacts' => $this->search === null ?
        //     Contact::orderBy('id', 'desc')->paginate($this->paginate) :
        //     Contact::orderBy('id', 'desc')->where('name', 'like', '%'.$this->search. '%')->paginate($this->paginate),
        //     'kategori' => Kategori::get()
        // ]);
        if($this->search === null && $this->cari === 'all') {
            $contacts = Contact::orderBy('id', 'desc')->paginate($this->paginate);
        } else if($this->search === null && $this->cari != 'all') {
            $contacts = Contact::orderBy('id', 'desc')->where('kategori_id', $this->cari)->paginate($this->paginate);
        } else {
            $contacts = Contact::orderBy('id', 'desc')->where('name', 'like', '%'.$this->search. '%')->where('kategori_id', $this->cari)->paginate($this->paginate);
        }
        $kategori = Kategori::get();
        return view('livewire.contact-index', compact('contacts', 'kategori'));
    }

    public function getContact($id)
    {
        $this->statusUpdate = true;
        $contact = Contact::find($id);
        $this->emit('getContact', $contact);
    }

    public function destroy($id)
    {
        if($id) {
            $data = Contact::find($id);
            $data->delete();
            session()->flash('message', 'Contact was deleted');
        }
    }

    public function handleStored($contact)
    {
        session()->flash('message', 'Contact '. $contact['name'] .' was stored');
    }

    public function handleUpdated($contact)
    {
        $this->statusUpdate = false;
        session()->flash('message', 'Contact '. $contact['name'] .' was updated');
    }
}
