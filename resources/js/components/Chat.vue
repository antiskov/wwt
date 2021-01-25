<template>
    <div class="container">
        {{messages.join('\n')}}
        <div class="communication-items">
            <div class="data">05. 06. 20</div>
            <div class="communication-items-in">
<!--                <img src="./images/content/person.png" alt="img">-->
                <div class="text-mas-in">
                    <p>
                        Вы купили эти часы? Я не покупал эти часы
                    </p>
                    <div class="time">18.06</div>
<!--                    <img class="label-del" src="images/icons/ok-white.svg">-->
                </div>
            </div>
            <div class="communication-items-out">
<!--                <img src="./images/content/person.png" alt="img">-->
                <div class="text-mas-in">
                    <p>
                        Вы купили эти часы? Я не покупал эти часы
                    </p>
                    <div class="time">18.06</div>
<!--                    <img class="label-del" src="./images/icons/ok-white.svg">-->
                </div>
            </div>
        </div>
        <form class="cont">
            <textarea class="communication-mess" ref="messageField" placeholder="Введите текст" v-model="textMessage"></textarea>
            <button type="submit"  class="sent-comm btn-hover" @click="sendMessage">Отправить</button>
        </form>
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
