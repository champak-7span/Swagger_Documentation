<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Traits\FilterTrait;
use App\Traits\PaginationTrait;
use App\Library\AssetHelper;

class CategoryService
{
    private $category;
   
    use PaginationTrait, FilterTrait;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function collection($inputs = null)
    {
        $inputs = $this->paginationAttribute($inputs);
        $query =  $this->category->select('*');
           
        if (isset($inputs['search'])) {
            $query->search($inputs['search']);
        }
       

         $this->filterInput($query, $inputs);

        // if (!isset($inputs['sort'])) {
        //     $query->orderBy('id', 'desc');
        // }
        
        // $this->sortInput($query, $inputs);
        $inputs['limit'] = $inputs['limit'] == -1 ? $query->count() : $inputs['limit'];

        $query = $query->paginate($inputs['limit'], ['*'], 'page', $inputs['page']);
        return $query;

    }

    public function resource($id, $inputs = null)
    {
       return $this->category->findOrFail($id);
    }

    public function store($inputs = null)
    {   
        if (!empty($inputs['image'])){
            $path = public_path('').'/uploads/';
            $imagename = AssetHelper::fileUpload($path,$inputs['image']);
            $inputs['image'] = 'uploads/'.''.$imagename;
        }
    
        $category = $this->category->create($inputs);
        return $category;
    }

    protected static function createFileName()
    {
        return (string) Str::uuid();
    }

    public function update($id, $inputs = null)
    {
        $category = $this->resource($id);
        $category->update($inputs);
        return $category;
    }

    public function delete($id)
    {
        $category = $this->resource($id);
        $category->delete();
        $data['message'] = __('entity.entityDeletedSuccessfully', [ 'entity' => 'Category'] );
        return $data;

    }
}
