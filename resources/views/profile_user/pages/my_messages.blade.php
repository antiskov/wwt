@extends('profile_user.layouts.main')

@section('profile-content')
    <section id="app" class="messages">
        <div class="">
            <div class="container-wrap">
                @include('profile_user.partials.left_menu')

                <div class="block-messages">
                    <h2 class="name-lk">Сообщения</h2>
                    @if(count($dialogs))
                    <div class="tabs-mess">
                        <div class="chat-types">
                            <span class="chat-types__choose" data-choose="all-messages">Все сообщения</span>
                            <ul class="chat-types__dropdown">
                                <li data-id="all-messages" class="active">Все сообщения</li>
                                <li data-id="unread">Непрочитанные</li>
                                {{--<li data-id="unanswered">Неотвеченые</li>--}}
                            </ul>
                        </div>
                        <ul class="mess-items">
                            @foreach($dialogs as $dialog)
                            <li class="item-messages @if($dialog->unreaded) unread @endif @if($dialog->id == $id) active @endif">
                                <div class="img-wrap">
                                    <div class="img-wrap__content">
                                    <img src="{{asset('/storage/images/notice_photos/watch/number_'.$dialog->advert->id.'/'.$dialog->advert->photos[0]->photo)}}" alt="img">
                                    </div>
                                </div>
                                <div class="item-cont">
                                    <a href="#" class="from">
                                        {{ $dialog->initiator_id == \Illuminate\Support\Facades\Auth::id() ? $dialog->respondent->name : $dialog->initiator->name  }}
                                    </a>
                                    <div class="item-name">
                                        <a href="{{route('DialogShow', ['id'=>$dialog->id])}}">
                                            {{$dialog->advert->title}}
                                        </a>

                                    </div>
                                    <div class="price-wrap">
                                        <div class="new">
                                            {{$dialog->advert->getPrice()}} $
                                        </div>
                                        <div class="data">
                                            {{$dialog->advert->created_at}}
                                        </div>
                                    </div>
                                </div>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @if($currentDialog)
                    <div class="chat-cont" id="chatd_block">
                        <div class="chat-person">
                            <button class="back-chat"></button>
                            <div class="name">
                                {{$currentDialog->advert->title}}
                            </div>
                            <div class="img-wrap">
                                <img src="{{asset($respondent_avatar)}}" alt="img">
                            </div>
                        </div>
                        <chat :respondent_avatar="'{{$respondent_avatar}}'" :user_avatar="'{{$user_avatar}}'" :dialog_id="{{$currentDialog->id}}" :messages_list="{{ $messages  }}" :user_id="{{Auth::id()}}" :respondent_id="{{$currentDialog->advert->user_id}}"></chat>

                    </div>
                    @endif
                    @else
                    <h3>У вас нет сообщений</h3>
                        @endif

                </div>
            </div>
        </div>
    </section>
@endsection
