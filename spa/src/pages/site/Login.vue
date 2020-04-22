<template>
	<siteTpl id="register">

		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
					Login
					</div>
					<div class="card-body">
						
						<form>
							<div class="form-group">
								<input v-model="form.email" type="text" class="form-control" placeholder="CPF">
								<small class="form-text text-muted">Será usado para fazer login.</small>
							</div>
							<div class="form-group">
								<input v-model="form.password" type="password" class="form-control" placeholder="Senha">
							</div>
							<button @click.prevent="login" type="submit" class="btn btn-primary float-right">Registrar</button>
						</form>

						<ul>
							<li v-for="(erro, index) of errors" :key="index">{{ erro }}</li>
						</ul>

					</div>
				</div>
			</div>

		</div>

	</siteTpl>
</template>

<script>

import siteTpl from '@/theme/SiteTpl'
import User from '@/apis/User';

export default {
	name: 'register',
	data(){
		return {
			form: {
				email: '',
				password: ''
			},
			errors: []
		}
	},
	components: {
		siteTpl
	},
	methods: {
		login(){
			User.login(this.form)
			.then( () => {
				localStorage.setItem("auth", "true");
				this.$router.push({ name: "app"});
			})
			.catch(error => {
				if(error.response.status === 422) {
					this.errors = error.response.data.errors;
				}
			});
		}
	}
}
</script>

<style>

</style>