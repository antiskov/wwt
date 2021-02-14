<template>
    <div class="container">
        <div class="communication-items">
            <div v-for="message in messages" :key="message.text" class="communication-items-in" :class="checkClass(message)" >
                <img src="./images/content/person.png" alt="img">
                <div class="text-mas-in">
                    <p>
                        {{ message.text }}
                    </p>
                    <div class="time">18.06</div>
<img class="label-del" src="images/icons/ok-white.svg">
                </div>
            </div>
            <div class="communication-items-out">
<img src="./images/content/person.png" alt="img">
                <div class="text-mas-in">
                    <p>
                        Вы купили эти часы? Я не покупал эти часы
                    </p>
                    <div class="time">18.06</div>
<img class="label-del" src="./images/icons/ok-white.svg">
                </div>
            </div>-->
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
            'messages_list','user_id','respondent_id', 'dialog_id'
        ],
        data() {
            return {
                messages: [],
                textMessage: ''
            }
        },
        mounted() {
            this.messages=this.messages_list;
            window.Echo.private('chat')
                .listen('Message', ({message}) => {
                    console.log('hello');
                    this.messages.push(message)
                })
        },
        computed: {
            checkClass(message) {
                console.log(1,message);
            }
        },
        methods: {
            sendMessage() {
                const data= {
                    text: this.textMessage,
                    initiator_id: this.user_id,
                    respondent_id: this.respondent_id,
                    dialog_id: this.dialog_id
                }

                console.log(data)
                axios.post('/dialog/1/messages', data);
                this.messages.push(this.data);
                this.$refs.messageField='';
            },
            checkClass(message) {
                console.log(message);
            }
        }
    }
</script>
