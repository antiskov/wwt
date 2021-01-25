<template>
    <div class="container">
        {{messages.join('\n')}}
        <div class="communication-items">
<!--            <div class="data">05. 06. 20</div>
            <div class="communication-items-in">
&lt;!&ndash;                <img src="./images/content/person.png" alt="img">&ndash;&gt;
                <div class="text-mas-in">
                    <p>
                        Вы купили эти часы? Я не покупал эти часы
                    </p>
                    <div class="time">18.06</div>
&lt;!&ndash;                    <img class="label-del" src="images/icons/ok-white.svg">&ndash;&gt;
                </div>
            </div>
            <div class="communication-items-out">
&lt;!&ndash;                <img src="./images/content/person.png" alt="img">&ndash;&gt;
                <div class="text-mas-in">
                    <p>
                        Вы купили эти часы? Я не покупал эти часы
                    </p>
                    <div class="time">18.06</div>
&lt;!&ndash;                    <img class="label-del" src="./images/icons/ok-white.svg">&ndash;&gt;
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
        data() {
            return {
                messages: [],
                textMessage: ''
            }
        },
        mounted() {
            window.Echo.channel('chat')
                .listen('Message', ({message}) => {
                    console.log('hello');
                    this.messages.push(message)
                })
        },
        methods: {
            sendMessage() {
                axios.post('/dialog/1/messages', {
                    body: this.textMessage
                });
                this.messages.push(this.textMessage);
                this.$refs.messageField='';
            }
        }
    }
</script>
