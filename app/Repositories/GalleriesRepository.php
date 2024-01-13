<?php

namespace App\Repositories;

use App\Models\Gallery;

class GalleriesRepository extends Repository
{
	public function __construct(Gallery $gallery) {

		$this->model = $gallery;
	}

	public function addImagetoGallery($fields) {
		$data = $fields->except('_token');

		$image = $this->resizeAndUploadImage($fields, 'gallery');		

		if($image) {
			$data['image'] = $image;	
		}

		$data['published'] = isset($data['published']) ? 1 : 0;
		
		$this->model->fill($data);

		if($this->model->save()) {
			return ['status' => 'Image added!'];
		}
	}

	public function updateImagetoGallery($fields, $gallery) {
		$data = $fields->except('_token', 'method', 'old_image');

		if(isset($data['image'])) {
			$image = $this->resizeAndUploadImage($fields, 'gallery');		

			if($image) {
				$data['image'] = $image;	
			}

			$this->deleteImage($gallery, 'gallery');
		} 

		$data['published'] = isset($data['published']) ? 1 : 0;

		$gallery->fill($data);
		
		if($gallery->update()) {
			return ['status' => 'Image updated!'];
		}
	}

	public function deleteImagetoGallery($gallery) {
		
		$this->deleteImage($gallery, 'gallery');

		if($gallery->delete()) {
			return ['status' => 'Image deleted!'];
		}
	}
}

?>