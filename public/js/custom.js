var increment_btn = document.querySelector('#increment_btn');
var decrement_btn = document.querySelector('#decrement_btn');
var input = document.querySelector('#input');
var prod_id=document.querySelector('#prod_id');

            increment_btn.addEventListener('click', () =>{
                if(input.value<10){
                    input.value = parseInt(input.value) + 1;
                }

            });

            decrement_btn.addEventListener('click', () =>{
                if(input.value >1){
                    input.value = parseInt(input.value) - 1;
                }

            });

            // changeQuantite.addEventListener('click',function(event){
            //     event.preventDefault();

            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });

            //    $.ajax({
            //     method:"POST",
            //     url:"update_cart",
            //     data: {
            //         'prod_id' :prod_id.value,
            //         'input' : input.value,
            //     },
            //     success: function (response){
            //         window.location.reload();
            //     }
            //    });
            // });



