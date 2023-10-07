    <form id="contact-form-example" class="contact-form" method="post" action="{{ route('contactStore') }}" enctype="multipart/form-data">
        <div class="usermessagea"></div>
        <fieldset>
            <ul>
                <li class="text-field">
                    <label for="name-example">
                    <span class="label">{{ Lang::get('site.index')['contact_form']['name'] }}</span>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" name="name" id="name-example" class="required" value="" /></div>
                    <div class="msg-error"></div>
                </li>
                <li class="text-field">
                    <label for="email-example">
                    <span class="label">{{ Lang::get('site.index')['contact_form']['email'] }}</span>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span><input type="text" name="email" id="email-example" class="required email-validate" value="" /></div>
                    <div class="msg-error"></div>
                </li>
                <li class="textarea-field">
                    <label for="message-example">
                    <span class="label">{{ Lang::get('site.index')['contact_form']['message'] }}</span>
                    </label>
                    <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span><textarea name="message" id="message-example" rows="8" cols="30" class="required"></textarea></div>
                    <div class="msg-error"></div>
                </li>
                <li class="submit-button">
                    <input type="text" name="yiw_bot" id="yiw_bot" />
                    <input type="hidden" name="action" value="sendemail" id="action" />
                    <input type="hidden" name="yiw_referer" value="#" />
                    <input type="hidden" name="id_form" value="footer" />
                    <input type="submit" name="yiw_sendemail" value="{{ Lang::get('site.index')['contact_form']['send_msg'] }}" class="sendmail alignright" />			
                </li>
                {{ csrf_field() }}
            </ul>
        </fieldset>
    </form>

    <script type="text/javascript">
        var messages_form_footer = {
            name: "Insert your name",
            email: "Insert your email",
            message: "Insert your message"
        };
    </script>