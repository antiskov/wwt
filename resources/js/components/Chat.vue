<template>
    <div>
        <div class="communication-items">
            <div v-for="message in messages" :key="message.id" :class="checkClass(message)" >
                <img :src="getAvatar(message)" alt="img">
                <div class="text-mas-in">
                    <p>
                        {{ message.text }}
                    </p>
                    <div class="time">{{message.created_at}}</div>
                    <img class="label-del" :src="is_readed(message)">
                </div>
            </div>
        </div>
        <div class="cont">
            <textarea class="communication-mess" ref="messageField" placeholder="Введите текст" v-model="textMessage"></textarea>
            <button type="submit"  class="sent-comm btn-hover" @click="sendMessage">Отправить</button>
        </div>
    </div>
</template>
<script>
    export default {
        props: [
            'messages_list','user_id','respondent_id', 'dialog_id','respondent_avatar','user_avatar'
        ],
        data() {
            return {
                messages: [],
                textMessage: ''
            }
        },
        mounted() {
            var self = this;
            var f = async function() {
                const messages = await axios.get(location.pathname+'/messages');
                self.messages=messages.data;
            }
            this.messages=this.messages_list;
            window.Echo.private('chat.'+this.dialog_id)
                .listen('Message', ({message}) => {
                    this.messages.push(message)
                })
            if (!window.Echo.connector.socket.connected && this.dialog_id) {
                setInterval(f, 5000);
            }


        },
        methods: {
            is_readed(message) {
                if (message.is_readed) {
                    return '/images/icons/ok-white.svg'
                } else {
                    return '/images/icons/ok-white.svg'
                }
            },
            getAvatar(message) {
                if (message.initiator_id==this.user_id) {
                    return this.user_avatar
                } else {
                    return this.respondent_avatar
                }
            },
            checkClass(message) {
                if (message.initiator_id==this.user_id) {
                    return 'communication-items-out'
                } else {
                    return 'communication-items-in'
                }
            },
            async sendMessage() {
                const d= {
                    text: this.textMessage,
                    initiator_id: this.user_id,
                    respondent_id: this.respondent_id,
                    dialog_id: this.dialog_id
                }

                const m = await axios.post('/dialog/'+this.dialog_id+'/messages', d);
                this.messages.push(m.data);
                this.textMessage='';
            }
        }
    }
</script>
