<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategotyDropdown extends Component
{


    /**
     * Get the view / contents that represent the component.
     *
     */
    public function render()
    {
        $categories =  Category::all();
        return view('components.categoty-dropdown' ,
            [
                'categories' => $categories,
                'currentCategory' => $categories->firstWhere('slug' , request('category'))
            ]
        );
    }
}
