<?php

namespace App\Repositories;

use App\Models\Portfolio;
use Lang;
use DB;
use Auth;

class PortfoliosRepository extends Repository
{
	public function __construct(Portfolio $portfolio) {
		$this->model = $portfolio;
	}

	public function addPortfolio($request) {
		$fields = $request->except('_token');
		
		// $result = $this->verificationAlias($request);
		
		// if(isset($result) && !isset($result['error'])) {
		// 	$fields['alias'] = $result;
		// } else {
		// 	return $result;
		// }

		$fields['published'] = isset($fields['published']) ? 1 : 0;

		$image = $this->resizeAndUploadImage($request, 'portfolios');		

		if($image) {
			$fields['image'] = $image;	
		}

		$fields['user_id'] = Auth::user()->id;

		$this->model->fill($fields);

		if($this->model->save()) {
			return ['status' => 'Portfolio ' . $this->model->title . ' added'];
		}
	}

	public function updatePortfolio($request, $portfolio) {
		
		$fields = $request->except('_token', '_method', 'old_image');

		// $result = $this->verificationAlias($request, $portfolio);

		// if(isset($result) && !isset($result['error'])) {
		// 	$fields['alias'] = $result;
		// } else {
		// 	return $result;
		// }

		$fields['published'] = isset($fields['published']) ? 1 : 0;

		if(isset($fields['image'])) {
			$image = $this->resizeAndUploadImage($request, 'portfolios');		

			if($image) {
				$fields['image'] = $image;	
			}

			$this->deleteImage($portfolio, 'portfolios');
		}

		$portfolio->fill($fields);

		if($portfolio->update()) {
			return ['status' => 'Portfolio ' . $portfolio->title . ' updated'];
		}
	}

	public function deletePortfolio($portfolio) {
		$this->deleteImage($portfolio, 'portfolios');
		
		$portfolioTitle = $portfolio->title;

		if($portfolio->delete()) {
			return ['status' => 'Portfolio ' . $portfolioTitle . ' deleted'];
		}
	}

	public function getPortfolios($category, $config_paginate) {
		
		 $builder = $this->model;

		 if($category) {
			$builder->where('category_id', $category->id);
		 }
		 
		$builder->orderBy('created_at', 'desc');
		
		return $this->check($builder->paginate($config_paginate));
	}
}

?>