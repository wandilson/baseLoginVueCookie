<template>
	<siteTpl id="register">

		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
					Criar Conta
					</div>
					<div class="card-body">
						
						<form @submit.prevent="registrar">
							<h6>Quem vai gerenciar o sistema?</h6>
							<div class="form-group">
								<input v-model="form.name" type="text" class="form-control" placeholder="Nome">								
							</div>
							<div class="form-group">
								<input v-model="form.email" type="email" class="form-control" placeholder="E-mail">								
							</div>
							<div class="form-group">
								<input v-model="form.password" type="password" class="form-control" placeholder="Senha">
							</div>
							<div class="form-group">
								<input v-model="form.password_confirmation" type="password" class="form-control" placeholder="Confirmação de senha">								
							</div>
							<button type="submit" class="btn btn-primary float-right">Registrar</button>
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
	data() {
		return {
			form: {
				name: '',
				email: '',
				password: '',
				password_confirmation: ''
			},
			errors: []
		}
	},
	components: {
		siteTpl
	},
	methods: {
		registrar() {
				User.register(this.form)
				.then( () => {
					this.$router.push({ name: "login"});
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