<template>
    <div>

<!-- Modal HTML -->
<div class="row mt-5 pt-5">
    <div class="col-sm-12 col-md-6 col-lg-6 offset-lg-3 ">
<div id="myModal" class="">
	<div class="modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src='public/asset/images/avatar.png' alt="Avatar">
				</div>
				<h4 class="modal-title">Member Login</h4>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<input type="text" v-model="form.email" class="form-control" :rule="form.emailRules" name="username" placeholder="Username" required="required">
					</div>
					<div class="form-group">
						<input type="password" v-model="form.password" :rule="form.passwordRules" class="form-control" name="password" placeholder="Password" required="required">
					</div>
					<div class="form-group">
						<button  @click.prevent="submitForm" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a href="#">Forgot Password?</a>
			</div>
		</div>
	</div>
</div>
    </div>

</div>

    </div>
</template>


<script>
import { mapActions } from 'vuex';
export default {
         data() {
    return {
      dialog: false,
      valid: false,
      form: {
        email: "",
        emailRules: [
          v => !!v || "E-mail is required",
          v => /.+@.+\..+/.test(v) || "E-mail must be valid"
        ],
        password: "",
        passwordRules: [v => !!v || "password is required"]
      },
      error: null
    };
  },
  methods:{
      ...mapActions("Auth",{
          login:"login"
      }),
      submitForm(){
          const data = {
              email:this.form.email,
              password:this.form.password
          }
          this.login(data);

}
  }

}
</script>
