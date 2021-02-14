@extends('profile_user.layouts.main')

@section('profile-content')
    <section id="app" class="messages">
        <div class="">
            <div class="container-wrap">
                @include('profile_user.partials.left_menu')

                <div class="block-messages">
                    <h2 class="name-lk">Сообщения</h2>
                    <div class="tabs-mess">
                        <div class="chat-types">
                            <span class="chat-types__choose" data-choose="all-messages">Все сообщения</span>
                            <ul class="chat-types__dropdown">
                                <li data-id="all-messages" class="active">Все сообщения</li>
                                <li data-id="unread">Непрочитаные</li>
                                {{--<li data-id="unanswered">Неотвеченые</li>--}}
                            </ul>
                        </div>
                        <ul class="mess-items">
                            @foreach($dialogs as $dialog)
                            <li class="item-messages @if($dialog->unreaded) unread @endif">

                                <div class="img-wrap">
                                    <img src="{{asset('/storage/images/notice_photos/watch/number_'.$dialog->advert->id.'/'.$dialog->advert->photos[0]->photo)}}" alt="img">
                                </div>
                                <div class="item-cont">
                                    <div class="from">
                                        <a href="{{route('DialogShow', ['id'=>$dialog->id])}}">
                                        {{$dialog->advert->title}}
                                        </a>
                                    </div>
                                    <div class="item-name">
                                        {{$dialog->advert->description}}
                                        <span>{{ $dialog->initiator_id == \Illuminate\Support\Facades\Auth::id() ? $dialog->respondent->name : $dialog->initiator->name  }}</span>
                                    </div>
                                    <div class="price-wrap">
                                        <div class="new">
                                            1500$
                                        </div>
                                        <div class="data">
                                            {{$dialog->advert->created_at}}
                                        </div>
                                    </div>
                                </div>

                            </li>
                            @endforeach
                            {{--<li class="item-messages unread">
                                <div class="img-wrap">
                                    <img src="./images/content/watch-1.png" alt="img">
                                </div>
                                <div class="item-cont">
                                    <div class="from">
                                        Chronometrie Stäuble AG
                                    </div>
                                    <div class="item-name">
                                        Hublot Big Bang 44MM Evolution Steel Ceramic Watch 301.SM.1770.RX
                                        <span>Ivan</span>
                                    </div>
                                    <div class="price-wrap">
                                        <div class="new">
                                            1500 $
                                        </div>
                                        <div class="data">
                                            05.10.20
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-messages unanswered">
                                <div class="img-wrap">
                                    <img src="./images/content/watch-1.png" alt="img">
                                </div>
                                <div class="item-cont">
                                    <div class="from">
                                        Chronometrie Stäuble AG
                                    </div>
                                    <div class="item-name">
                                        Hublot Big Bang 44MM Evolution Steel Ceramic Watch 301.SM.1770.RX
                                        <span>Ivan</span>
                                    </div>
                                    <div class="price-wrap">
                                        <div class="new">
                                            1500 $
                                        </div>
                                        <div class="data">
                                            05.10.20
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-messages">
                                <div class="img-wrap">
                                    <img src="./images/content/watch-1.png" alt="img">
                                </div>
                                <div class="item-cont">
                                    <div class="from">
                                        Chronometrie Stäuble AG
                                    </div>
                                    <div class="item-name">
                                        Hublot Big Bang 44MM Evolution Steel Ceramic Watch 301.SM.1770.RX
                                        <span>Ivan</span>
                                    </div>
                                    <div class="price-wrap">
                                        <div class="new">
                                            1500 $
                                        </div>
                                        <div class="data">
                                            05.10.20
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-messages unread">
                                <div class="img-wrap">
                                    <img src="./images/content/watch-1.png" alt="img">
                                </div>
                                <div class="item-cont">
                                    <div class="from">
                                        Chronometrie Stäuble AG
                                    </div>
                                    <div class="item-name">
                                        Hublot Big Bang 44MM Evolution Steel Ceramic Watch 301.SM.1770.RX
                                        <span>Ivan</span>
                                    </div>
                                    <div class="price-wrap">
                                        <div class="new">
                                            1500 $
                                        </div>
                                        <div class="data">
                                            05.10.20
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-messages unanswered">
                                <div class="img-wrap">
                                    <img src="./images/content/watch-1.png" alt="img">
                                </div>
                                <div class="item-cont">
                                    <div class="from">
                                        Chronometrie Stäuble AG
                                    </div>
                                    <div class="item-name">
                                        Hublot Big Bang 44MM Evolution Steel Ceramic Watch 301.SM.1770.RX
                                        <span>Ivan</span>
                                    </div>
                                    <div class="price-wrap">
                                        <div class="new">
                                            1500 $
                                        </div>
                                        <div class="data">
                                            05.10.20
                                        </div>
                                    </div>
                                </div>
                            </li>--}}
                        </ul>
                    </div>
                    @if($currentDialog)
                    <div class="chat-cont">
                        <div class="chat-person">
                            <button class="back-chat"></button>
                            <div class="name">
                                {{$currentDialog->advert->title}}
                            </div>
                            <div class="img-wrap">
                                <img src="{{asset((new \App\Services\ProfileService())->getAvatar($currentDialog->advert->user_id))}}" alt="img">
                            </div>
                        </div>
                        <div id="chatd_block">
                            <chat :dialog_id="{{$currentDialog->id}}" :messagesList="{{ $messages  }}" :user_id="{{Auth::id()}}" :respondent_id="{{$currentDialog->advert->user_id}}"></chat>
                        </div>

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
