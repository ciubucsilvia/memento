<?php

namespace App\Repositories;

use App\Models\Slider;
use Lang;
use DB;

class SlidersRepository extends Repository
{
	public function __construct(Slider $slider) {

		$this->model = $slider;
	}

	public function addSlider($fields) {
		$data = $fields->except('_token');

		$image = $this->resizeAndUploadImage($fields, 'sliders');		

		if($image) {
			$data['image'] = $image;	
		}
		
		$this->model->fill($data);

		$this->model->save();
	}

	public function updateSlider($fields, $slider) {

		$data = $fields->except('_token', 'method', 'old_image');

		if(isset($data['image'])) {
			$image = $this->resizeAndUploadImage($fields, 'sliders');		

			if($image) {
				$data['image'] = $image;	
			}

			$this->deleteImage($slider, 'sliders');
		}

		$slider->fill($data);
		
		if($slider->update()) {
			return ['status' => 'Slider updated!'];
		}
	}

	public function deleteSlider($slider) {
		$this->deleteImage($slider, 'sliders');

		if($slider->delete()) {
			return ['status' => 'Slider deleted!'];
		}
	}
}

?>