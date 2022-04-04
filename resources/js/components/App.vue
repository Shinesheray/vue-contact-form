<template>
      <div  class="contact-form-container">
       <div class="heading"> 
       
           <contact-form/>
       </div>
       <log-in :forms="forms" />
    </div>
</template>

<script>
// we import the other pages to display in our app.vue
import LogIn from './LogIn.vue';
import ContactForm from './ContactForm.vue';

export default {
  components: { 
      LogIn,
   ContactForm },
   // using the below function to set our array to store the data from the DB 
    data: function () {
        return {
            forms: []
        }
    },
   // we get the list of details from the database
        getDetails() {
            axios.get('/api/contacts')
            .then(response => {
                this.forms = response.data;
            }). catch(error => {
                console.log(error);
            })
        },
        // we call this function to get the list in db with axios
        create(){
            this.getDetails();
        }

}
</script>

<style>

</style>