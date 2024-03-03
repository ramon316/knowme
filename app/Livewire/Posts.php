<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;
use Livewire\WithFileUploads;

class Posts extends Component
{
    use WithPagination;
    use WithFileUploads;


    public $perPage = 10;
    public $sortField = 'category';
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    //Form Field
    public $rId = null;
    public $isFormOpen = false;
    public $title, $content, $category, $image;
    //Action
    public $dId = '';
    public $isDeleteModalOpen = false;


    public function sortBy($field)
    {
        $this->sortDirection = $this->sortField === $field ?
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc'
            : 'asc';
        $this->sortField = $field;
    }

    // For Delete Feature Start
    public function deleteId($id)
    {
        $this->dId = $id;
        $this->isDeleteModalOpen = true;
    }

    public function closeDelete()
    {
        $this->dId = '';
        $this->isDeleteModalOpen = false;
    }

    public function delete()
    {
        try {
            $post = Post::find($this->dId);
            if ($post) {
                $post->delete();
                Storage::delete($post->image);
            }
            $this->closeDelete();
            session()->flash('success', 'Record deleted successfully!!');
        } catch (\Exception $ex) {
            session()->flash('success', 'Something goes wrong!!');
        }
    }
    // For Delete Feature End

    // Create and Update Feature Start
    public function edit($id = null)
    {
        try {
            $this->rId = $id;
            if (!empty($this->rId)) {
                $post = Post::find($this->rId);
                if ($post) {
                    $this->title = $post->title;
                    $this->content = $post->content;
                }
            }
            $this->isFormOpen = true;
        } catch (\Exception $ex) {
            session()->flash('success', 'Something goes wrong!!');
        }
    }

    public function save()
    {
        $ruleFields = [
            'title' => 'required',
            'content'   =>  'required',
            'category'  =>  'required',
            'image'     =>  'required'
        ];
        $ruleMessages =  [
        'title.required'   =>  'El título es requerido',
        'content.required'  =>  'El contenido del post es requerido',
        'category.required' =>  'La categoria del post es requerida',
        'image.required'    =>  'La imagen del post es requerida'];

        $validatedData = $this->validate($ruleFields, $ruleMessages);

        try {
            $postQuery = Post::query();

            if (!empty($this->rId)) {
                $post = $postQuery->find($this->rId);
                if ($post) {
                    $post->update($validatedData);
                }
            } else {
               $image =  $this->image->store('public/posts');
                /* $postQuery->create($validatedData); */
                Post::create([
                    'title' =>  $this->title,
                    'content'   =>  $this->content,
                    'image'     =>  $image,
                    'category'  =>  $this->category,
                ]);
            }
            $this->closeFormModal();
        } catch (\Exception $ex) {
            flasher('No se ingreso la información', 'error');
        }
    }

    public function closeFormModal()
    {
        $this->isFormOpen = false;
        $this->image = '';
        $this->reset();
        $this->resetValidation();
    }
    // Create and Update Feature End

    public function render()
    {
        return view('livewire.posts', [
            'value' =>  'Awesome <strong> Sauce</strong>',
            'records' => Post::orderBy($this->sortField, $this->sortDirection)
                ->paginate($this->perPage)
        ])->layout('layouts.app');
    }
}
