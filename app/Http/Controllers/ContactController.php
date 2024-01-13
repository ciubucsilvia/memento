<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\Contact as MailContact;
use Lang;
use Illuminate\Support\Arr;
use App\Models\Contact;
use Mail;

class ContactController extends BaseController
{
    public function __construct() {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Models\Menu), new \App\Repositories\ArticlesRepository(new \App\Models\Article), new \App\Repositories\IconsRepository(new \App\Models\Icon));

        $this->bar = 'left';

        $this->template = $this->theme . '.contact';

        $this->pageTitle = true;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = "Contact";

        $map = view($this->theme . '.parts.map');
        $this->vars = Arr::add($this->vars, 'map', $map);

        $fields_contact = Lang::get('site.contact')['fields_contact'];
        
        $this->content = view($this->theme . '.contactContent')
                            ->with('fields_contact', $fields_contact)
                            ->render();

        $this->getContentLeftBar();

        return $this->renderOutput();
    }

    protected function getContentLeftBar() {
        $last_articles = $this->a_rep->getLast(['title', 'image', 'created_at', 'alias'], $this->config['contact_last_article'], ['created_at', 'desc'], true);

        $this->contentRightBar = view($this->theme . '.contactBar')
                                ->with('articles', $last_articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $contact = new Contact;
        $contact->fill($request->all());

        $this->sendEmailReminder($request->all());

        if($contact->save()) {
            return back()->with([
                    'status' => 'Email sent correctly. Thanks to get in touch us!'
                ]);
        }        
    }

    public function sendEmailReminder($contact)
    {
        Mail::to(env('EMAIL'))->send(new MailContact($contact));
        // Mail::send($this->theme. '.message', ['contact', $contact], function ($m) use ($contact) {
        //     $m->from($contact['email']);
        //     $m->to(env('EMAIL'));
        //     $m->subject('New Message!');
            // $m->body($contact['message']);
            // $m->attach(storage_path('freestuff/free-file.pdf'));
        // });
    }
}
