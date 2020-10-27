@include('partials.global.head')
@include('partials.global.header')


@include('partials.global.footer-content')
@section('modals')
    @include('partials.modals.login')
    @include('partials.modals.registration')
    @include('partials.modals.password')
@show
@section('scripts')
{{--    <script type="text/javascript">--}}
{{--        $('#registration-form').on('submit', function(e){--}}
{{--            e.preventDefault();--}}
{{--            $.ajax({--}}
{{--                type:"POST",--}}
{{--                url: {{ route('register-user')}},--}}
{{--                data: {--}}
{{--                    email: $('#email').val(),--}}
{{--                    password: $('#reg-pass').val(),--}}
{{--                },--}}
{{--                datatype: 'html',--}}
{{--                success: function (data) {--}}
{{--                    $('#registration-form').empty();--}}
{{--                    $('#registration-form').html(data.output);--}}

{{--                    console.log(data.output);--}}
{{--                    console.log(data.errors);--}}

{{--                    Object.keys(data.errors).forEach((key) => {--}}
{{--                        document.querySelector(`[name='${key}']`).classList.add('is-invalid')--}}
{{--                    })--}}
{{--                },--}}
{{--            }).done(function() {--}}
{{--                $( this ).addClass( "done" );--}}
{{--            });--}}
{{--            console.log(1);--}}
{{--        });--}}
{{--    </script>--}}
@endsection
@show
@include('partials.global.footer')
