<?php

namespace App\Repositories;

use App\Models\Page;
use Lang;
use DB;

class PagesRepository extends Repository
{
	public function __construct(Page $page) {

		$this->model = $page;
	}

	public function addPage($request) {
		$fields = $request->except('_token');

		if(empty($fields)) {
			return ['error' => 'No informations'];
		}

		// $result = $this->verificationAlias($request);
		
		// if(isset($result) && !isset($result['error'])) {
		// 	$fields['alias'] = $result;
		// } else {
		// 	return $result;
		// }

		$fields['published'] = isset($fields['published']) ? 1 : 0;

		$this->model->fill($fields);
		
		if($this->model->save()) {
			return ['status' => 'Page ' . $this->model->title . ' added!'];
		}
	}

	public function updatePage($request, $page) {
		
		$fields = $request->except('_token', '_method');

		if(empty($fields)) {
			return ['error' => 'No informations'];
		}

		// $result = $this->verificationAlias($request, $page);

		// if(isset($result) && !isset($result['error'])) {
		// 	$fields['alias'] = $result;
		// } else {
		// 	return $result;
		// }

		$fields['published'] = isset($fields['published']) ? 1 : 0;

		$page->fill($fields);
		
		if($page->update()) {
			return ['status' => 'Page ' . $page->title . ' updated!'];
		}
	}

	public function deletePage($page) {
		$page_title = $page->title;

		if($page->delete()) {
			return ['status' => 'Page ' . $page_title . ' deleted!'];
		}

	}
}

?>