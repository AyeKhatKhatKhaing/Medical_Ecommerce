@if($product->product_type == 2)
<article class="text-darkgray mt-6">
    <h3 class="font-bold me-body20">Participant</h3>



    <div class="mt-5">
        <h4 class="font-bold me-body16">Do you have a referral letter from a doctor?
        </h4>


        <div class="input-group mt-3 xl:mt-5 me-body18 font-normal">

            <label for="referral-yes-1" class="custom-radio-container mr-16 last:mr-0">
                <input type="radio" name="have_referral-1" id="referral-yes-1" value="1" checked  class="toggle-input">
                <span class="custom-radio-orange"></span>
                <span class="ml-5 4xl:ml-[30px]">Yes</span>
            </label>

            <label for="referral-no-1" class="custom-radio-container mr-16 last:mr-0">
                <input type="radio" name="have_referral-1" id="referral-no-1" value="0"  class="toggle-input">
                <span class="custom-radio-orange"></span>
                <span class="ml-5 4xl:ml-[30px]">No</span>
            </label>

        </div>



    </div>




    <div class="mt-6 attach-file-group"  id="have_referral-1">
        <h4 class="font-bold me-body16">Upload referral letter and related document
            (if any)</h4>
        <div class="file-input-group mt-5 flex items-center">
            <input type="file" id="file-upload-1" name="file_upload-1"
                accept=".doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                class="file-upload w-[0.1px] h-[0.1px] opacity-0 overflow-hidden absolute -z-[1]">
            <label for="file-upload-1"
                class="border border-solid border-darkgray py-2 px-4 xl:py-[10px] rounded cursor-pointer flex items-center w-fit">
                <span class="mr-1 no-file"><img src="{{asset('frontend/img/upload-rounded.svg')}}" alt="" class="w-auto h-auto align-middle object-center object-cover"></span>
                <span class="label-content">Upload</span>
            </label>
            <button type="button" class="remove-file hidden ml-2 border border-solid border-darkgray py-2 px-4 xl:py-[10px] rounded cursor-pointer items-center w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 18 18" fill="none">
                    <path d="M17.3998 0.613387C17.2765 0.489783 17.1299 0.391719 16.9686 0.324811C16.8073 0.257902 16.6344 0.223462 16.4598 0.223462C16.2852 0.223462 16.1123 0.257902 15.951 0.324811C15.7897 0.391719 15.6432 0.489783 15.5198 0.613387L8.99981 7.12005L2.47981 0.600054C2.35637 0.476611 2.20982 0.378691 2.04853 0.311885C1.88725 0.245078 1.71438 0.210693 1.53981 0.210693C1.36524 0.210693 1.19237 0.245078 1.03109 0.311885C0.8698 0.378691 0.723252 0.476611 0.59981 0.600054C0.476367 0.723496 0.378447 0.870044 0.31164 1.03133C0.244834 1.19261 0.210449 1.36548 0.210449 1.54005C0.210449 1.71463 0.244834 1.88749 0.31164 2.04878C0.378447 2.21006 0.476367 2.35661 0.59981 2.48005L7.11981 9.00005L0.59981 15.5201C0.476367 15.6435 0.378447 15.79 0.31164 15.9513C0.244834 16.1126 0.210449 16.2855 0.210449 16.4601C0.210449 16.6346 0.244834 16.8075 0.31164 16.9688C0.378447 17.1301 0.476367 17.2766 0.59981 17.4001C0.723252 17.5235 0.8698 17.6214 1.03109 17.6882C1.19237 17.755 1.36524 17.7894 1.53981 17.7894C1.71438 17.7894 1.88725 17.755 2.04853 17.6882C2.20982 17.6214 2.35637 17.5235 2.47981 17.4001L8.99981 10.8801L15.5198 17.4001C15.6433 17.5235 15.7898 17.6214 15.9511 17.6882C16.1124 17.755 16.2852 17.7894 16.4598 17.7894C16.6344 17.7894 16.8072 17.755 16.9685 17.6882C17.1298 17.6214 17.2764 17.5235 17.3998 17.4001C17.5233 17.2766 17.6212 17.1301 17.688 16.9688C17.7548 16.8075 17.7892 16.6346 17.7892 16.4601C17.7892 16.2855 17.7548 16.1126 17.688 15.9513C17.6212 15.79 17.5233 15.6435 17.3998 15.5201L10.8798 9.00005L17.3998 2.48005C17.9065 1.97339 17.9065 1.12005 17.3998 0.613387Z" fill="#333333"></path>
                </svg>
                <span class="ml-1">Remove</span>
            </button>
        </div>
    </div>



    <div class="mt-6">
        <h4 class="font-bold me-body20">Message</h4>
        <label for="message-1" class="sr-only">Message</label>
        <textarea placeholder="You can share more information here!" name="message-1"
            id="message-1" cols="30" rows="4"
            class="resize-none me-body18 rounded mt-3 w-full text-lightgray border border-solid border-meA3 outline-none focus:border-orangeMediq focus:border-orangeMediq focus:outline-none p-3 xl:p-5"></textarea>
    </div>


</article>
@endif