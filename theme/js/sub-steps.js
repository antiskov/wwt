document.addEventListener('DOMContentLoaded', function(e){
    //bot-btns && step guard
    (function () {
        const btns = document.querySelectorAll('[data-step]');
        const anchors = document.querySelectorAll('[data-anchor]');
        const tabs = document.querySelectorAll('[data-tab]');
        let step = 1;


        function checkInputs(inputs, step){
            if(step === 1){
                // ajax();
                //от тут місце кароч, при переході з 1-о на 2
                console.log('ajax')
                return [...inputs].some(input => !input.value)
            }
            else if(step === 2){
                return  !checkImages()
            }else if (step === 3){
                // ajax();
                //от тут місце кароч, при переході з 3-о на 4
                console.log('ajax')
                return [...inputs].some(input => !input.value)
            } else{
                return [...inputs].some(input => !input.value)
            }
        }

        function getOffset(el) {
            const rect = el.getBoundingClientRect();
            return {
                left: rect.left + window.scrollX,
                top: rect.top + window.scrollY
            };
        }

        function clearErrors(inputs){
            inputs.forEach(input => input.classList.remove('input-error'))
        }

        function checkImages(){
            const items = document.querySelector('#uploadImagesList').querySelectorAll('li');
            document.querySelector('[data-id="step-3-title"]').classList.add('txt-red');
            return items.length >= 2
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
                if(nextStep >= step){
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
                        if(el){
                            console.log('second')
                            const position = getOffset(el).top;
                            window.scroll({top: (position - 100), left: 0, behavior: 'smooth'});
                            nextTab.classList.add('disabled');
                            inputs.forEach(input => {
                                !input.value && input.classList.add('input-error')
                            })
                        }
                    }
                } else{
                    document.querySelector(`[data-anchor='${nextStep}']`).click();
                }
            }
        })
    })()

});