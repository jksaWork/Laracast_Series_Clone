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
        $roles =  [
            'title' => 'required',
            'description' => 'required',
            'image_url' => 'nullable',
        ];
        // if()
        if (request()->method() != 'PUT')
            $roles['image_url'] = 'required';
        return $roles;
    }

    public function StoreImage()
    {
        $this->slug = Str::slug($this->title);
        if ($this->image_url) {
            $ext = '.' . $this->image_url->getClientOriginalExtension();
            $this->imageUrl = $this->image_url->storePubliclyAs('series', $this->slug . $ext);
        }
        return $this;
    }

    public function StoreSeries()
    {
        $data = $this->validated();

            $data['image_url'] = $this->imageUrl;
        $data['slug'] = $this->slug;
        $series =  Series::create($data);
        return $series;
    }

    public function UpdateSeries(Series $series)
    {
        $data = $this->validated();
        if ($this->image_url) {
            $data['image_url'] = $this->imageUrl;
        } // check if request has Image
        $data['slug'] = $this->slug;
        $isUpdated = $series->update($data);
        return $series->fresh();
    }
}
