<div id="registration-modal" class="modal">
    <div id="registration-div" class="modal__content">
        <h5 class="modal__title">{{__('messages.modal_welcome')}}</h5>
        <form id="registration-form" method='post' class="registration" action="{{ url('/register-user') }}">
            @csrf
            <div class="change-input">
                <input id="reg-form-email" name="email" type="text" placeholder="{{__('messages.modal_registration_email')}}" required>
                <span></span>
            </div>
            <input id="reg-pass" name="password" type="password" placeholder="{{__('messages.modal_registration_password')}}" required>
            <input name="repeat-password" type="password" placeholder="{{__('messages.modal_registration_password_again')}}" required>
            <span>{{__('messages.modal_registration_password_again')}}</span>
            <div class="checkbox-block registration__checkbox">
                <label class="checkbox-block__label">
                    <input type="checkbox" name="data-protection" required value="1">
                    <p><span>{{__('messages.data_protection')}}</span></p>
                    <span>{{__('messages.required_filed')}}</span>
                </label>
            </div>
            <div class="checkbox-block registration__checkbox">
                <label class="checkbox-block__label">
                    <input type="checkbox" name="mailing" required value="1">
                    <p><span>{{__('messages.mailing')}}</span>
                    </p>
{{--                    <span>{{__('messages.required_filed')}}</span>--}}
                </label>
            </div>
            <button type="submit" class="btn-arrow">{{__('messages.registration_button')}}</button>
        </form>
    </div>
</div>
