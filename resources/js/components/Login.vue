<template>
  <div class="container">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered"
        data-backdrop="false"
        role="document"
      >

        <div class="modal-content">
         <div class="modal-header">
        <h5 class="modal-title">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
          <div class="form-group">
            <label for="">User Emial</label>
            <input type="text"
              class="form-control" name="" id="" v-model='form.email' aria-describedby="helpId" placeholder="">
            <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
          </div>
          <div class="form-group">
            <label for="">Password Name</label>
            <input type="password"
              class="form-control" name="password" v-model='form.password' id="" aria-describedby="helpId" placeholder="">
            <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
          </div>
          <div class="text-center">
            <button class='btn btn-primary w-100'  :disabled='!IsValidForm()'  @click.prevent='SubmitForm()'> Login </button>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data(){
      return {
          form:{
              email: 'jksa@gmail.com',
              password: '123456',
              remeberme:true,
              _token: window.token,
          }
      };
  },
  methods:{
    ShowAlert(meesage){
      this.$swal(meesage);
    },
      SubmitForm(){
        var Form = {
          "_token" : window.csrf_token,
          "email" : this.form.email,
          "password" : this.form.password,
        };
      console.log(window.token);
        // console.log(Form);
        window.axios.post('http://localhost:8000/login', Form ).then(function(res){
            return res;
        }).then(res =>  {
            console.log(res);
            if(res.status !== 200){
                 this.ShowAlert("In Valid Credinatials");
            }else{
                this.ShowAlert("Login Success");
                // setTimeout(() => location.reload() , 2000);
            }
        });
        // catch(err => {
        //    console.log(err.message);
        //   //  console.log(err.data);
        // //   this.ShowAlert("In Valid Credinatials");
        // });
      },
      IsValidForm(){
            // console.log(this.emailValid());
            return this.emailValid() && this.form.password;
        },
        emailValid(){
            return/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.form.email);
        }
  }
};
</script>
