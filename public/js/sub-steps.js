document.addEventListener('DOMContentLoaded', function(e){
    //bot-btns && step guard
    (function () {
        const btns = document.querySelectorAll('[data-step]');
        const anchors = document.querySelectorAll('[data-anchor]');
        const tabs = document.querySelectorAll('[data-tab]');
        const submitBtn = document.querySelector('[data-id-adv]');
        let step = 1;

        function checkInputs(inputs, step){
            console.log(step);
            if(step === 2){
                return  !checkImages()
            } else if(step === 3) {
                submitInfo();
            }
            else{
                return [...inputs].some(input => !input.value)
            }
        }

        function submitInfo(){
            $.ajax({
                data: $('#create_advert').serializeArray(),
                type: 'post',
                url:`/submitting/step4/${submitBtn.dataset.idAdv}`,
                success: function (data) {
                    // $('#step4').empty();
                    $('#step4').html(data.output);
                    return true;
                },
            })
        }

        function getOffset(el) {
            if(el){
                const rect = el.getBoundingClientRect();
                return {
                    left: rect.left + window.scrollX,
                    top: rect.top + window.scrollY
                };
            }
        }

        function clearErrors(inputs){
            inputs.forEach(input => input.classList.remove('input-error'))
        }

        function checkImages(){
            const items = document.querySelector('#uploadImagesList').querySelectorAll('li');
            document.querySelector('[data-id="step-3-title"]').classList.add('txt-red');
            return items.length > 2
        }

        anchors.forEach(el => {
            el.addEventListener('click', function () {
                const idx = parseInt(this.dataset.anchor);
               if(step === idx){
                   return
               }else if(step < idx){
                   step++
               }else{
                   step--
               }
            })
        });

        function changeTab(idx){
            tabs.forEach(tab => tab.classList.remove('active'));
            anchors.forEach(tab => tab.classList.remove('active'));
            tabs[idx - 1].classList.add('active');
            anchors[idx - 1].classList.add('active');
        }

        btns.forEach(btn => {
            btn.onclick = function(){
                const nextStep = this.dataset.step;
                const nextTab = document.querySelector(`[data-anchor='${nextStep}']`);
                if(nextStep > step){
                    const inputs = document.querySelector(`[data-tab="${nextStep - 1}"]`)
                        .querySelectorAll('[data-step-input]');
                    if(!checkInputs(inputs, step)){
                        nextTab.classList.remove('disabled');
                        clearErrors(inputs);
                        changeTab(nextStep);
                        window.scroll({top: 0, left: 0, behavior: 'smooth'});
                        step++
                    }else{
                        const el = [...inputs].find(input => !input.value);
                        const position = getOffset(el).top;
                        window.scroll({top: (position - 100), left: 0, behavior: 'smooth'});
                        nextTab.classList.add('disabled');
                        inputs.forEach(input => {
                            !input.value && input.classList.add('input-error')
                        })
                    }
                } else{
                    console.log(nextStep)
                    document.querySelector(`[data-anchor='${nextStep}']`).click();
                    step--
                }
            }
        })
    })()

});
