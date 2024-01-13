<?php

namespace App\Repositories;

use App\Models\Faq;
use Lang;

/**
* 
*/
class FaqsRepository extends Repository
{
	public function __construct(Faq $faq) {
		$this->model = $faq;
	}

	public function addFaq($request) {
		$fields = $request->except('_token');

		$fields['published'] = isset($fields['published']) ? 1 : 0;

		$this->model->fill($fields);

		if($this->model->save()) {
			return ['status' => 'Faq added'];
		}
	}

	public function updateFaq($request, $faq) {
		
		$fields = $request->except('_token');

		$fields['published'] = isset($fields['published']) ? 1 : 0;

		$faq->fill($fields);

		if($faq->update()) {
			return ['status' => 'Faq updated'];
		}
	}

	public function deleteFaq($faq) {
		if($faq->delete()) {
			return ['status' => 'Faq deleted'];
		}
	}
}

?>