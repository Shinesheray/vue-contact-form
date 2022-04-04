<template>
<!-- component -->
<div class="w-full bg-gray-800 h-screen">
    <div class="bg-gradient-to-b from-blue-800 to-blue-600 h-96"></div>
    <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
        <div class="bg-gray-900 w-full shadow rounded p-8 sm:p-12 -mt-72">
            <p class="text-3xl font-bold leading-7 text-center text-white">Contact me</p>

<!--Form section begins here-->
            <form @submit.prevent="sendContact" method="post">
                <div class="md:flex items-center mt-12">
                    
                    <!--Name section -->
                    <div class="w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none text-gray-300">Name</label>
                        <input type="text" v-model="form.name" class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded" />
                      
                      <!--Email section is required-->
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none text-gray-300">Email</label>
                        <input type="email" v-model="form.email" class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"/>
                      
                    </div>
                </div>

                <!--The Gender section is in radio button format - which allows the user to select their prefrence and will be sent to the database and email-->
                <div class="md:flex items-center mt-8">
                <div >
                    <label class="font-semibold leading-none text-gray-300"> Gender:</label> <!-- the Gender radio table for the user to select from -->
                   <br> <input type="radio" name="radio" value="Female" v-model="form.gender" required><label class="font-semibold leading-none text-gray-300">Female</label>
                   <br> <input type="radio" name="radio" value="Male" v-model="form.gender" required><label class="font-semibold leading-none text-gray-300">Male</label>
                   <br> <input type="radio" name="radio" value="Other" v-model="form.gender" required><label class="font-semibold leading-none text-gray-300">Other</label>
                </div>
                </div>
                <!--Subject line section so that when an email is sent the subject line in the email will be what the user enters below-->
                <div>
                <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                        <label class="font-semibold leading-none text-gray-300">Subject</label>
                        <input type="text" v-model="form.subject" class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"/>
                        
                    </div>
                    <!--Content text feild to enter the information-->
                </div>
                    <div class="w-full flex flex-col mt-8">
                        <label class="font-semibold leading-none text-gray-300">Content</label>
                        <textarea type="text" v-model="form.content" class="h-40 text-base leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-800 border-0 rounded"></textarea>
                       
                    </div>
                </div>

                <!--Submit the from - sends the information to the database and sends the email to  flash message email-->
                <div class="flex items-center justify-center w-full">
                    <button class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-blue-700 rounded hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                        Send message
                    </button>
                </div>
            </form>
<!--Form Section Ends  here-->
                
        </div>
      
    </div>
         
</div>


</template>

<script>
export default {
    // set the instance of the form to allow data to be entered
    data() {
        return {
            form: {
                name: '',
                email: '',
                gender: '',
                subject: '',
                content: ''
            }
        }
    },
    methods: {
        sendContact() {
            // send the contact details to the email api
            axios.post('/api/send-contact', {
                'name': this.form.name,
                'email': this.form.email,
                'gender': this.form.gender,
                'subject': this.form.subject,
                'content': this.form.content
            }).then(response => {
                this.clearForm();
                this.flash = true;
                console.log(response);
                alert('Your Email Massage was sent!');
            }).catch(error => {
                console.log(error);
            });

            // send the details too the DB
             axios.post('/api/contact/store', {
                form: this.form
            })
            .then(response => {
                if(response.status == 201){
                    this.form.name = "";
                    this.form.email = "";
                    this.form.gender = "";
                    this.form.content = "";
                }
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            })
        },
      // create a new method to clear the form once details submitted
        clearForm(){
            this.form.name = "";
            this.form.email = "";
            this.form.gender = "";
            this.form.subject = "";
            this.form.content = "";
        }
    }
}
</script>

<style>

</style>