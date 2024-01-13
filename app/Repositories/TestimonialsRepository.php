<?php

namespace App\Repositories;

use App\Models\Testimonial;

class TestimonialsRepository extends Repository
{
	public function __construct(Testimonial $testimonial) {

		$this->model = $testimonial;
	}

	public function addTestimonial($fields) {
		$data = $fields->except('_token');

		$image = $this->resizeAndUploadImage($fields, 'testimonials');		

		if($image) {
			$data['image'] = $image;	
		}

		$this->model->fill($data);
		
		if($this->model->save()) {
			return ['status' => 'Testimonial ' . $this->model->name . ' added!'];
		}
	}

	public function updateTestimonial($fields, $testimonial) {
		$data = $fields->except('_token', 'method', 'old_image');

		if(isset($data['image'])) {
			$image = $this->resizeAndUploadImage($fields, 'testimonials');		

			if($image) {
				$data['image'] = $image;	
			}

			$this->deleteImage($testimonial, 'testimonials');
		} 

		$testimonial->fill($data);
		
		if($testimonial->update()) {
			return ['status' => 'Testimonial ' . $testimonial->name . ' updated!'];
		}
	}

	public function deleteTestimonial($testimonial) {
		
		$this->deleteImage($testimonial, 'testimonials');
		$testimonialName = $testimonial->name;

		if($testimonial->delete()) {
			return ['status' => 'Testimonial ' . $testimonialName . ' deleted!'];
		}
	}
}

?>