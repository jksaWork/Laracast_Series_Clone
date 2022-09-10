<?php

namespace App\Http\Requests;

use App\Models\Series;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
class SeriresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

     public $imageUrl;
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image_url' => 'required',
            'title' => 'required',
            'description' => 'required',
        ];
    }

    public function StoreImage(){
        $ext = '.' .$this->image_url->getClientOriginalExtension();
        $this->slug = Str::slug($this->title) ;
        $this->imageUrl = $this->image_url->storePubliclyAs( 'series', $this->slug . $ext);
        return $this;
    }

    public function StoreSeries(){
        $data = $this->validated();
        $data['image_url'] = $this->imageUrl;
        $data['slug'] = $this->slug;
        $series =  Series::create($data);
        return $series;
    }
}
