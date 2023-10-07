<?php

namespace App\Repositories;

use App\Article;
use Auth;

/**
* 
*/
class ArticlesRepository extends Repository
{
	public function __construct(Article $article) {
		$this->model = $article;
	}

	public function addArticle($request) {
		$fields = $request->except('_token');
	
		$result = $this->verificationAlias($request);
		
		if(isset($result) && !isset($result['error'])) {
			$fields['alias'] = $result;
		} else {
			return $result;
		}

		$fields['published'] = isset($fields['published']) ? 1 : 0;

		$image = $this->resizeAndUploadImage($request, 'articles');		

		if($image) {
			$fields['image'] = $image;	
		}

		$fields['user_id'] = Auth::user()->id;

		$this->model->fill($fields);

		if($this->model->save()) {
			return ['status' => 'Article ' . $this->model->title . ' added'];
		}
	}

	public function updateArticle($request, $article) {
		
		$fields = $request->except('_token', '_method', 'old_image');

		$result = $this->verificationAlias($request, $article);

		if(isset($result) && !isset($result['error'])) {
			$fields['alias'] = $result;
		} else {
			return $result;
		}

		$fields['published'] = isset($fields['published']) ? 1 : 0;

		if(isset($fields['image'])) {
			$image = $this->resizeAndUploadImage($request, 'articles');		

			if($image) {
				$fields['image'] = $image;	
			}

			$this->deleteImage($article, 'articles');
		}

		$article->fill($fields);

		if($article->update()) {
			return ['status' => 'Article ' . $article->title . ' updated'];
		}
	}

	public function deleteArticle($article) {
		$article->comments()->delete();

		$this->deleteImage($article, 'articles');

		$articleTitle = $article->title;

		if($article->delete()) {
			return ['status' => 'Article ' . $articleTitle . ' deleted'];
		}
	}

	public function getArticles($config_paginate) {
		
		 $builder = $this->model->orderBy('created_at', 'desc');
		
		return $this->check($builder->paginate($config_paginate));
	}
}