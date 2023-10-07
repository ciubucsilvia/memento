<div class="page type-page status-publish hentry group">
	@include(env('THEME') . '.site.parts.alerts')
    <form id="contact-form-example" class="contact-form" method="post" action="{{ route('contactStore') }}">
        <div class="usermessagea"></div>
        <fieldset>
            <ul>
                <li class="text-field">
                    <label for="name-example">
                    <span class="label">{{ $fields_contact['name'] }}</span>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" name="name" id="name-example" class="required" value="" /></div>
                    <div class="msg-error"></div>
                </li>
                <li class="text-field">
                    <label for="email-example">
                    <span class="label">{{ $fields_contact['email'] }}</span>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span><input type="text" name="email" id="email-example" class="required email-validate" value="" /></div>
                    <div class="msg-error"></div>
                </li>
                <li class="textarea-field">
                    <label for="message-example">
                    <span class="label">{{ $fields_contact['message'] }}</span>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span><textarea name="message" id="message-example" rows="8" cols="30" class="required"></textarea></div>
                    <div class="msg-error"></div>
                </li>
                <li class="submit-button">
                	{{ csrf_field() }}
                    <input type="submit" value="{{ $fields_contact['submit'] }}" class="sendmail alignright" />	
                    {{ csrf_field() }}		
                </li>
            </ul>
        </fieldset>
    </form>
    <script type="text/javascript">
        var messages_form_example = {
        	name: "Insert your name",
        	email: "Insert your email",
        	message: "Insert your message"
        };
    </script>
</div>